<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Sale;
use App\Models\Order;
use App\Models\Accounting\Account;
use DB;

class SaleController extends Controller
{
    public function index(){
        $salesData = DB::table('products')->join('sales', 'products.id', '=', 'sales.item_name' )
        ->orderBy('sales.id', 'DESC')->get();
        return view('roster.accounting.sales', compact('salesData',));
    }

    public function salesdata(){
        $salesId = $_GET['id'];
        $saleData = DB::table('products')->join('sales', 'products.id', '=', 'sales.item_name' )
        ->where('sales.id', '=', $salesId)->orderBy('sales.id', 'DESC')->get();
        return response()->json(array('msg'=> $saleData), 200);
    }

    public function return(Request $request){
        $request->validate([
            'item_name'      => 'required',
            'purch_qty'    => 'required',
            'returns_qty'     => 'required',
            'returned_amt'     => 'required',
            'reason'      => 'required',
        ]);

        $item_id             = $request->item_id;
        $item_name           = $request->item_name;
        $purch_qty           = $request->purch_qty;
        $returns_qty         = $request->returns_qty;
        $returned_amount     = $request->returns_amt;
        $selling_price     = $request->selling_price;
        $buying_price     = $request->buying_price;
        $reason              = $request->reason;

        $sales = Sale::find($item_id);
        $orderId = $sales->order_id;
        $sold_quantity = $sales->sold_quantity;
        $item_discount =  $sales->item_discount;
        if($sold_quantity > $returns_qty){
            $sales->sold_quantity = ($sold_quantity - $returns_qty);    
            $itemName = $sales->item_name;
            $sales->save();


            $order   = Order::find($orderId);
            $purchEq = $order->purchase_equivalent;
            $salesEq = $order->order_value;
            $paid    = $order->paid_amount;
            $order_discount = $order->order_discount;
            
            $purchReturn = ($buying_price * $returns_qty);
            $salesReturn = ($selling_price * $returns_qty);
            $disc = $item_discount * $returns_qty;

            $order->purchase_equivalent = $purchEq - $purchReturn;
            $order->order_value = $salesEq - $salesReturn;
            $order->paid_amount = $paid - $returned_amount;
            $order->order_discount = $order_discount - $disc;
            $sales->save();

            $account = Account::find($payment);
            $balance = $account->account_balance;
            $account->account_balance = ($balance + $paid_amount);
            $newbal = $account->account_balance;
            $account->save();
    
            $data = array(
                'order_id'              => $orderId,
                'item_name'             => $itemName,
                'returned_qty'          => $returns_qty ,
                'direction'             => 'return-in',
                'returned_amount'       => 'return-in',
                'created_at'            => date("Y-m-d H:i:s"),
                'updated_at'            => date("Y-m-d H:i:s"),
            );
            DB::table('returns')->insert($data);
    
            $notification  = array(
                'message'    => 'Product Returned',
                'alert-type' => 'success'
                );

        }else{
            $notification  = array(
                'message'    => 'Couldnt Return Excess Products',
                'alert-type' => 'error'
                );
        }
    
        return redirect()->back()->with($notification);
    }
}

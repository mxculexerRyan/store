<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Sale;
use App\Models\Order;
use App\Models\Accounting\Account;
use App\Models\Loans\Debtors;
use DB;

class SaleController extends Controller
{
    public function index(){
        $salesData = DB::table('products')->join('sales', 'products.id', '=', 'sales.item_name' )
        ->orderBy('sales.id', 'DESC')->get();
        $accountsData = Account::select("*")->where("account_status", "available")->get();
        return view('roster.accounting.sales', compact('salesData','accountsData'));
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
            'sellprice'    => 'required',
            'returns_val'    => 'required',
            'purch_qty'    => 'required',
            'returns_qty'     => 'required',
            'returns_amt'     => 'required',
            'payment_method'     => 'required',
            'reason'      => 'required',
        ]);

        $item_id             = $request->item_id;
        $item_name           = $request->item_name;
        $selling_price       = $request->sellprice;
        $buying_price        = $request->buying_price;
        $return_value        = $request->returns_val;
        $purch_qty           = $request->purch_qty;
        $returns_qty         = $request->returns_qty;
        $returned_amount     = $request->returns_amt;
        $payment             = $request->payment_method;
        $reason              = $request->reason;


        $returned_amount = (float)str_replace(',','', $returned_amount);
        $sales = Sale::find($item_id);
        $orderId = $sales->order_id;
        $sold_quantity = $sales->sold_quantity;
        $item_discount =  $sales->item_discount;
        if($sold_quantity >= $returns_qty){
            $sales->sold_quantity = ($sold_quantity - $returns_qty);
            if($returns_qty == $sold_quantity){$sales->status = 'Un-Available';}
            $itemName = $sales->item_name;
            $sales->save();


            $order   = Order::find($orderId);
            $purchEq = $order->purchase_equivalent;
            $salesEq = $order->order_value;
            $paid    = $order->paid_amount;
            $order_discount = $order->order_discount;
            
            $purchReturn = ($buying_price * $returns_qty);
            $salesReturn = (($selling_price - $item_discount) * $returns_qty);
            $disc = $item_discount * $returns_qty;

            $order->purchase_equivalent = $purchEq - $purchReturn;
            $order->order_value = $salesEq - $salesReturn;
            if($paid < $salesEq){
                $debtValue = $salesEq - $paid;
                $debtdata   = Debtors::where('reason', '=', 'Sales of order No: '.$orderId)->get();
                $debtId = $debtdata[0]->id;
                $debt   = Debtors::find($debtId);
                $debited = $debt->debited_amount;

                if($debtValue >= $returned_amount){
                    $order->paid_amount = $paid + $returned_amount;
                    $returned_amount = 0;
                    $debt->debited_amount = $debited - $salesReturn;
                }else{
                    $returned_amount = $returned_amount - $debtValue;
                    $order->paid_amount = $paid + $debtValue;
                    $order->status = 'Paid';
                    $debt->debited_amount = $debited - $salesReturn;
                }
                $debt->save();
            }else{
                $order->paid_amount = $paid - $returned_amount;

            }
            $order->order_discount = $order_discount - $disc;
            $order->save();

            $account = Account::find($payment);
            $balance = $account->account_balance;
            $account->account_balance = ($balance - $returned_amount);
            $newbal = $account->account_balance;
            $account->save();
    
            $data = array(
                'order_id'              => $orderId,
                'item_name'             => $itemName,
                'returned_qty'          => $returns_qty ,
                'direction'             => 'return-in',
                'returned_amount'       => $returned_amount,
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

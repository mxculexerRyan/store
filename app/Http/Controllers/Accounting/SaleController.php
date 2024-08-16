<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Sale;
use App\Models\Order;
use App\Models\Hr\Shareholder;
use App\Models\Accounting\Account;
use App\Models\Loans\Debtors;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function getSalesOrderPdf(){
        $order_id = $_GET['id'];
        $orderData = DB::table('sales')->join('products', 'products.id', 
        '=', 'sales.item_name' )->where('sales.order_id', '=', $order_id)
        ->where('sales.status', '=', 'Available')->get();
        $oderDet = DB::table('orders')->where('orders.id', '=', $order_id)->get();
        $userId = Order::select('to')->where('orders.id', $order_id)->get();
        $userDet = Shareholder::find($userId);
        $accounts = Account::latest()->where('account_type', '!=', 'Cash Account')->get();

        $data = [ 
                    'orderData'     => $orderData,
                    'oderDet'       => $oderDet,
                    'userDet'       => $userDet,
                    'accounts'      => $accounts,
                ];

        $pdf = Pdf::loadView('pdf.roaster.accounting.sale_order_pdf',  $data);
        return $pdf->download('order.pdf');
    }

    public function salesdelete(){
        $salesId = $_GET['id'];

        $salesData = Sale::find($salesId);
        $selling_price = $salesData->selling_price;
        $buying_price = $salesData->buying_price;
        $sold_quantity = $salesData->sold_quantity;
        $item_discount = $salesData->item_discount;
        $order_id = $salesData->order_id;
        $prodval = ($selling_price - $item_discount) * $sold_quantity;
        $prodpurch = $buying_price * $sold_quantity;
        $salesData->status = 'Un-available';
        $salesData->save();
        
        $orderData = Order::find($order_id);
        $purchase_equivalent = $orderData->purchase_equivalent;
        $order_value = $orderData->order_value;
        $orderData->purchase_equivalent = $purchase_equivalent - $prodpurch;
        $orderData->order_value = $order_value - $prodval;
        
        $new_value = $orderData->order_value;
        $new_peqvl = $orderData->purchase_equivalent;
        if($new_value == 0 && $new_peqvl == 0){
            $orderData->status = 'Un-available';
        }
        $orderData->save();

        return response()->json(array('msg'=> $salesData), 200);
    }
}

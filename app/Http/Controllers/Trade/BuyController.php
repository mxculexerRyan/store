<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prices\Buying_prices;
use App\Models\Accounting\Account;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Hr\Shareholder;
use DB;

class BuyController extends Controller
{
    public function index() { 
        $productData = DB::table('buying_prices')->join('products', 'products.id', '=', 'buying_prices.product_id')->select('products.*')->distinct()->get();
        // $productData = Product::select("*")->where("product_status", "available")->get();
        // $supplierData = Supplier::latest()->get();
        $supplierData = Shareholder::select("*")->where("role", "6")
        ->where("status", "available")->get();
        $accountsData = Account::select("*")->where("account_status", "available")->get();
        return view('activities.trade.buy', compact("productData", "supplierData", "accountsData"));
    }

    public function add(Request $request){

        $items_quantity = 1;
        $order_value = $request->sum;
        $paid_amount = $request->paid_amount;
        $order_markup = $request->order_markup;
        $paid_amount = str_replace(',','', $paid_amount);
        $order_type = 'order_in';
        $to = Auth::user()->id;
        $from = $request->to;
        $due_date = $request->due_date;
        $payment = $request->payment;

        $value = $request->order_value;
        $total = (float)str_replace(',','', $value);
        $order_markup = (float)str_replace(',','', $order_markup);
        $purchase_equivalent = $total - $order_markup;

        $data = array(
            'items_quantity'        => $items_quantity,
            'purchase_equivalent'   => $purchase_equivalent,
            'order_value'           => $total,
            'paid_amount'           => $paid_amount,
            'other_costs'           => $order_markup,
            'order_type'            => $order_type,
            'from'                  => $from,
            'to'                    => $to,
            'due_date'              => $due_date,
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        );

        DB::table('orders')->insert($data);

        $orderId       = DB::getPdo()->lastInsertId();
        $product_name = $request->product_name;
        $bprice = $request->bprice;
        $sprice = $request->sprice;
        $quantity = $request->quantity;
            $vat           = 0;
            $item_discount = 0;

        for ($i=0; $i < count($product_name); $i++) { 
            # code...
            $purchasedata = [
            'order_id'          => $orderId,
            'item_name'         => $product_name[$i],
            'buying_price'      => $bprice[$i],
            // 'selling_price'     => $sprice[$i],
            'purchased_quantity'     => $quantity[$i],
            'vat_fees'          => $vat,
            'item_discount'     => $item_discount,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),
            ];

            DB::table('purchases')->insert($purchasedata);

            $products[] = Product::find($product_name[$i]);
            $qty[] = $products[$i]->product_quantity;
            $products[$i]->product_quantity = ($qty[$i] + $quantity[$i]);
            $products[$i]->save();
        }

        // $payment
        $account = Account::find($payment);
        $balance = $account->account_balance;
        $account->account_balance = ($balance - $paid_amount);
        $newbal = $account->account_balance;
        $account->save();
        
        $transactionsData = array(
            'amount'    => $paid_amount,
            'account'   => $payment,
            'from'      => $to,
            'to'        => $from,
            'charges'   => 0,
            'nature'    => 'Cash-out',
            'reason'    => 'purchases of order No'.$orderId,
            'balance'   => $newbal,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        DB::table('transactions')->insert($transactionsData);


        if($paid_amount < $total){
            $data = array(
                'creditors_name'   => $from,
                'credited_amount'  => $total,
                'paid_amount'      => $paid_amount,
                'credit_discount'  => 0,
                'payment_method'   => $payment,
                'reason'           => 'purchases of order No: '.$orderId,
                'user_type'        => 'shareholders',
                'due_date'         => $due_date,
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            
            DB::table('creditors')->insert($data);   
        }else if($paid_amount > $total){
            $data = array(
                'debtors_name'   => $from,
                'debited_amount'  => $total,
                'paid_amount'      => $paid_amount,
                'debt_discount'    => 0,
                'payment_method'   => $payment,
                'reason'           => 'Sales of order No: '.$orderId,
                'user_type'        => 'shareholders',
                'due_date'         => $due_date,
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            
            DB::table('debtors')->insert($data); 
        }
        
        $notification  = array(
        'message' => 'New Purchase Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function buyprices(){
        $id = $_GET['id'];
        // $buyprices = Buying_prices::select("*")->where("product_id", "=", $id)->get();
        $buyprices = DB::table('buying_prices')->join('products', 'products.id', '=', 'buying_prices.product_id')
        ->where('buying_prices.product_id', '=', $id)->get();
        return response()->json(array('msg'=> $buyprices), 200);
    }

    public function neatprices(){
        $id = $_GET['id'];

        $buyprices = DB::table('buying_prices')->join('products', 'products.id', '=', 'buying_prices.product_id')
        ->where('buying_prices.product_id', '=', $id)->get();
        return response()->json(array('msg'=> $buyprices), 200);
    }

    public function buytemp(){
        $id = $_GET['id'];
        $productData = DB::table('buying_prices')->join('products', 'products.id', '=', 'buying_prices.product_id')->select('products.*')->distinct()->get();
        return response()->json([
            'msg' => view('activities.products.buytemp', compact('productData', 'id'))->render(),
        ]);
    }
}

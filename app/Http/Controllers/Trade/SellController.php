<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Prices\Selling_price;
use App\Models\Customer;
use App\Models\Accounting\Account;
use App\Models\Hr\Shareholder;
use App\Models\Order;
use DB;

class SellController extends Controller
{
    public function index() { 
        $productData = DB::table('selling_prices')->join('products', 'products.id', '=', 'selling_prices.product_id')->select('products.*')->distinct()->get();
        // $customerData = Customer::select("*")->where("customer_status", "available")->get();
        $customerData = Shareholder::select("*")->where("role", "5")
        ->where("status", "available")->get();
        $accountsData = Account::select("*")->where("account_status", "available")->get();
        return view('activities.trade.sell', compact('productData', 'customerData', 'accountsData')); 
    }

    public function saletemp(){
        $id = $_GET['id'];
        $productData = DB::table('selling_prices')->join('products', 'products.id', '=', 'selling_prices.product_id')->select('products.*')->distinct()->get();
        return response()->json([
            'msg' => view('activities.products.saletemp', compact('productData', 'id'))->render(),
        ]);
    }

    public function saleprices(){
        $id = $_GET['id'];
        $sellPrices = Selling_price::select("*")->where("product_id", "=", $id)->get();
        return response()->json(array('msg'=> $sellPrices), 200);
    }

    public function newprices(){
        $qty = $_GET['qty'];
        $id = $_GET['id'];
        $maxqty = Selling_price::orderBy('id', 'DESC')->where("product_id", $id)->pluck('maximmum_qty')->first();
        if($qty > $maxqty){
            $qty = $maxqty;
        }
        $sellPrices = Selling_price::select("*")->where([["product_id", "=", $id], ["maximmum_qty", ">=", $qty]])->get();
        return response()->json(array('msg'=> $sellPrices), 200);
    }

    // public function add(Request $request){
        
    //     $orderId       = DB::getPdo()->lastInsertId();
    //     $product_name  = $request->product_name[0];
    //     $bprice        = $request->bprice[0];
    //     $sprice        = $request->sprice[0];
    //     $quantity      = $request->quantity[0];
    //     $vat           = 0;
    //     $item_discount = 0;
    //     # code...
    //     $selldata = array(
    //         'order_id'          => $orderId,
    //         'item_name'         => $product_name,
    //         'buying_price'      => $bprice,
    //         'selling_price'     => $sprice,
    //         'sold_quantity'     => $quantity,
    //         'vat_fees'          => $vat,
    //         'item_discount'     => $item_discount,
    //         'created_at'        => date("Y-m-d H:i:s"),
    //         'updated_at'        => date("Y-m-d H:i:s"),

    //     );

    //     DB::table('sales')->insert($selldata);

        


    //     $notification  = array(
    //         'message' => 'Products Sold',
    //         'alert-type' => 'success'
    //         );

    //     return redirect()->back()->with($notification);

    // }

    public function add(Request $request){
        $request->validate([
            'items_quantity' => 'required',
            'order_value' => 'required',
            'paid_amount' => 'required',
            'to' => 'required',
            'product_name' => 'required',
            'due_date' => 'required',
        ]);

        $items_quantity = $request->items_quantity;
        $order_value = $request->order_value;

        $order_discount = $request->order_discount;        $paid_amount = $request->paid_amount;
        $payment = $request->payment;
        $paid_amount = str_replace(',','', $paid_amount);
        $order_type = 'order_out';
        $from = Auth::user()->id;
        $to = $request->to;
        $due_date = $request->due_date;

        $value = $request->order_value;
        $total = (float)str_replace(',','', $value);

        $data = array(
            'items_quantity'    => $items_quantity,
            'order_value'       => $total,
            'paid_amount'       => $paid_amount,
            'order_discount'    => $order_discount,
            'order_type'        => $order_type,
            'from'              => $from,
            'to'                => $to,
            'due_date'          => $due_date,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),
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
            $selldata = [
            'order_id'          => $orderId,
            'item_name'         => $product_name[$i],
            'buying_price'      => $bprice[$i],
            'selling_price'     => $sprice[$i],
            'sold_quantity'     => $quantity[$i],
            'vat_fees'          => $vat,
            'item_discount'     => $item_discount,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),
            ];

            DB::table('sales')->insert($selldata);

            $products[] = Product::find($product_name[$i]);
            $qty[] = $products[$i]->product_quantity;
            $products[$i]->product_quantity = ($qty[$i] - $quantity[$i]);
            $products[$i]->save();
        }

        // $payment
        $account = Account::find($payment);
        $balance = $account->account_balance;
        $account->account_balance = ($balance + $paid_amount);
        $newbal = $account->account_balance;
        $account->save();
        
        $transactionsData = array(
            'amount'    => $paid_amount,
            'account'   => $payment,
            'from'      => $to,
            'to'        => $from,
            'charges'   => 0,
            'nature'    => 'Cash-in',
            'reason'    => 'Sales of order No'.$orderId,
            'balance'   => $newbal,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );

        if($paid_amount < $total){
            $data = array(
                'debtors_name'   => $to,
                'debited_amount'  => $total - $order_discount,
                'paid_amount'  => $paid_amount,
                'debt_discount'    => $order_discount,
                'payment_method'   => $payment,
                'reason'           => 'Sales of order No: '.$orderId,
                'user_type'        => 'shareholders',
                'due_date'         => $due_date,
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            
            DB::table('debtors')->insert($data);   
        }else if($paid_amount > $total){
            $data = array(
                'creditors_name'   => $to,
                'credited_amount'  => $total - $order_discount,
                'paid_amount'      => $paid_amount,
                'credit_discount'  => $order_discount,
                'payment_method'   => $payment,
                'reason'           => 'purchases of order No: '.$orderId,
                'user_type'        => 'shareholders',
                'due_date'         => $due_date,
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            
            DB::table('creditors')->insert($data); 
        }

        DB::table('transactions')->insert($transactionsData);
            $notification  = array(
            'message' => 'Products Sold',
            'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }
        
}

<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Accounting\Purchase;
use App\Models\Prices\Selling_price;
use App\Models\Prices\Buying_prices;
use App\Models\Customer;
use App\Models\Accounting\Account;
use App\Models\Hr\Shareholder;
use App\Models\Order;
use DB;

class SellController extends Controller
{
    public function index() { 
        $productData = DB::table('selling_prices')->join('products', 'products.id', '=', 
        'selling_prices.product_id')->select('products.*')->distinct()->
        where('product_status', '=', 'available')->get();
        
        $customerData = Shareholder::select("*")->where("role", "5")->where("status", "available")->get();
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
    public function wholesaleprices(){
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
        // $buyPrices = Buying_prices::select("*")->where([["product_id", "=", $id]])->get();
        
        // $id = $_GET['id'];
        
        if($buyPrices = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.item_name')->
        where('item_name', '=', $id)->where('status', '=', 'Available')->orderByDesc('buying_price')->first()){
            return response()->json(array('msg'=> $buyPrices), 200);
        }else{
            $buyPrices = DB::table('buying_prices')
            ->join('products', 'products.id', '=', 'buying_prices.product_id')->where("buying_prices.product_id", $id)->get();
            return response()->json(array('msg'=> $buyPrices), 200);
        }
        $data = [$sellPrices, $buyPrices];
        return response()->json(array('msg'=> $data), 200);
    }

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

        $order_discount = $request->order_discount;
        $paid_amount = $request->paid_amount;
        $payment = $request->payment;
        $paid_amount = str_replace(',','', $paid_amount);
        $due_date = $request->due_date;

        function makedate($dates){
            $month = substr($dates, 3, 3);
            $dateNom = substr($dates, 0, 2);
            $yearNom = substr($dates, 7, 4);
            
            if($month == 'Jan'){$monthNom = '01';}elseif($month == 'Feb'){$monthNom = '02';}elseif($month == 'Mar'){$monthNom = '03';}elseif($month == 'Apr'){$monthNom = '04';}
            elseif($month == 'May'){$monthNom = '05';}elseif($month == 'Jun'){$monthNom = '06';}elseif($month == 'Jul'){$monthNom = '07';}elseif($month == 'Aug'){$monthNom = '08';}
            elseif($month == 'Sep'){$monthNom = '09';}elseif($month == 'Oct'){$monthNom = '10';}elseif($month == 'Nov'){$monthNom = '11';}elseif($month == 'Dec'){$monthNom = '12';}
            
            $newDate = $yearNom.'-'.$monthNom.'-'.$dateNom;
            return $newDate;
        }
        
        $time = date('H:i:s');
        $due_date = makedate($due_date).' '.$time;

        $order_type = 'order_out';
        $from = Auth::user()->id;
        $to = $request->to;

        if($custAv = Shareholder::find($to)){
            $custId = $custAv->id;
        }else{
            $custData = array(
                'name'    => $to,
                'email'   => 'cust@gmail.com',
                'phone'      => '067572167879',
                'location'      => 'Mwanza',
                'payement_method'      => 'Cash',
                'account_number'      => '123456',
                'role'      => '5',
                'created_at'       => $due_date,
                'updated_at'       => $due_date,
            );
            DB::table('shareholders')->insert($custData);
            
            $custId = DB::getPdo()->lastInsertId();
        }

        $value = $request->order_value;
        $purchase_eq = $request->purchase_eq;
        $total = (float)str_replace(',','', $value);
        $ptotal = (float)str_replace(',','', $purchase_eq);
        $order_discount = (float)str_replace(',','', $order_discount);
        // $total = $total;

        $data = array(
            'items_quantity'        => $items_quantity,
            'purchase_equivalent'   => $ptotal,
            'order_value'           => $total,
            'paid_amount'           => $paid_amount,
            'order_discount'        => $order_discount,
            'order_type'            => $order_type,
            'from'                  => $from,
            'to'                    => $custId,
            'due_date'              => $due_date,
            'created_at'            => $due_date,
            'updated_at'            => $due_date,
        );

        DB::table('orders')->insert($data);

        $orderId       = DB::getPdo()->lastInsertId();
        $product_name = $request->product_name;
        $bprice = $request->bprice;
        $sprice = $request->sprice;
        $quantity = $request->quantity;
        $prchse = $request->prchse;
        $vat           = 0;
        $item_discount = $request->discount;
        

        for ($i=0; $i < count($product_name); $i++) { 
            # code...
            $prod = substr($product_name[$i], 0, 5);
            if($prod == "added"){
                $product_name[$i] =  substr($product_name[$i], 6);
                $productdata = [
                    'product_name'          => $product_name[$i],
                    'product_key'           => $product_name[$i],
                    'product_desc'          => $product_name[$i],
                    'tag_id'                => 17,
                    'brand_id'              => 25,
                    'created_at'            => $due_date,
                    'updated_at'            => $due_date,
                ];
        
                DB::table('products')->insert($productdata);
                $product_name[$i]       = DB::getPdo()->lastInsertId();

                $buypricedata = [
                    'product_id'            => $product_name[$i],
                    'buying_price'          => $bprice[$i],
                    'min_qty'               => 1,
                    'created_at'            => $due_date,
                    'updated_at'            => $due_date,
                ];
                DB::table('buying_prices')->insert($buypricedata);

                $sellpricedata = [
                    'product_id'            => $product_name[$i],
                    'min_qty'               => 1,
                    'selling_price'          => $sprice[$i],
                    'created_at'            => $due_date,
                    'updated_at'            => $due_date,
                ];
                DB::table('selling_prices')->insert($sellpricedata);
            }
            
            $products[] = Product::find($product_name[$i]);
            $qty[] = $products[$i]->product_quantity;
            $products[$i]->product_quantity = ($qty[$i] - $quantity[$i]);
            $products[$i]->save();

            if($qty[$i] < 0){
                $qty[$i] = 0;
            }

            if(($item_discount[$i]) == null){
                $item_discount[$i] = 0;
            }
            $selldata = [
            'order_id'          => $orderId,
            'item_name'         => $product_name[$i],
            'buying_price'      => $bprice[$i],
            'selling_price'     => $sprice[$i],
            'sold_quantity'     => $quantity[$i],
            'item_discount'     => $item_discount[$i],
            'stock_qty'         => $qty[$i],
            'vat_fees'          => $vat,
            'created_at'        => $due_date,
            'updated_at'        => $due_date,
            ];

            DB::table('sales')->insert($selldata);

            if($purchase[] = Purchase::find($prchse[$i])){

                $solq[] = $purchase[$i]->sold;
                $puqty[] = $purchase[$i]->purchased_quantity;
                $purchase[$i]->sold = ($solq[$i] + $quantity[$i]);
                $newsalq[] = $purchase[$i]->sold;
                if($newsalq[$i] >= $puqty[$i]){
                    $purchase[$i]->status = 'Un-available';
                }
                $purchase[$i]->save();
            }
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
            'from'      => $custId,
            'to'        => $from,
            'charges'   => 0,
            'nature'    => 'Cash-in',
            'reason'    => 'Sales of order No'.$orderId,
            'balance'   => $newbal,
            'created_at'       => $due_date,
            'updated_at'       => $due_date,
        );

        if($paid_amount < $total){
            $data = array(
                'debtors_name'   => $custId,
                'debited_amount'  => $total,
                'paid_amount'  => $paid_amount,
                'debt_discount'    => $order_discount,
                'payment_method'   => $payment,
                'reason'           => 'Sales of order No: '.$orderId,
                'user_type'        => 'shareholders',
                'due_date'         => $due_date,
                'created_at'       => $due_date,
                'updated_at'       => $due_date,
            );
            
            DB::table('debtors')->insert($data);   
        }else if($paid_amount > $total){
            $credited = ($paid_amount - $total);
            $data = array(
                'creditors_name'   => $custId,
                'credited_amount'  => $credited,
                'paid_amount'      => 0,
                'credit_discount'  => $order_discount,
                'payment_method'   => $payment,
                'reason'           => 'purchases of order No: '.$orderId,
                'user_type'        => 'shareholders',
                'due_date'         => $due_date,
                'created_at'       => $due_date,
                'updated_at'       => $due_date,
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

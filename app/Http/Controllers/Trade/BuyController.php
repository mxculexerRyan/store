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
        $productData = DB::table('buying_prices')->join('products', 'products.id', '=', 'buying_prices.product_id')->select('products.*')
        ->distinct()->where('product_status', '=', 'available')->get();
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
        
        $order_type = 'order_in';
        $to = Auth::user()->id;
        $from = $request->to;

        if($suppAv = Shareholder::find($from)){
            $suppId = $suppAv->id;
        }else{
            $suppData = array(
                'name'    => $from,
                'email'   => 'supp@gmail.com',
                'phone'      => '067572167879',
                'location'      => 'Mwanza',
                'payement_method'      => 'Cash',
                'account_number'      => '123456',
                'role'      => '6',
                'created_at'       => $due_date,
                'updated_at'       => $due_date,
            );
            DB::table('shareholders')->insert($suppData);
            
            $suppId = DB::getPdo()->lastInsertId();
        }
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
            'from'                  => $suppId,
            'to'                    => $to,
            'due_date'              => $due_date,
            'created_at'            => $due_date,
            'updated_at'            => $due_date,
        );

        DB::table('orders')->insert($data);

        $orderId       = DB::getPdo()->lastInsertId();
        $product_name = $request->product_name;
        $bprice = $request->bprice;
        $markup = $request->markup;
        $sprice = $request->sprice;
        $quantity = $request->quantity;
            $vat           = 0;
            $item_discount = 0;

        for ($i=0; $i < count($product_name); $i++) { 
            # code...
            $status = 'Available';
            $paid = '0';

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
            if($qty[$i] < 0){
                $products[$i]->product_quantity = $quantity[$i];
                if((($qty[$i] * -1) > $quantity[$i]) or (($qty[$i] * -1) == $quantity[$i])){
                    $status = 'Un-available';
                    $paid = $quantity[$i];
                }else{
                    $paid = ($qty[$i] * -1);
                    $status = 'Available';
                }
            }else{
                $products[$i]->product_quantity = ($qty[$i] + $quantity[$i]);
            }
            $products[$i]->save();
            
            $purchasedata = [
            'order_id'          => $orderId,
            'item_name'         => $product_name[$i],
            'buying_price'      => $bprice[$i] + $markup[$i],
            // 'selling_price'     => $sprice[$i],
            'purchased_quantity'    => $quantity[$i],
            'vat_fees'          => $vat,
            'item_discount'     => $item_discount,
            'status'            => 'Available',
            'paid'            => $paid,
            'created_at'            => $due_date,
            'updated_at'            => $due_date,
            ];

            DB::table('purchases')->insert($purchasedata);
        }

        // $payment
        $account = Account::find($payment);
        $balance = $account->account_balance;
        $account->account_balance = ($balance - $paid_amount);
        $newbal = $account->account_balance;
        $account->save();
        
        $transactionsData = array(
            'amount'        => $paid_amount,
            'account'       => $payment,
            'from'          => $to,
            'to'            => $suppId,
            'charges'       => 0,
            'nature'        => 'Cash-out',
            'reason'        => 'purchases of order No'.$orderId,
            'balance'       => $newbal,
            'created_at'    => $due_date,
            'updated_at'    => $due_date,
        );
        DB::table('transactions')->insert($transactionsData);


        if($paid_amount < $total){
            $data = array(
                'creditors_name'   => $suppId,
                'credited_amount'  => $total,
                'paid_amount'      => $paid_amount,
                'credit_discount'  => 0,
                'payment_method'   => $payment,
                'reason'           => 'purchases of order No: '.$orderId,
                'user_type'        => 'shareholders',
                'due_date'         => $due_date,
                'created_at'       => $due_date,
                'updated_at'       => $due_date,
            );
            
            DB::table('creditors')->insert($data);   
        }else if($paid_amount > $total){
            $data = array(
                'debtors_name'   => $from,
                'debited_amount'  => ($paid_amount - $total),
                'paid_amount'      => 0,
                'debt_discount'    => 0,
                'payment_method'   => $payment,
                'reason'           => 'Sales of order No: '.$orderId,
                'user_type'        => 'shareholders',
                'due_date'         => $due_date,
                'created_at'       => $due_date,
                'updated_at'       => $due_date,
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

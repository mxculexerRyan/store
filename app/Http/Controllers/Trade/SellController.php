<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Prices\Selling_price;
use App\Models\Customer;
use App\Models\Order;
use DB;

class SellController extends Controller
{
    public function index() { 
        $productData = Product::select("*")->where("product_status", "available")->get();
        $customerData = Customer::select("*")->where("customer_status", "available")->get();
        return view('activities.trade.sell', compact('productData', 'customerData')); 
    }

    public function saletemp(){
        $id = $_GET['id'];
        $productData = Product::select("*")->where("product_status", "available")->get();
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
        $sellPrices = Selling_price::select("*")->where("minimum_qty", ">=", $qty)->get();
        return response()->json(array('msg'=> $sellPrices), 200);
    }

    public function add(Request $request){
        $request->validate([
            'items_quantity' => 'required',
            'order_value' => 'required',
            'paid_amount' => 'required',
            'to' => 'required',
            'product_name' => 'required',
        ]);


        $items_quantity = $request->items_quantity;
        $order_value = $request->order_value;
        $paid_amount = $request->paid_amount;
        $order_type = 'order_out';
        $from = Auth::user()->id;
        $to = $request->to;

        $value = $request->order_value;
        $total = (float)str_replace(',','', $value);

        $data = array(
            'items_quantity'    => $items_quantity,
            'order_value'       => $total,
            'paid_amount'       => $paid_amount,
            'order_type'        => $order_type,
            'from'              => $from,
            'to'                => $to,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),
        );

        DB::table('orders')->insert($data);

        $notification  = array(
            'message' => 'Products Sold',
            'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    }
}

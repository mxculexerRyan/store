<?php

namespace App\Http\Controllers\Prices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prices\Buying_prices;
use App\Models\Supplier;
use App\Models\Product;
use DB;

class Buying_pricesController extends Controller
{
    public function index(){
        // $buying_priceData = Buying_prices::latest()->get();
        $buying_priceData = DB::table('products')
        ->join('buying_prices', 'products.id', '=', 'buying_prices.product_id')
        ->where('product_status', '=', 'available')->where('buying_prices.status', '=', 'available')
        ->get();
        return view("activities.prices.buying_price", compact("buying_priceData"));
    }

    public function add(Request $request){

        $request->validate([
            'product_name' => 'required',
            'min_qty' => 'required',
            'product_price' => 'required',
            'product_price' => 'required',
        ]);

        $product_name   = $request->product_name;
        $min_qty        = $request->min_qty;
        $product_price  = $request->product_price;
        $product_price  = str_replace(',','', $product_price);

        $data = array(
            'product_id'    => $product_name,
            'min_qty'       => $min_qty,
            'buying_price'  => $product_price,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        );
        
        DB::table('buying_prices')->insert($data);
        
        $notification  = array(
        'message' => 'New Prices Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit(Request $request){
        $id   = $request->buyprice_id;
        $buying_price   = $request->buying_price;
        $min_qty   = $request->min_qty;

        $buypriceData = Buying_prices::find($id);
        $buypriceData->buying_price = $buying_price;
        $buypriceData->min_qty = $min_qty;
        $buypriceData->save();

        $notification  = array(
            'message' => 'Prices Updated',
            'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    }

    public function buypricedata(){
        $id = $_GET['id'];
        $buypriceData = DB::table('products')->join('buying_prices', 'products.id', '=', 'buying_prices.product_id')->where("buying_prices.id","=", $id)->get();
        return response()->json(array('msg'=> $buypriceData), 200);
    }

    public function buypricesdelete(){
        $id = $_GET['id'];
        $buypriceData = Buying_prices::find($id);
        $buypriceData->status = 'Unavailable';
        $buypriceData->save();

        return response()->json(array('msg'=> $id), 200);

    }

}

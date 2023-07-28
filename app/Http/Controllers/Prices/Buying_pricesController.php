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
        $buying_priceData = Buying_prices::latest()->get();
        return view("activities.prices.buying_price", compact("buying_priceData"));
    }

    public function add(Request $request){

        $request->validate([
            'product_name' => 'required',
            'supplier_name' => 'required',
            'product_price' => 'required',
        ]);

        $product_name   = $request->product_name;
        $supplier_name = $request->supplier_name;
        $product_price = $request->product_price;

        $data = array(
            'product_id'    => $product_name,
            'supplier_id'   => $supplier_name,
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

}

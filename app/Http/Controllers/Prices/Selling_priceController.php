<?php

namespace App\Http\Controllers\Prices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prices\Selling_price;
use DB;

class Selling_priceController extends Controller
{
    public function index(){
        $Selling_priceData = Selling_price::latest()->get();
        return view("activities.prices.selling_price", compact("Selling_priceData"));
    }

    public function add(Request $request){

        $request->validate([
            'product_name'  => 'required',
            'maximmum_qty'  => 'required',
            'selling_price' => 'required',
        ]);

        $product_name    = $request->product_name;
        $maximmum_qty    = $request->maximmum_qty;
        $selling_price   = $request->selling_price;

        $data = array(
            'product_id'     => $product_name,
            'maximmum_qty'   => $maximmum_qty,
            'selling_price'  => $selling_price,
            'created_at'     => date("Y-m-d H:i:s"),
            'updated_at'     => date("Y-m-d H:i:s"),
        );
        
        DB::table('selling_prices')->insert($data);
        
        $notification  = array(
        'message' => 'New Prices Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

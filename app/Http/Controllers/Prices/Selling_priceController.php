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
            'min_qty'  => 'required',
            'selling_price' => 'required',
        ]);

        $product_name    = $request->product_name;
        $min_qty         = $request->min_qty;
        $selling_price   = $request->selling_price;
        $selling_price = str_replace(',','', $selling_price);

        $data = array(
            'product_id'     => $product_name,
            'min_qty'        => $min_qty,
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

    public function edit(Request $request){
        $id   = $request->sellPrice_id;
        $selling_price   = $request->selling_price;
        $min_qty   = $request->min_qty;
        $shop_price   = $request->shop_price;
        $shop_qty   = $request->shop_qty;
        $caton_price   = $request->caton_price;
        $caton_qty   = $request->caton_qty;

        $sellpricedata = Selling_price::find($id);
        $sellpricedata->selling_price = $selling_price;
        $sellpricedata->min_qty = $min_qty;
        $sellpricedata->shop_price = $shop_price;
        $sellpricedata->shop_qty = $shop_qty;
        $sellpricedata->caton_price = $caton_price;
        $sellpricedata->caton_qty = $caton_qty;
        $sellpricedata->save();

        $notification  = array(
            'message' => 'Prices Updated',
            'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    }

    public function sellpricedata(){
        $id = $_GET['id'];
        $sellpricedata = DB::table('products')->join('selling_prices', 'products.id', '=', 'selling_prices.product_id')->where("selling_prices.id","=", $id)->get();
        return response()->json(array('msg'=> $sellpricedata), 200);
    }
}

<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prices\Selling_price;
use App\Models\Product;
use App\Models\Supplier;
use DB;

class BuyController extends Controller
{
    public function index() { 
        $productData = DB::table('buying_prices')->join('products', 'products.id', '=', 'buying_prices.product_id')->select('products.*')->distinct()->get();
        // $productData = Product::select("*")->where("product_status", "available")->get();
        $supplierData = Supplier::latest()->get();
        return view('activities.trade.buy', compact("productData", "supplierData"));
    }

    public function add(){
        $productData = Product::select("*")->where("product_status", "available")->get();
        return response()->json(['msg' => view('activities.products.productlist', compact('data'))->render(),]);
    }
}

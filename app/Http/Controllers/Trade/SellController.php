<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Prices\Selling_price;

class SellController extends Controller
{
    public function index() { 
        $productData = Product::select("*")->where("product_status", "available")->get();
        return view('activities.trade.sell', compact('productData')); 
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
}

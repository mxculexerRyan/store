<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prices\Selling_price;
use App\Models\Product;

class BuyController extends Controller
{
    public function index() { 
        $productData = Product::select("*")->where("product_status", "available")->get();
        return view('activities.trade.buy', compact("productData"));
    }
}

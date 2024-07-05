<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
USE DB;

class StockController extends Controller
{
    //
    public function index() {
        $stockData = DB::table('purchases')->join('products', 'products.id', '=', 'purchases.item_name')->get();
        return view('roster.accounting.stock', compact('stockData')); 
    }
}

<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Purchase;
use DB;

class PurchaseController extends Controller
{
    public function index(){
        $salesData = DB::table('purchases')->join('products', 'products.id', '=', 'purchases.item_name' )->orderBy('purchases.id', 'DESC')->get();
        return view('roster.accounting.purchases', compact('salesData'));
    }
}

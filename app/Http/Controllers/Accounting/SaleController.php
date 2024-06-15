<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Sale;
use DB;

class SaleController extends Controller
{
    public function index(){
        // $salesData = Sale::latest()->get();
        $salesData = DB::table('sales')->join('products', 'products.id', '=', 'sales.item_name' )
        // ->where('orders.order_type', '=', 'order_in')
        // ->whereColumn('orders.order_value', '!=', 'paid_amount')
        ->get();
        return view('roster.accounting.sales', compact('salesData'));
    }
}

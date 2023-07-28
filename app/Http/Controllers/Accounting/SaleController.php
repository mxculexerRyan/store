<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Sale;

class SaleController extends Controller
{
    public function index(){
        $salesData = Sale::latest()->get();
        return view('roster.accounting.sales', compact('salesData'));
    }
}

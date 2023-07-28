<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Purchase;

class PurchaseController extends Controller
{
    public function index(){
        $salesData = Purchase::latest()->get();
        return view('roster.accounting.sales', compact('salesData'));
    }
}

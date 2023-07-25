<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orderData = Order::latest()->get();
        return view('roster.accounting.orders', compact('orderData'));
    }
}

<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Loans\Debtors;

class OrderController extends Controller
{
    public function index(){
        $orderData = Order::latest()->where('status', '=', 'Available')
        ->orderBy('id', 'DESC')->get();
        return view('roster.accounting.orders', compact('orderData'));
    }

    public function delete(){
        $order_id = $_GET['id'];

        $debtData = Debtors::where('reason', 'Sales of order No: '.$order_id)->first();
        $debtData->status = "Pending";
        $debtData->save();
        
        $orderData = Order::find($order_id);
        $orderData->status = "Un-available";
        $orderData->save(); 


        $notification  = array(
            'message'    => 'Order Deleted',
            'alert-type' => 'error'
            );

        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Loans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loans\Creditors;
use DB;

class CreditorsController extends Controller
{
    //
    public function index(){
        $creditsData = Creditors::latest()->whereColumn('paid_amount', '!=', 'credited_amount')->get();
        $creditSales = DB::table('customers')->join('orders', 'orders.to', '=', 'customers.id' )
        ->whereColumn('order_value', '!=', 'paid_amount')
        ->get();
        return view('activities.loans.credit', compact('creditsData', 'creditSales'));
    }

    public function add(Request $request){
        $request->validate([
            'creditors_name' => 'required',
            'credited_amount' => 'required',
            'creditors_phone' => 'required',
            'credit_reason' => 'required',
        ]);
        
        $creditors_name = $request->creditors_name;
        $credited_amount = $request->credited_amount;
        $creditors_phone = $request->creditors_phone;
        $credit_reason = $request->credit_reason;

        $data = array(
            'creditors_name'   => $creditors_name,
            'credited_amount'  => $credited_amount,
            'creditors_phone'  => $creditors_phone,
            'reason'           => $credit_reason,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        
        DB::table('creditors')->insert($data);
        
        $notification  = array(
        'message' => 'Credit Data Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}

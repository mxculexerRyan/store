<?php

namespace App\Http\Controllers\Loans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loans\Debtors;
use DB;

class DebtorsController extends Controller
{
    //
    public function index(){
        $debtsData = Debtors::latest()->whereColumn('paid_amount', '!=', 'debited_amount')->get();
        $debtPurchases = DB::table('suppliers')->join('orders', 'orders.from', '=', 'suppliers.id' )
        // ->whereColumn('order_value', '!=', 'paid_amount')
        ->get();
        return view('activities.loans.debts', compact('debtsData', 'debtPurchases'));
    }

    public function add(Request $request){
        $request->validate([
            'debtors_name'   => 'required',
            'debited_amount' => 'required',
            'debtors_phone'  => 'required',
            'debit_reason'   => 'required',
            'due_date'   => 'required',
            'payment'   => 'required',
        ]);

        $debtors_name = $request->debtors_name;
        $debited_amount = $request->debited_amount;
        $debtors_phone = $request->debtors_phone;
        $debit_reason = $request->debit_reason;
        $due_date = $request->due_date;
        $payment = $request->payment;

        $data = array(
            'debtors_name'     => $debtors_name,
            'debited_amount'   => $debited_amount,
            'debtors_phone'    => $debtors_phone,
            'reason'           => $debit_reason,
            'due_date'         => $due_date,
            'payment'          => $payment,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        
        DB::table('debtors')->insert($data);
        
        $notification  = array(
        'message' => 'Debt Data Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

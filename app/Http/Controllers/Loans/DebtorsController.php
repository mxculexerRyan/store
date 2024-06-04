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
        $debtPurchases = DB::table('shareholders')->join('orders', 'orders.to', '=', 'shareholders.id' )
        ->where('orders.order_type', '=', 'order_out')
        ->whereColumn('orders.order_value', '!=', 'orders.paid_amount')
        ->get();
        return view('activities.loans.debts', compact('debtsData', 'debtPurchases'));
    }

    public function add(Request $request){
        $request->validate([
            'debtors_name'   => 'required',
            'debited_amount' => 'required',
            'debit_reason'   => 'required',
            'payment'   => 'required',
            'due_date'   => 'required',
        ]);

        $debtors_name = $request->debtors_name;
        $debited_amount = $request->debited_amount;
        $debit_reason = $request->debit_reason;
        $payment = $request->payment;
        $due_date = $request->due_date;
        $payment = $request->payment;

        $debtors_role = substr($debtors_name, 0, 1);
        if($debtors_role == 'u'){
            $debtors_role = 'users';
        }else{
            $debtors_role = 'shareholders';
        }

        $debtors_name = substr($debtors_name, 2);

        $data = array(
            'debtors_name'     => $debtors_name,
            'debited_amount'   => $debited_amount,
            'reason'           => $debit_reason,
            'due_date'         => $due_date,
            'payment_method'   => $payment,
            'user_type'        => $debtors_role,
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

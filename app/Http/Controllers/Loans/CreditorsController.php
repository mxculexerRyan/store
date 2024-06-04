<?php

namespace App\Http\Controllers\Loans;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Loans\Creditors;
use App\Models\Accounting\Account;
use DB;

class CreditorsController extends Controller
{
    //
    public function index(){
        $creditsData = Creditors::latest()->whereColumn('paid_amount', '!=', 'credited_amount')->get();
        $creditSales = DB::table('shareholders')->join('orders', 'orders.from', '=', 'shareholders.id' )
        ->where('orders.order_type', '=', 'order_in')
        ->whereColumn('orders.order_value', '!=', 'paid_amount')
        ->get();
        // $debtPurchases = DB::table('shareholders')->join('orders', 'orders.to', '=', 'shareholders.id' )
        // ->where('orders.order_type', '=', 'order_out')
        // ->whereColumn('orders.order_value', '!=', 'orders.paid_amount')
        // ->get();
        return view('activities.loans.credit', compact('creditsData', 'creditSales'));
    }

    public function add(Request $request){
        $request->validate([
            'creditors_name' => 'required',
            'credited_amount' => 'required',
            'account' => 'required',
            'credit_reason' => 'required',
            'due_date' => 'required',
        ]);
        
        $creditors_name = $request->creditors_name;
        $credited_amount = $request->credited_amount;
        $payment_method = $request->account;
        $credit_reason = $request->credit_reason;
        $due_date = $request->due_date;

        $creditors_role = substr($creditors_name, 0, 1);
        if($creditors_role == 'u'){
            $creditors_role = 'users';
        }else{
            $creditors_role = 'shareholders';
        }

        $creditors_name = substr($creditors_name, 2);

        $data = array(
            'creditors_name'   => $creditors_name,
            'credited_amount'  => $credited_amount,
            'payment_method'   => $payment_method,
            'reason'           => $credit_reason,
            'user_type'        => $creditors_role,
            'due_date'         => $due_date,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        
        DB::table('creditors')->insert($data);

        // $payment_method
        $account = Account::find($payment_method);
        $balance = $account->account_balance;
        $account->account_balance = ($balance + $credited_amount);
        $newbal = $account->account_balance;
        $account->save();


        $receiver = Auth::user()->id;
        $transactionsData = array(
            'amount'    => $credited_amount,
            'account'   => $payment_method,
            'from'      => $creditors_name,
            'to'        => $receiver,
            'charges'   => 0,
            'nature'    => 'Cash-in',
            'reason'    => 'credit_reason',
            'balance'   => $newbal,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        DB::table('transactions')->insert($transactionsData);
        
        $notification  = array(
        'message' => 'Credit Data Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

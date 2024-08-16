<?php

namespace App\Http\Controllers\Loans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Loans\Debtors;
use App\Models\Accounting\Account;
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
        $accountsData = Account::select("*")->where("account_status", "available")->get();
        return view('activities.loans.debts', compact('debtsData', 'debtPurchases','accountsData'));
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
        $due_date = $request->due_date;
        $status = substr($debtors_name, 0, 5);
        if($status == "added"){
            $debtors_name =  substr($debtors_name, 6);
            $shareData = array(
                'name'    => $debtors_name,
                'email'   => 'custmer_xx@gmail.com',
                'phone'      => '0xxxxxxxxxx',
                'location'      => 'Unknown',
                'payement_method'      => 'Cash',
                'account_number'      => 'xxxxx',
                'role'      => '5',
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            DB::table('shareholders')->insert($shareData);
            
            $debtors_name = "s-".DB::getPdo()->lastInsertId();
        }
        $debited_amount = $request->debited_amount;
        $debit_reason = $request->debit_reason;
        $payment = $request->payment;
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
        
        // $payment
        $account = Account::find($payment);
        $balance = $account->account_balance;
        $account->account_balance = ($balance - $debited_amount);
        $newbal = $account->account_balance;
        $account->save();
        
        $sender = Auth::user()->id;
        $transactionsData = array(
            'amount'    => $debited_amount,
            'account'   => $payment,
            'from'      => $sender,
            'to'        => $debtors_name,
            'charges'   => 0,
            'nature'    => 'Cash-out',
            'reason'    => $debit_reason,
            'balance'   => $newbal,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        DB::table('transactions')->insert($transactionsData);

        $notification  = array(
        'message' => 'Debt Data Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function debsdata(){
        $debtId = $_GET['id'];
        $debtData = DB::table('shareholders')->join('debtors', 'debtors.debtors_name', '=', 'shareholders.id')
        ->where('debtors.id', '=', $debtId)->get();
        return response()->json(array('msg'=> $debtData), 200);
    }

    public function edit(Request $request){
        $edit_payment = $request->edit_payment;
        $payment_method = $request->payment_method;
        $from = $request->from;
        $debtId = $request->debtId;
        $receiver = Auth::user()->id;

        // $payment_method
        $debt = Debtors::find($debtId);
        $paid_amount = $debt->paid_amount;
        $debt->paid_amount = ($edit_payment + $paid_amount);
        $debt->save();

        $account = Account::find($payment_method);
        $balance = $account->account_balance;
        $account->account_balance = ($balance + $edit_payment);
        $newbal = $account->account_balance;
        $account->save();

        $transactionsData = array(
            'amount'    => $edit_payment,
            'account'   => $payment_method,
            'from'      => $from,
            'to'        => $receiver,
            'charges'   => 0,
            'nature'    => 'Debt-pay',
            'reason'    => 'Payment of Debt No: '.$debtId,
            'balance'   => $newbal,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        DB::table('transactions')->insert($transactionsData);

        $notification  = array(
            'message' => 'Debt Paid Succesfull',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Accounting\Account;
use DB;
class ExpensesController extends Controller
{
    public function index(){
        $expensesData = Expense::latest()->get();
        $accountsData = Account::select("*")->where("account_status", "available")->get();
        return view('roster.accounting.expenses', compact('expensesData', 'accountsData'));
    }

    public function add(Request $request){
        $id = Auth::user()->id;

        $request->validate([
            'expense_name'          => 'required',
            'expense_amount'        => 'required',
            'expense_description'   => 'required',
            'account'               => 'required',
            'expense_receipt'       => 'required',
        ]);

        $expense_name           = $request->expense_name;
        $expense_amount         = $request->expense_amount;
        $expense_description    = $request->expense_description;
        $account_number         = $request->account;
        $expense_receipt        = "";

        if($request->file('expense_receipt')){
            $file     = $request->file('expense_receipt');
            $filename = "Receipt_".date('YmdHi')."_".$file->getClientOriginalName();
            $file->move(public_path('uploads/receipts/'),$filename);
            $expense_receipt = $filename;
        }

        $data = array(
            'expense_name'          => $expense_name,
            'expense_amount'        => $expense_amount,
            'expense_description'   => $expense_description ,
            'account'               => $account_number ,
            'paid_by'               => $id,
            'expense_receipt'       => $expense_receipt,
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        );
        
        DB::table('expenses')->insert($data);
        $expensesId = DB::getPdo()->lastInsertId();
        // $payment
        $account = Account::find($account_number);
        $balance = $account->account_balance;
        $account->account_balance = ($balance - $expense_amount);
        $newbal = $account->account_balance;
        $account->save();
        
        $transactionsData = array(
            'amount'    => $expense_amount,
            'account'   => $account_number,
            'from'      => $id ,
            'to'        => $id ,
            'charges'   => 0,
            'nature'    => 'Spent',
            'reason'    => 'Expense No: '.$expensesId,
            'balance'   => $newbal,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        DB::table('transactions')->insert($transactionsData);

        $notification  = array(
        'message'    => 'New expenses Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
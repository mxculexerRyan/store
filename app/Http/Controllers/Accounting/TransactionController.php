<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Accounting\Transaction;
use App\Models\Accounting\Account;
use DB;

class TransactionController extends Controller
{
    public function index(){
        $transactionData = DB::table('transactions')->join('accounts', 'accounts.id', '=', 'transactions.account')->get();
        $productData = DB::table('selling_prices')->join('products', 'products.id', '=', 'selling_prices.product_id')->select('products.*')->distinct()->get();
        $accountsData = Account::select("*")->where("account_status", "available")->get();
        
        return view('roster.accounting.transactions', compact('transactionData', 'accountsData'));
    }

    public function add(Request $request){
        $request->validate([
            'amount'      => 'required',
            'account'     => 'required',
            'from'        => 'required',
            'to'          => 'required',
            'direction'   => 'required',
            'description' => 'required',
        ]);

            $amount       = $request->amount;
            $payment      = $request->account;
            $from         = $request->from;
            $to           = $request->to;
            $direction    = $request->direction;
            $description  = $request->description;

        // $payment
        $account = Account::find($payment);
        $balance = $account->account_balance;
        if($direction == 'Cash-in'){
            $account->account_balance = ($balance + $amount);
        }else if($direction == 'Cash-out'){
            $account->account_balance = ($balance - $amount);
        }else if($direction == 'Transfered'){
            $account->account_balance = ($balance + $amount);
            $fromPayment = Account::find($from);
            $fromBalance = $fromPayment->account_balance;
            $fromPayment->account_balance = ($fromBalance - $amount);
        }
        $newbal = $account->account_balance;
        $account->save();
        $fromPayment->save();

        $data = array(
            'amount'      => $amount,
            'account'     => $payment,
            'from'        => $from,
            'to'          => $to,
            'charges'     => 0,
            'nature'      => $direction,
            'reason'      => $description,
            'balance'     => $newbal ,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        );
        
        DB::table('transactions')->insert($data);

        $notification  = array(
            'message'    => 'New Transaction Added',
            'alert-type' => 'success'
            );
    
        return redirect()->back()->with($notification);
    }
}

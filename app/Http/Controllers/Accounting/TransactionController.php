<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Accounting\Transaction;
use DB;

class TransactionController extends Controller
{
    public function index(){
        $transactionData = DB::table('transactions')->join('accounts', 'accounts.id', '=', 'transactions.account')->get();
        $productData = DB::table('selling_prices')->join('products', 'products.id', '=', 'selling_prices.product_id')->select('products.*')->distinct()->get();
        
        return view('roster.accounting.transactions', compact('transactionData'));
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
            $account      = $request->account;
            $from         = $request->from;
            if($from == "shop"){
                $from = Auth::user()->id;
            }
            $to           = $request->to;
            if($to == "shop"){
                $to = Auth::user()->id;
            }
            $direction    = $request->direction;
            $description  = $request->description;

        $data = array(
            'amount'      => $amount,
            'account'     => $account,
            'from'        => $from,
            'to'          => $to,
            'charges'     => 0,
            'nature'      => $direction,
            'reason'      => $description,
            'balance'     => 0,
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

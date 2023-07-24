<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use DB;
class ExpensesController extends Controller
{
    public function index(){
        $expensesData = Expense::latest()->get();
        return view('roster.accounting.expenses', compact('expensesData'));
    }

    public function add(Request $request){
        $id = Auth::user()->id;

        $request->validate([
            'expense_name'          => 'required',
            'expense_description'   => 'required',
            'expense_amount'        => 'required',
            'paid_to'               => 'required',
            'expense_receipt'       => 'required',
        ]);

        $expense_name           = $request->expense_name;
        $expense_description    = $request->expense_description;
        $expense_amount         = $request->expense_amount;
        $paid_to                = $request->paid_to;
        $expense_receipt        = "";

        if($request->file('expense_receipt')){
            $file     = $request->file('expense_receipt');
            $filename = "Receipt_".date('YmdHi')."_".$file->getClientOriginalName();
            $file->move(public_path('uploads/receipts/'),$filename);
            $expense_receipt = $filename;
        }

        $data = array(
            'budjet_id'             => $expense_name,
            'expense_description'   => $expense_description,
            'expense_amount'        => $expense_amount,
            'paid_to'               => $paid_to,
            'paid_by'               => $id,
            'expense_receipt'       => $expense_receipt,
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        );
        
        DB::table('expenses')->insert($data);

        

        $notification  = array(
        'message'    => 'New expenses Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
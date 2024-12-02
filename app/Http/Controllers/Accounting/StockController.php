<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Loans\Debtors;
use App\Models\Accounting\Account;
use Barryvdh\DomPDF\Facade\Pdf;
USE DB;

class StockController extends Controller
{
    //
    public function index() {
        // $stockData = DB::table('purchases')->join('products', 'products.id', '=', 'purchases.item_name')->get();

        $stockData = Product::where('product_status', '=', 'available')->get();
        $tagsData = Tag::where('tag_status', '=', 'available')->get();
        $DebtsData = Debtors::where('status', '=', 'Available')->get();
        $accountData = Account::where('account_status', '=', 'available')->get();
        $debited = $DebtsData->sum('debited_amount');
        $paid = $DebtsData->sum('paid_amount');
        $discount = $DebtsData->sum('debt_discount');
        $balance = $accountData->sum('account_balance');

        $debt = $debited - $paid - $discount;
        return view('roster.accounting.stock', compact('stockData', 'debt', 'balance', 'tagsData')); 
    }

    public function stocksdata(){
        $productId = $_GET['id'];
        $productsData = DB::table('products')
        ->join('selling_prices', 'selling_prices.product_id', '=', 'products.id')
        ->where('products.id', '=', $productId)
        ->get();
        return response()->json(array('msg'=> $productsData), 200);
    }

    public function edit(Request $request){
        $id   = $request->product_id;
        $available_qty   = $request->available_qty;

        $productData = Product::find($id);
        $productData->product_quantity = $available_qty;
        $productData->save();

        $notification  = array(
            'message' => 'Quantity Updated',
            'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    }

    public function getStocksPdf(){
        $stockData = DB::table('products')
        ->join('selling_prices', 'products.id', '=', 'selling_prices.product_id' )
        ->join('buying_prices', 'products.id', '=', 'buying_prices.product_id' )
        ->orderBy('products.id', 'DESC')->get();

        $tagData = Tag::where('tag_status', '=', 'available')->get();
        $data = [ 
                    'stockData' => $stockData,
                    'tagData'     => $tagData,
                ];

        $pdf = Pdf::loadView('pdf.accounting.stocks_pdf',  $data);
        return $pdf->download('stocks.pdf');
    }
}

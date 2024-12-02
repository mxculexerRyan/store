<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class ReportController extends Controller
{
    public function index(){
        $salesData = DB::table('sales')->join('products', 'products.id', '=', 'sales.item_name' )->get();
        return view('roster.accounting.reports', compact('salesData'));
    }

    public function reportsdata(){
        $sdate = $_GET['sDate'];
        $edate = $_GET['eDate'];

        function makedate($dates){
            $month = substr($dates, 3, 3);
            $dateNom = substr($dates, 0, 2);
            $yearNom = substr($dates, 7, 4);
            
            if($month == 'Jan'){$monthNom = '01';}elseif($month == 'Feb'){$monthNom = '02';}elseif($month == 'Mar'){$monthNom = '03';}elseif($month == 'Apr'){$monthNom = '04';}
            elseif($month == 'May'){$monthNom = '05';}elseif($month == 'Jun'){$monthNom = '06';}elseif($month == 'Jul'){$monthNom = '07';}elseif($month == 'Aug'){$monthNom = '08';}
            elseif($month == 'Sep'){$monthNom = '09';}elseif($month == 'Oct'){$monthNom = '10';}elseif($month == 'Nov'){$monthNom = '11';}elseif($month == 'Dec'){$monthNom = '12';}
            
            $newDate = $yearNom.'-'.$monthNom.'-'.$dateNom;
            return $newDate;
        }
        
        $time = date('H:i:s');
        $startDate = makedate($sdate).' 00:00:00';
        $endDate = makedate($edate).' '.$time;
        
        
        $salesOrderData = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(order_value) AS sum')])
        ->where('order_type', '=', 'order_out')->where('status', '=', 'available')
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        // $salesOrderData = DB::table('sales')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(sold_quantity * selling_price) AS sum')])
        // ->whereColumn('sold_quantity', '<=', 'stock_qty')
        // ->where('status', '=', 'Available')
        // ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        $paidDefficiency = DB::table('sales')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(sold_quantity * selling_price) AS sum')])
        ->whereColumn('sold_quantity', '<=', 'stock_qty')->where('status', '=', 'Available')
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        // $salesOverData = DB::table('sales')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM((sold_quantity - stock_qty)*buying_price) AS sum')])
        // ->whereColumn('sold_quantity', '>', 'stock_qty')
        // ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        $purchasesOrderData = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(purchase_equivalent) AS sum')])
        ->where('order_type', '=', 'order_out')->where('status', '=', 'available')
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();
        
        // $purchasesOrderData = DB::table('purchases')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM((purchased_quantity - paid)*buying_price) AS sum')])
        // // ->where('status', '=', 'Available')
        // ->whereColumn('paid', '<', 'purchased_quantity')->where('status', '=', 'Available')
        // ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        $oversales = DB::table('sales')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM((sold_quantity - stock_qty)*selling_price) AS sum')])
        ->whereColumn('sold_quantity', '>', 'stock_qty')->where('status', '=', 'Available')
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();
        
        $saleswithin = DB::table('sales')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM((stock_qty)*selling_price) AS sum')])
        ->whereColumn('sold_quantity', '>', 'stock_qty')->where('status', '=', 'Available')
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        $deficiency = DB::table('sales')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM((sold_quantity - stock_qty)*buying_price) AS sum')])
        ->whereColumn('sold_quantity', '>', 'stock_qty')->where('status', '=', 'Available')
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        $stockData = DB::table('purchases')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM((purchased_quantity - sold - paid)*buying_price) AS sum')])
        ->where('status', '=', 'Available')
        ->whereColumn('sold', '<', 'purchased_quantity')
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        $replaceData = DB::table('purchases')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM((paid)*buying_price) AS sum')])
        ->where('status', '=', 'Available')
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();

        $discountData = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(order_discount) AS sum')])
        ->where('order_type', '=', 'order_out')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)
        ->where('status', '=', 'Available')->get();
        
        $markupData = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(other_costs) AS sum')])
        ->where('order_type', '=', 'order_in')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)
        ->where('status', '=', 'Available')->get();

        $accountsData = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(paid_amount) AS sum')])
        ->where('order_type', '=', 'order_out')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)
        ->where('status', '=', 'Available')->get();
        
        $debtsData = DB::table('debtors')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(debited_amount) AS debtsum'), DB::raw('SUM(paid_amount) AS debtpay'), DB::raw('SUM(debt_discount) AS debtdisc')])
        ->whereColumn('paid_amount', '!=', 'debited_amount')->where('status', '=', 'Available')->get();
        
        $creditsData = DB::table('creditors')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(credited_amount) AS creditsum'), DB::raw('SUM(paid_amount) AS credpay', DB::raw('SUM(credit_discount) AS creditdisc'))])
        ->whereColumn('paid_amount', '!=', 'credited_amount')->where('status', '=', 'Available')->get();
        
        $ExpensesData = DB::table('expenses')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(expense_amount) AS sum')])
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->where('status', '=', 'Available')->get();
        
        $countSales = DB::table('orders')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->where('order_type', '=', 'order_out')
        ->where('status', '=', 'Available')->count();
        
        $paidCredits = DB::table('orders')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->where('order_type', '=', 'order_out')
        ->where('status', '=', 'Available')->count();
        
        $dateData = [$startDate, $endDate, $purchasesOrderData, $ExpensesData, 
        $salesOrderData, 
        $discountData, $debtsData, $creditsData, $accountsData, $markupData,  $stockData, 
        $oversales, $deficiency, $replaceData, $saleswithin];
        return response()->json(array('msg'=> $dateData), 200);
    }

    
}


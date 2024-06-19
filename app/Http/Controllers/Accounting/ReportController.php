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
        ->where('order_type', '=', 'order_out')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();
        $purchasesOrderData = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(purchase_equivalent) AS sum')])
        ->where('order_type', '=', 'order_out')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();
        $discountData = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(order_discount) AS sum')])
        ->where('order_type', '=', 'order_out')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();
        
        $accountsData = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(paid_amount) AS sum')])
        ->where('order_type', '=', 'order_out')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->get();
        $debtsData = DB::table('debtors')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(debited_amount) AS debtsum'), DB::raw('SUM(paid_amount) AS paysum')])
        
        // ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)
        ->whereColumn('paid_amount', '!=', 'debited_amount')->where('status', '=', 'Available')->get();
        $creditsData = DB::table('creditors')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(credited_amount) AS creditsum'), DB::raw('SUM(paid_amount) AS paysum')])
        // ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)
        ->whereColumn('paid_amount', '!=', 'credited_amount')->where('status', '=', 'Available')->get();
        $ExpensesData = DB::table('expenses')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(expense_amount) AS sum')])
        ->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->where('status', '=', 'Available')->get();
        $countSales = DB::table('orders')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->where('order_type', '=', 'order_out')->count();
        $paidCredits = DB::table('orders')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->where('order_type', '=', 'order_out')->count();
        // $dateData = [$salesOrderValue];
        $dateData = [$startDate, $endDate, $purchasesOrderData, $ExpensesData, $salesOrderData, $discountData, $debtsData, $creditsData, $accountsData];

        return response()->json(array('msg'=> $dateData), 200);
    }

    
}


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
        
        
        $countAll = DB::table('orders')->select([DB::raw('COUNT(*) AS count'), DB::raw('SUM(order_value) AS sum')])
        ->where('created_at', '<=', $endDate)->where('order_type', '=', 'order_out')->count();
        $countPurchases = DB::table('orders')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->where('order_type', '=', 'order_in')->count();
        $countDebts = DB::table('debtors')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->count();
        $countCredits = DB::table('creditors')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->count();
        $countExpenses = DB::table('expenses')->where('created_at', '>', $startDate)->where('created_at', '<=', $endDate)->count();
        // $dateData = $countExpenses;
        $dateData = [$startDate, $endDate, $countAll, $countPurchases, $countDebts, $countCredits, $countExpenses];

        return response()->json(array('msg'=> $dateData), 200);
    }

    
}


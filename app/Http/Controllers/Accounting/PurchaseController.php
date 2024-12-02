<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Purchase;
use App\Models\Order;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    public function index(){
        $salesData = DB::table('purchases')->join('products', 'products.id', '=', 'purchases.item_name' )->orderBy('purchases.id', 'DESC')->get();
        return view('roster.accounting.purchases', compact('salesData'));
    }

    public function getPurchasesOrderPdf(){
        $order_id = $_GET['id'];
        $orderData = DB::table('purchases')->join('products', 'products.id', 
        '=', 'purchases.item_name' )->where('purchases.order_id', '=', $order_id)
        ->where('purchases.status', '=', 'Available')->get();

        $data = [ 
                    'orderData' => $orderData,
                ];

        $pdf = Pdf::loadView('pdf.roaster.accounting.purchase_order_pdf',  $data);
        return $pdf->download('products.pdf');
    }

    public function purchasesdata(){
        $purchasesId = $_GET['id'];
        $purchasesData = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.item_name' )
        ->where('purchases.id', '=', $purchasesId)->orderBy('purchases.id', 'DESC')->get();
        return response()->json(array('msg'=> $purchasesData), 200);
    }

    public function purchasesdelete(){
            $purchaseId = $_GET['id'];
    
            $purchasesData = Purchase::find($purchaseId);
            $buying_price = $purchasesData->buying_price;
            $purchased_quantity = $purchasesData->purchased_quantity;
            $item_discount = $purchasesData->item_discount;
            $order_id = $purchasesData->order_id;

            $prodval = ($buying_price - $item_discount) * $purchased_quantity;
            $purchasesData->status = 'Un-available';
            $purchasesData->save();
            
            $orderData = Order::find($order_id);
            $purchase_equivalent = $orderData->purchase_equivalent;
            $order_value = $orderData->order_value;
            $orderData->purchase_equivalent = $purchase_equivalent - $prodval;
            $orderData->order_value = $order_value - $prodval;
            
            $new_value = $orderData->order_value;
            $new_peqvl = $orderData->purchase_equivalent;
            if($new_value == 0 && $new_peqvl == 0){
                $orderData->status = 'Un-available';
            }
            $orderData->save();
    
            return response()->json(array('msg'=> $orderData), 200);
    }
}

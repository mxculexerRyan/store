<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prices\Selling_price;

class GroupController extends Controller
{
    public function saleprices(){
        $id = $_GET['id'];
        $sellPrices = Selling_price::select("*")->where("product_id", "=", $id)->get();
        return response()->json(array('msg'=> $sellPrices), 200);
    }
}

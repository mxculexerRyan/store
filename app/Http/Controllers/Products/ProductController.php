<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\Product;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Prices\Buying_prices;
class ProductController extends Controller
{
    public function index(){ 
        $productData = Product::latest()->where('product_status', '=', 'available')->get();
        $brandData = Brand::latest()->get();
        return view('activities.products.product', compact('productData'));
    }

    public function prodlist(){
        $id = $_GET['id'];
        $productData = Product::select("*")->where("product_status", "available")->get();
        $supplierData = Supplier::latest()->get();
        return response()->json([
            'msg' => view('activities.products.productlist', compact('productData', 'id', 'supplierData'))->render(),
        ]);
    }

    public function prodsupp(){
        $id = $_GET['id'];
        $supplierData = DB::table('buying_prices')->join('suppliers', 'suppliers.id', '=', 'buying_prices.supplier_id' )
        ->join('products', 'products.id', '=', 'buying_prices.product_id')->where("buying_prices.product_id", $id)->get();
        return response()->json([
            'msg' => view('activities.products.productsuppliers', compact('supplierData', 'id'))->render(),
        ]);
    }

    public function prodprices(){
        $id = $_GET['id'];
        
        $buyPrices = Buying_prices::select("*")->where("product_id", "=", $id)->get();
        return response()->json(array('msg'=> $buyPrices), 200);
        // if($buyPrices = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.item_name')->
        // where('item_name', '=', $id)->where('status', '=', 'Available')->orderByDesc('buying_price')->first()){
        //     return response()->json(array('msg'=> $buyPrices), 200);
        // }else{
        //     $buyPrices = DB::table('buying_prices')
        //     ->join('products', 'products.id', '=', 'buying_prices.product_id')->where("buying_prices.product_id", $id)->get();
        //     return response()->json(array('msg'=> $buyPrices), 200);
        // }

    }
    public function sellprices(){
        $id = $_GET['id'];
        $sellingData = DB::table('selling_prices')->join('products', 'products.id', '=', 'selling_prices.product_id')
        ->where("selling_prices.product_id", $id)->get();
        return response()->json(array('msg'=> $sellingData), 200);
    }
    public function add(Request $request){

        $request->validate([
            'brand_name' => 'required',
            'tag_name' => 'required',
            'product_name' => 'required|unique:products',
            'product_key' => 'required',
            'product_desc' => 'required',
        ]);

        $tag_name = $request->tag_name;
        $tag_status = substr($tag_name, 0, 5);
        if($tag_status == "added"){
            $tag_name =  substr($tag_name, 6);
            $tagData = array(
                'tag_name'      => $tag_name,
                'tag_key'       => $tag_name,
                'tag_desc'      => $tag_name,
                'tag_status'    => 'Available',
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            DB::table('tags')->insert($tagData);
            
            $tag_name = DB::getPdo()->lastInsertId();
        }
        $brand_name = $request->brand_name;
        $brand_status = substr($brand_name, 0, 5);
        if($brand_status == "added"){
            $brand_name =  substr($brand_name, 6);
            $brandData = array(
                'brand_name'      => $brand_name,
                'brand_key'       => $brand_name,
                'brand_desc'      => $brand_name,
                'brand_status'    => 'Available',
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            DB::table('brands')->insert($brandData);
            
            $brand_name = DB::getPdo()->lastInsertId();
        }
        $product_name = $request->product_name;
        $product_key = $request->product_key;
        $product_desc = $request->product_desc;
        $bprice = $request->buy_price;
        $sprice = $request->sell_price;

        $data = array(
            'product_name'  => $product_name,
            'product_key'   => $product_key,
            'product_desc'  => $product_desc,
            'brand_id'      => $brand_name,
            'tag_id'        => $tag_name,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        );
        
        DB::table('products')->insert($data);
        $product_name       = DB::getPdo()->lastInsertId();
        $buypricedata = [
            'product_id'            => $product_name,
            'buying_price'          => $bprice,
            'min_qty'               => 1,
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        ];
        DB::table('buying_prices')->insert($buypricedata);

        $sellpricedata = [
            'product_id'            => $product_name,
            'min_qty'               => 1,
            'selling_price'         => $sprice,
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        ];
        DB::table('selling_prices')->insert($sellpricedata);

        $notification  = array(
        'message' => 'New Product Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function getProductsPdf(){
        $productData = DB::table('products')->join('selling_prices', 'products.id', '=', 'selling_prices.product_id' )
        ->join('buying_prices', 'products.id', '=', 'buying_prices.product_id' )
        ->orderBy('products.id', 'DESC')->get();

        $tagData = Tag::where('tag_status', '=', 'available')->get();
        $data = [ 
                    'productData' => $productData,
                    'tagData'     => $tagData,
                ];

        $pdf = Pdf::loadView('pdf.activities.products.products_pdf',  $data);
        return $pdf->download('products.pdf');
    }

    function productdata(){
        $id = $_GET['id'];
        $productData = DB::table('products')->latest()->where("id","=", $id)->get();
        return response()->json(array('msg'=> $productData), 200);
    }

    public function edit(Request $request){
        $id = $request->prodId;
        $prod_name = $request->product_name;
        $prod_key = $request->product_key;
        $prod_desc = $request->product_desc;
        $tag_name = $request->tag_name;
        $tag_status = substr($tag_name, 0, 5);
        if($tag_status == "added"){
            $tag_name =  substr($tag_name, 6);
            $tagData = array(
                'tag_name'      => $tag_name,
                'tag_key'       => $tag_name,
                'tag_desc'      => $tag_name,
                'tag_status'    => 'Available',
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            DB::table('tags')->insert($tagData);
            
            $tag_name = DB::getPdo()->lastInsertId();
        }
        $brand_name = $request->brand_name;
        $brand_status = substr($brand_name, 0, 5);
        if($brand_status == "added"){
            $brand_name =  substr($brand_name, 6);
            $brandData = array(
                'brand_name'      => $brand_name,
                'brand_key'       => $brand_name,
                'brand_desc'      => 'Bidhaa za '.$brand_name,
                'brand_status'    => 'Available',
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            );
            DB::table('brands')->insert($brandData);
            
            $brand_name = DB::getPdo()->lastInsertId();
        }

        $prodData = Product::find($id);
        $prodData->product_name = $prod_name;
        $prodData->product_key = $prod_key;
        $prodData->product_desc = $prod_desc;
        $prodData->tag_id = $tag_name;
        $prodData->brand_id = $brand_name;
        $prodData->save();

        $notification  = array(
            'message' => 'Product Updated Succesfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function productsdelete(){
        $productId = $_GET['id'];

        $productData = Product::find($productId);
        $productData->product_status = 'unavailable';
        $productData->save();

        return response()->json(array('msg'=> $productData), 200);
    }
}

<?php

namespace App\View\Components\prices;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Prices\Buying_prices;
use DB;

class sellingpricemodal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $productId = DB::table('products')->distinct()->get();
        $productId = Buying_prices::select('product_id')->distinct()->get();

        return view('components.prices.sellingpricemodal', compact("productId"));
    }
}

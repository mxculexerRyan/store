<?php

namespace App\View\Components\prices;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Supplier;

class buyingpricemodal extends Component
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

        $productData = Product::latest()->get();
        $supplierData = Supplier::latest()->get();
        return view('components.prices.buyingpricemodal', compact("productData", "supplierData"));
    }
}

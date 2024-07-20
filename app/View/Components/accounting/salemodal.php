<?php

namespace App\View\Components\accounting;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Accounting\Account;
use DB;

class salemodal extends Component
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
        $productData = DB::table('buying_prices')->join('products', 'products.id', '=', 'buying_prices.product_id')->select('products.*')->distinct()->get();
        $accountsData = Account::select("*")->where("account_status", "available")->get();
        return view('components.accounting.salemodal', compact('accountsData', 'productData'));
    }
}

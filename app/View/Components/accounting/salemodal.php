<?php

namespace App\View\Components\accounting;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Accounting\Account;

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

        $accountsData = Account::select("*")->where("account_status", "available")->get();
        return view('components.accounting.salemodal', compact('accountsData'));
    }
}

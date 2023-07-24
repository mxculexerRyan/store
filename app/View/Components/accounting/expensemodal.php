<?php

namespace App\View\Components\accounting;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Budjet;
use App\Models\Service_provider;
use App\Models\User;

class expensemodal extends Component
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

        $budjetData = Budjet::latest()->get();
        $serviceProviderData = Service_provider::latest()->get();
        $userData = User::latest()->get();
        return view('components.accounting.expensemodal', compact('budjetData', 'serviceProviderData', 'userData'));
    }
}

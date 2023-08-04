<?php

namespace App\View\Components\accounting;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Hr\Group;

class commisionmodal extends Component
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
        $groupData = Group::latest()->get();
        return view('components.accounting.commisionmodal', compact('groupData'));
    }
}

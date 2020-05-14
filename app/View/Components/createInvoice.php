<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Auth;
use App\Models\Zis;
use App\Models\ZisType;
use App\Models\InvoiceZis;

class createInvoice extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $todayHijri =\GeniusTS\HijriDate\Date::today()->format('Y');
        $ZisType = ZisType::all()->sortBy('id')->pluck('zis_name', 'id');
        return view('components.create-invoice', compact('ZisType','todayHijri'));
    }
}

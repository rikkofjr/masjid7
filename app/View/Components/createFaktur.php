<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Zis;
use App\Models\ZisType;
use App\Models\InvoiceZis;

class createFaktur extends Component
{
    public $zis;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($zis)
    {
        $this->zis = $zis;
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
        return view('components.create-faktur', compact('ZisType','todayHijri'));
    }
}

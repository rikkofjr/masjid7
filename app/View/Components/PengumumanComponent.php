<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Pengumuman;

class PengumumanComponent extends Component
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
        $pengumuman = Pengumuman::limit(3)->get();
        return view('components.pengumuman-component', compact('pengumuman'));
    }
}

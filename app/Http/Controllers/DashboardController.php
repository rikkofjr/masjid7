<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasPengeluaran;
use App\Models\KasPenerimaan;
use App\Models\DataJamaah;

use DB;
class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){
        $totalJamaah = DataJamaah::all();
        $totalKasPenerimaan = KasPenerimaan::sum('penerimaan');  
        $totalKasPengeluaran = KasPengeluaran::sum('pengeluaran');  
        return view ('dashboard.home', compact('totalJamaah', 'totalKasPenerimaan','totalKasPengeluaran'));
    }
}

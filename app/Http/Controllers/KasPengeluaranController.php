<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasPengeluaran;
use App\Models\KasPenerimaan;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use Auth;
use App\User;

use Carbon\Carbon;
use DataTables;
use Ramsey\Uuid\Uuid;

use DB;

class KasPengeluaranController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isPengurus']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nowMasehi = Carbon::today()->format('Y');
        $kasPengeluaran = KasPengeluaran::orderBy('id', 'DESC')->get();
        $totalKasPenerimaan = KasPenerimaan::sum('Penerimaan');
        $totalKasPengeluaran = KasPengeluaran::sum('pengeluaran');
        return view('dashboard.kas.Pengeluaran.index', compact('nowMasehi', 'kasPengeluaran', 'totalKasPenerimaan', 'totalKasPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nowMasehi = Carbon::today()->format('Y');
        return view('dashboard.kas.pengeluaran.create', compact('nowMasehi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'keterangan.required' => 'Keterangan Wajid Diisi',
            'pengeluaran.required' => 'Jumlah uang dikeluarkan harap diisi',
        ];
        $this->validate($request, [
            'keterangan'=>'required', 
            'pengeluaran'=>'required'
        ],$messages);
        $kp = new KasPengeluaran;
        $kp->keterangan = $request->keterangan;
        $kp->catatan = $request->catatan;
        $kp->pengeluaran = str_replace(".", "", $request->pengeluaran);
        $kp->pj = Auth::user()->id;
        $kp->save();
        
        return redirect()->route('kas-pengeluaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

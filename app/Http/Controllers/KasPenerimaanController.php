<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasPenerimaan;
use App\Models\KasPengeluaran;

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

class KasPenerimaanController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nowMasehi = Carbon::today()->format('Y');
        $kasPenerimaan = KasPenerimaan::orderBy('id', 'DESC')->get();
        $totalKasPenerimaan = KasPenerimaan::sum('penerimaan');
        $totalKasPengeluaran = KasPengeluaran::sum('pengeluaran');
        return view('dashboard.kas.penerimaan.index', compact('nowMasehi', 'kasPenerimaan', 'totalKasPenerimaan', 'totalKasPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nowMasehi = Carbon::today()->format('Y');
        return view('dashboard.kas.penerimaan.create', compact('nowMasehi'));
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
            'penerimaan.required' => 'Jumlah uang diterima harap diisi',
        ];
        $this->validate($request, [
            'keterangan'=>'required', 
            'penerimaan'=>'required'
        ],$messages);
        $kp = new KasPenerimaan;
        $kp->keterangan = $request->keterangan;
        $kp->catatan = $request->catatan;
        $kp->penerimaan = str_replace(".", "", $request->penerimaan);
        $kp->pj = Auth::user()->id;
        $kp->save();

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

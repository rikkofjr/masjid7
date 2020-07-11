<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qurban;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use Auth;
use App\User;

use Carbon\Carbon;
use DataTables;
use DB;
use PDF;

class QurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index()
    {
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $nowMasehi = Carbon::today()->format('Y');
        //qurban kambing
        $qurbanKambing = Qurban::orderBy('id','asc')
        ->whereYear('hijri',$nowHijri)
        ->where('jenis_hewan', 1)
        ->get();

        //qurban domba
        $qurbanDomba = Qurban::orderBy('id','asc')
        ->whereYear('hijri',$nowHijri)
        ->where('jenis_hewan', 2)
        ->get();
        
        $qurbanSapi = Qurban::orderBy('id','asc')
        ->whereYear('hijri',$nowHijri)
        ->where('jenis_hewan', 3)
        ->get();
       
        return view('dashboard.qurban.index1', compact(
            'qurbanKambing', 'qurbanDomba', 'qurbanSapi',
            'nowHijri','nowMasehi'
        ));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        return view('dashboard.qurban.create', compact('nowHijri'));
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
            'atas_nama.required' => 'Atas Nama Formulir Wajid Diisi',
            'jenis_hewan.required' => 'Jenis Hewan harap diisi',
            'alamat.required' => 'Alamat Pengirim Hewan harap diisi',
            'nomor_handphone.required' => 'Nomor handphone harap diisi',
        ];
        $this->validate($request, [
            'atas_nama'=>'required', 
            //'amil'=>'required', 
            'jenis_hewan'=>'required', 
            'alamat'=>'required', 
            'nomor_handphone'=>'required', 
        ],$messages);

        $qurban = new Qurban;
        $qurban->jenis_hewan = $request->jenis_hewan;
        $qurban->penerima = Auth::user()->id;
        $qurban->atas_nama = $request->atas_nama;
        $qurban->nama_lain = $request->nama_lain;
        $qurban->alamat = $request->alamat;
        $qurban->permintaan= $request->permintaan;
        $qurban->nomor_handphone= $request->nomor_handphone;
        $qurban->disaksikan= $request->disaksikan;
        $qurban->hijri = \GeniusTS\HijriDate\Date::today();
        $qurban->save();

        return redirect()->route('qurban.show', $qurban->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qurban = Qurban::findOrFail($id);
        return view('dashboard.qurban.show', compact('qurban'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qurban = Qurban::findOrFail($id);
        return view('dashboard.qurban.edit', compact('qurban'));
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
        $messages = [
            'atas_nama.required' => 'Atas Nama Formulir Wajid Diisi',
            'jenis_hewan.required' => 'Jenis Hewan harap diisi',
            'alamat.required' => 'Alamat Pengirim Hewan harap diisi',
            'nomor_handphone.required' => 'Nomor handphone harap diisi',
        ];
        $this->validate($request, [
            'atas_nama'=>'required', 
            //'amil'=>'required', 
            'jenis_hewan'=>'required', 
            'alamat'=>'required', 
            'nomor_handphone'=>'required', 
        ],$messages);

        $qurban = Qurban::findOrFail($id);
        $qurban->jenis_hewan = $request->jenis_hewan;
        $qurban->penerima = Auth::user()->id;
        $qurban->atas_nama = $request->atas_nama;
        $qurban->nama_lain = $request->nama_lain;
        $qurban->alamat = $request->alamat;
        $qurban->permintaan= $request->permintaan;
        $qurban->nomor_handphone= $request->nomor_handphone;
        $qurban->disaksikan= $request->disaksikan;
        $qurban->hijri = \GeniusTS\HijriDate\Date::today();
        $qurban->save();

        return redirect()->route('qurban.show', $qurban->id);
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
    public function softDelete($id){
        //softdelte record
        if(Auth::user()->hasPermissionTo('Soft Delete Masjid Report')){
            $qurban = Qurban::findOrFail($id);
            $msg = 'Data atas nama '.$qurban->atas_nama.' berhasil dihapus';
            $qurban->delete();
            session()->put('hapus', $msg);
            return redirect()->route('qurban.index');  
        }else{
            abort('404');
        }
         
    }
    //addtitional funcion
    public function qurbanArchive(){
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $qurbanArsip = Qurban::select(
            DB::raw('count(jenis_hewan) as jumlahSapi'), 
            DB::raw("DATE_FORMAT(hijri,'%Y') as tahunHijriah")
                )
                ->groupBy('tahunHijriah')
                ->orderBy('tahunHijriah', 'DESC')
                ->limit(5)
                ->get();

        return $qurbanArsip;
        //return view('dashboard.qurban.arsip', compact('qurbanArsip'));
    }
    public function PrintHewan($jenis_hewan){
        $todayHijri =\GeniusTS\HijriDate\Date::today()->format('Y');
        $hewan = Qurban::where('jenis_hewan',$jenis_hewan)->whereYear('hijri', $todayHijri)->orderBy('id', 'ASC')->get();

        //return $hewan;
        $pdf = PDF::loadview('dashboard.qurban.print.print-full',[
            'hewan'=>$hewan, 
            'todayHijri'=>$todayHijri, 
            ])->setPaper('a4', 'landscape');
        return $pdf->stream('hewan'.$jenis_hewan.'.pdf');
        
    }
    public function PrintHewanJamaah($nomor_hewan){
        $qurban = Qurban::findOrFail($nomor_hewan);
        $customPaper = array(0,0,500,500);
        $pdf = PDF::loadview('dashboard.qurban.print.print',[
            'qurban'=>$qurban, 
            ])->setPaper($customPaper);
        return $pdf->stream('hewan-jamaah'.$nomor_hewan.'-'.$qurban->atas_nama.'.pdf');
    }

}

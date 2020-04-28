<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zis;
use App\Models\ZisType;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use Auth;
use App\User;

use Carbon\Carbon;
use DataTables;
use Ramsey\Uuid\Uuid;
use PDF;
use DB;

class ZisController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    /*
    * Export data to Json for client
    */
    public function getFitrahDataByYear(){
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $nowMasehi = Carbon::today()->format('Y');
        $dataFitrah = Zis::orderBy('id','desc')
        ->whereYear('hijri',$nowHijri)
        ->where('zis_name', 1)->get(); 
        return Datatables::of($dataFitrah)
            ->editColumn(('uang'), function ($datafitrah){
                return $datafitrah->uang ? with (number_format($datafitrah->uang)) : '';
            })
            ->editColumn(('uang_infaq'), function ($datafitrah){
                return $datafitrah->uang_infaq ? with (number_format($datafitrah->uang_infaq)) : '';
            })
            ->editColumn('created_at', function ($datafitrah){
                return $datafitrah->created_at ? with (new carbon($datafitrah->created_at))->format('d/m/Y | H:i') : '';
            })
            ->removeColumn('updated_at','nama_lain','zis_name')
            //->addIndexColumn()
            ->make();
    } 
    public function getMallDataByYear(){
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $nowMasehi = Carbon::today()->format('Y');
        $dataFitrah = Zis::orderBy('id','desc')
        ->whereYear('hijri',$nowHijri)
        ->where('zis_name', 2)
        ;
        return Datatables::of($dataFitrah)
        ->editColumn('created_at', function ($datafitrah){
            return $datafitrah->created_at ? with (new carbon($datafitrah->created_at))->format('d/m/Y | H:i') : '';
        })
        ->editColumn(('uang'), function ($datafitrah){
            return $datafitrah->uang ? with (number_format($datafitrah->uang)) : '';
        })
        ->editColumn(('uang_infaq'), function ($datafitrah){
            return $datafitrah->uang_infaq ? with (number_format($datafitrah->uang_infaq)) : '';
        })
        ->removeColumn('updated_at','nama_lain','zis_name')
        //->addIndexColumn()
        ->make();
    }
    public function getFidyahDataByYear(){
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $nowMasehi = Carbon::today()->format('Y');
        $dataFitrah = Zis::orderBy('id','desc')
        ->whereYear('hijri',$nowHijri)
        ->where('zis_name', 3)
        ;
        return Datatables::of($dataFitrah)
        //->editColumn('uang' function($dataFitrah))
        ->editColumn('created_at', function ($datafitrah){
            return $datafitrah->created_at ? with (new carbon($datafitrah->created_at))->format('d/m/Y | H:i') : '';
        })
        ->editColumn(('uang'), function ($datafitrah){
            return $datafitrah->uang ? with (number_format($datafitrah->uang)) : '';
        })
        ->editColumn(('uang_infaq'), function ($datafitrah){
            return $datafitrah->uang_infaq ? with (number_format($datafitrah->uang_infaq)) : '';
        })
        ->removeColumn('updated_at','nama_lain','zis_name')
        //->addIndexColumn()
        ->make();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $nowMasehi = Carbon::today()->format('Y');
        $fitrah = Zis::orderBy('id','desc')
        ->whereYear('hijri',$nowHijri)
        ->where('zis_name', 1)
        ->get();
        $jumlahUangZakatFitrahTahunIni = Zis::where('zis_name', 1)->whereYear('hijri',$nowHijri)->sum('uang');
        $jumlahUangInfaqFitrahTahunIni = Zis::where('zis_name', 1)->whereYear('hijri',$nowHijri)->sum('uang_infaq');
        $jumlahBerasZakatFitrahTahunIni = Zis::where('zis_name', 1)->whereYear('hijri',$nowHijri)->sum('beras');
        $jumlahBerasInfaqFitrahTahunIni = Zis::where('zis_name', 1)->whereYear('hijri',$nowHijri)->sum('beras_infaq');
        //Mall
        $jumlahUangZakatMallTahunIni = Zis::where('zis_name', 2)->whereYear('hijri',$nowHijri)->sum('uang');
        $jumlahUangInfaqMallTahunIni = Zis::where('zis_name', 2)->whereYear('hijri',$nowHijri)->sum('uang_infaq');
        $jumlahBerasZakatMallTahunIni = Zis::where('zis_name', 2)->whereYear('hijri',$nowHijri)->sum('beras');
        $jumlahBerasInfaqMallTahunIni = Zis::where('zis_name', 2)->whereYear('hijri',$nowHijri)->sum('beras_infaq');
        //Fidyah
        $jumlahUangZakatFidyahTahunIni = Zis::where('zis_name', 3)->whereYear('hijri',$nowHijri)->sum('uang');
        $jumlahUangInfaqFidyahTahunIni = Zis::where('zis_name', 3)->whereYear('hijri',$nowHijri)->sum('uang_infaq');
        $jumlahBerasZakatFidyahTahunIni = Zis::where('zis_name', 3)->whereYear('hijri',$nowHijri)->sum('beras');
        $jumlahBerasInfaqFidyahTahunIni = Zis::where('zis_name', 3)->whereYear('hijri',$nowHijri)->sum('beras_infaq');
        $jumlahJiwaFitrahTahunIni = Zis::where('zis_name', 1)->whereYear('hijri',$nowHijri)->sum('jumlah_jiwa');
        return view('dashboard.zis.index', compact(
            'fitrah',
            'nowHijri','nowMasehi', 
            'jumlahUangZakatFitrahTahunIni','jumlahUangInfaqFitrahTahunIni','jumlahBerasZakatFitrahTahunIni','jumlahBerasInfaqFitrahTahunIni',
            'jumlahUangZakatMallTahunIni','jumlahUangInfaqMallTahunIni','jumlahBerasZakatMallTahunIni','jumlahBerasInfaqMallTahunIni',
            'jumlahUangZakatFidyahTahunIni','jumlahUangInfaqFidyahTahunIni','jumlahBerasZakatFidyahTahunIni','jumlahBerasInfaqFidyahTahunIni',
            'jumlahJiwaFitrahTahunIni'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$hijri = ;
        $todayHijri =\GeniusTS\HijriDate\Date::today()->format('Y');
        $ZisType = ZisType::all()->sortBy('id')->pluck('zis_name', 'id');
        return view('dashboard.zis.create', compact('ZisType','todayHijri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $messages = [
            'atas_nama.required' => 'Atas Nama Formulir Wajid Diisi',
            'jumlah_jiwa.required' => 'Jumlah jiwa harap diisi',
            'zis_name.required' => 'Jenis zakat harap diisi',
        ];
        $this->validate($request, [
            'zis_name'=>'required', 
            //'amil'=>'required', 
            'atas_nama'=>'required', 
            'jumlah_jiwa'=>'required', 
        ],$messages);

        $zis = new Zis;
        $zis->zis_name = $request->zis_name;
        $zis->amil = Auth::user()->id;
        $zis->atas_nama = $request->atas_nama;
        $zis->nama_lain = $request->nama_lain;
        $zis->jumlah_jiwa = $request->jumlah_jiwa;
        if(isset($request->uang)){
            $zis->uang = str_replace(".", "", $request->uang);
        }else if(isset($request->uang_infaq)){
            $zis->uang_infaq = str_replace(".", "", $request->uang_infaq);
        }

        $zis->beras = $request->beras;
        $zis->beras_infaq = $request->beras_infaq;
        $zis->uuidq = Uuid::uuid4()->getHex();
        $zis->hijri = \GeniusTS\HijriDate\Date::today();
        $zis->save();

    //Display a successful message upon save
        //dd($zis);
        return redirect()->route('zis.show', $zis->id);
        //return $zis->uuidq;
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zis = Zis::findOrFail($id);
        return view('dashboard.zis.show', compact('zis'));
        //return $zis;
        //dd($zis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zis = Zis::findOrFail($id); //Get user with specified id
        $ZisType = ZisType::all()->sortBy('id')->pluck('zis_name', 'id');
        return view('dashboard.zis.edit', compact('zis','ZisType'));
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
        //Validating title and body field
        $messages = [
            'atas_nama.required' => 'Atas Nama Formulir Wajid Diisi',
            'jumlah_jiwa.required' => 'Jumlah jiwa harap diisi',
            'zis_name.required' => 'Jenis zakat harap diisi',
        ];
        $this->validate($request, [
            'zis_name'=>'required', 
            //'amil'=>'required', 
            'atas_nama'=>'required', 
            'jumlah_jiwa'=>'required', 
        ],$messages);

        $zis = Zis::findOrFail($id);
        $zis->zis_name = $request->zis_name;
        //$zis->amil = Auth::user()->id;
        $zis->atas_nama = $request->atas_nama;
        $zis->nama_lain = $request->nama_lain;
        $zis->jumlah_jiwa = $request->jumlah_jiwa;
        $zis->uang = $request->uang;
        $zis->uang_infaq = $request->uang_infaq;
        $zis->beras = $request->beras;
        $zis->beras_infaq = $request->beras_infaq;
        $zis->hijri = \GeniusTS\HijriDate\Date::today();
        $zis->save();

    //Display a successful message upon save
        //dd($zis);
        return redirect()->route('zis.show', $zis->uuid)->with('Berubah', 'Berhasil dirubahh');
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
            $zis = zis::findOrFail($id);
            $zis->delete();
            session()->put('hapus', $msg);
            return route('zis.index');  
        }else{
            abort('404');
        }
         
    }

    //addtional function
    /*
        this function will be use for "arsip"
    */
    public function zisArchive(){
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $zisFitrah = Zis::select(
            DB::raw('sum(uang) as totalUang'), 
            DB::raw('sum(uang_infaq) as totalUangInfaq'), 
            DB::raw('sum(beras) as totalBeras'), 
            DB::raw('sum(beras_infaq) as totalBerasInfaq'), 
            //DB::raw("DATE_FORMAT(created_at,'%Y') as tahunMasehi"),
            DB::raw("DATE_FORMAT(hijri,'%Y') as tahunHijriah")
                )
                ->groupBy('tahunHijriah')
                ->orderBy('created_at', 'DESC')
                ->where('zis_name', 1)
                ->limit(5)
                ->get();

        $zisMall = Zis::select(
            DB::raw('sum(uang) as totalUang'), 
            DB::raw('sum(uang_infaq) as totalUangInfaq'), 
            DB::raw('sum(beras) as totalBeras'), 
            DB::raw('sum(beras_infaq) as totalBerasInfaq'), 
            DB::raw("DATE_FORMAT(hijri,'%Y') as tahunHijriah")
                )
                ->groupBy('tahunHijriah')
                ->orderBy('created_at', 'DESC')
                ->where('zis_name', 2)
                ->limit(5)
                ->get();
        //return $zisFitrah->toJson();
        return view('dashboard.zis.arsip', compact('zisFitrah','zisMall'));
    }
    //Print Data
    public function PrintZakat($zis_id){
        $todayHijri =\GeniusTS\HijriDate\Date::today()->format('Y');
        $zis = Zis::where('zis_name',$zis_id)->whereYear('hijri', $todayHijri)->orderBy('id', 'DESC')->get();
        
        $jumlahUangZakatTahunIni = Zis::where('zis_name', $zis_id)->whereYear('hijri',$todayHijri)->sum('uang');
        $jumlahUangInfaqTahunIni = Zis::where('zis_name', $zis_id)->whereYear('hijri',$todayHijri)->sum('uang_infaq');
        $jumlahBerasZakatTahunIni = Zis::where('zis_name', $zis_id)->whereYear('hijri',$todayHijri)->sum('beras');
        $jumlahBerasInfaqTahunIni = Zis::where('zis_name', $zis_id)->whereYear('hijri',$todayHijri)->sum('beras_infaq');

        $pdf = PDF::loadview('dashboard.zis.print.print-full',[
            'ziss'=>$zis, 
            'jumlahBerasZakatTahunIni' => $jumlahBerasZakatTahunIni,
            'jumlahUangZakatTahunIni' => $jumlahUangZakatTahunIni,
            'jumlahUangInfaqTahunIni' => $jumlahUangInfaqTahunIni,
            'jumlahBerasInfaqTahunIni' => $jumlahBerasInfaqTahunIni,
            'todayHijri'=>$todayHijri
            ]);
        return $pdf->stream('zakat'.$zis_id.'.pdf');
        
    }
}
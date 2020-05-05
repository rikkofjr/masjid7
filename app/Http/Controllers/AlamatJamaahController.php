<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use spesic models
use App\Models\AlamatJamaah;
use App\Models\DataJamaah;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use Auth;
use App\User;

//Plugin
use Carbon\Carbon;
use DataTables;
use PDF;
use DB;
use Ramsey\Uuid\Uuid;


class AlamatJamaahController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    /*
    * Export data jamaah to Json
    */
    public function getAddresJamaah(){

        $dataJamaah = AlamatJamaah::orderBy('id','desc')
        ->withCount('anggotaKeluarga');
        //->removeColumn('id','updated_at','nama_lain','zis_name')
        //->addIndexColumn()
        return Datatables::of($dataJamaah)
        ->removeColumn('id','updated_at','deleted_at','penginput')
        ->make();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alamatJamaahInternal = AlamatJamaah::withCount('anggotaKeluarga')->where('kategori_alamat', 1)->get();
        $alamatJamaahExternal = AlamatJamaah::withCount('anggotaKeluarga')->where('kategori_alamat', 2)->get();
        return view('dashboard.jamaah.alamat.index', compact('alamatJamaahInternal','alamatJamaahExternal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jamaah.alamat.create');
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
            'nama_pemilik.required' => 'Formulir Atas Nama Wajid Diisi',
            'kategori_alamat.required' => 'Formulir Kategori Alamat Jamaah Wajid Diisi',
            'alamat.required' => 'Alamat harap diisi',
            'rt.required' => 'RT harap diisi',
            'rw.required' => 'RW Jiwa harap diisi',
        ];
        $this->validate($request, [
            //'amil'=>'required', 
            'nama_pemilik'=>'required', 
            'kategori_alamat'=>'required', 
            'alamat','rw','rw'=>'required', 
        ],$messages);

        $aj = new AlamatJamaah;
        $aj->nama_pemilik = $request->nama_pemilik;
        $aj->kategori_alamat = $request->kategori_alamat;
        $aj->kategori_jamaah = $request->kategori_jamaah;
        $aj->alamat = $request->alamat;
        $aj->rt = $request->rt;
        $aj->rw = $request->rw;
        $aj->penginput = Auth::user()->id;
        $aj->uuid = Uuid::uuid4()->getHex();
        $aj->save();

        return redirect()->route('alamat-jamaah.show', $aj->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alamatjamaah = AlamatJamaah::findOrFail($id);
        $datajamaah = DataJamaah::all()->sortBy('id')->where('id_alamat_jamaah', $id);
        return view('dashboard.jamaah.alamat.show', compact('alamatjamaah','datajamaah'));
    }
    public function showing($uuid)
    {
        $alamatjamaah = AlamatJamaah::findOrFail($uuid);
        $datajamaah = DataJamaah::all()->sortBy('id')->where('uuid_alamat_jamaah', $uuid);
        return view('dashboard.jamaah.alamat.show', compact('alamatjamaah','datajamaah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aj = AlamatJamaah::findOrFail($id);
        return view('dashboard.jamaah.alamat.edit', compact('aj'));

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
    public function SoftDelete($id)
    {
        $aj = AlamatJamaah::find($id);
        $aj->delete();
        $aj->anggotaKeluarga()->delete();
        return redirect()->route('alamat-jamaah.index');
    }
    //Print Keluarga
    public function PrintKeluarga($id){
        $alamatjamaah = AlamatJamaah::findOrFail($id);
        $datajamaah = DataJamaah::all()->sortBy('id')->where('id_alamat_jamaah', $id);
        
        $pdf = PDF::loadview('dashboard.jamaah.alamat.print',['alamatjamaah'=>$alamatjamaah, 'datajamaah' => $datajamaah]);
    	return $pdf->stream('datakeluarga'.$alamatjamaah->nama_pemilik.'.pdf');
        
    }
}

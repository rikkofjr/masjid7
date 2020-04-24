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

//plugin
use Carbon\Carbon;
use DataTables;
use Ramsey\Uuid\Uuid;
use DB;

class DataJamaahController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama.required' => 'Formulir Atas Nama Wajid Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Jamaah Wajid Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Jamaah Wajid Diisi',
        ];
        $this->validate($request, [
            'nama'=>'required', 
            'jenis_kelamin'=>'required',
            'tanggal_lahir'=>'required'
        ],$messages);

        $dj = new DataJamaah;
        $dj->id_alamat_jamaah = $request->id_alamat_jamaah;
        $dj->nama = $request->nama;
        $dj->jenis_kelamin = $request->jenis_kelamin;
        $dj->tanggal_lahir = $request->tanggal_lahir;
        $dj->penginput = Auth::user()->id;
        $dj->uuid = Uuid::uuid4()->getHex();
        $dj->save();

        //dd($dj);
        return redirect()->route('alamat-jamaah.show', array('id' => $dj->id_alamat_jamaah));
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
    public function SoftDelete($id)
    {
        $aj = DataJamaah::find($id);
        $aj->delete();
        return back()->with('hapus');   
    }
}

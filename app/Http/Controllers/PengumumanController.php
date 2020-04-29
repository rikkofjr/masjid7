<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

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

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::paginate(3);
        return view('dashboard.pengumuman.index', compact('pengumuman')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengumuman.create');
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
            'judul_pengumuman.required' => 'Judul Wajid Diisi',
            'deskripsi.required' => 'Deskripsi harap diisi',
        ];
        $this->validate($request, [
            'judul_pengumuman'=>'required', 
            'deskripsi'=>'required'
        ],$messages);
        $kp = new Pengumuman;
        $kp->judul_pengumuman = $request->judul_pengumuman;
        $kp->deskripsi = $request->deskripsi;
        $kp->uuid = Uuid::uuid4()->getHex();
        $kp->penulis = Auth::user()->id;
        $kp->save();

        dd($kp);
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
        
        $pengumuman = Pengumuman::findOrfail($id);
        //dd($pengumuman);
        return view('dashboard.pengumuman.edit', compact('pengumuman'));
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
            'judul_pengumuman.required' => 'Judul Wajid Diisi',
            'deskripsi.required' => 'Deskripsi harap diisi',
        ];
        $this->validate($request, [
            'judul_pengumuman'=>'required', 
            'deskripsi'=>'required'
        ],$messages);
        $kp = Pengumuman::findOrfail($id);
        $kp->judul_pengumuman = $request->judul_pengumuman;
        $kp->deskripsi = $request->deskripsi;
        $kp->penulis = Auth::user()->id;
        $kp->save();

        return back()->with('Succsess', 'Berhasil Update - '.$kp->judul_pengumuman.' ');
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

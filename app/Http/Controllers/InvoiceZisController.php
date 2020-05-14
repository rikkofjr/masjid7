<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Zis;
use App\Models\ZisType;
use App\Models\InvoiceZis;


use Ramsey\Uuid\Uuid;
use Image;
use File;

class InvoiceZisController extends Controller
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
        if(Auth::user()->hasPermissionTo('Create Invoice')){
            $inv = InvoiceZis::where('muzaki', Auth::user()->id)->get();
            return view('dashboard.invoice.index', compact('inv'));
        }
        if(Auth::user()->hasPermissionTo('Create Masjid Report')){
            //invoice has been created
            $inv0 = InvoiceZis::where('status', 0)->get();
            //Struk has been uploaded
            $inv1 = InvoiceZis::where('status', 1)->get();
            ///Invoice has been confirmed by "Pengurus"
            $inv2 = InvoiceZis::where('status', 2)->get();
            //Faktur has been created by invoice
            $inv3 = InvoiceZis::where('status', 3)->get();
            return view('dashboard.invoice.index', compact('inv0', 'inv1','inv2','inv3'));
        }
        
        
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
        return view('dashboard.invoice.create', compact('ZisType','todayHijri'));
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
            'jumlah_jiwa.required' => 'Jumlah jiwa harap diisi',
            'zis_name.required' => 'Jenis zakat harap diisi',
            'uang_zakat.required' => 'uang per jiwa harap diisi',
            'uang_zakat.min' => 'Minimal pembayaran per jiwa 45000'
        ];
        $this->validate($request, [
            'zis_name'=>'required', 
            //'amil'=>'required', 
            'atas_nama'=>'required', 
            'jumlah_jiwa'=>'required', 
            'uang_zakat'=>'required, min:45000', 
        ],$messages);

        $zis = new InvoiceZis;
        $zis->uuid = Uuid::uuid4()->getHex();
        $zis->jenis_zakat = $request->zis_name;
        $zis->atas_nama = $request->atas_nama;
        //$zis->nama_lain = $request->nama_lain;
        $zis->jumlah_jiwa = $request->jumlah_jiwa;
        $zis->uang_zakat = $request->uang;
        $zis->uang_infaq = $request->uang_infaq;
        $zis->status = 0;
        $zis->muzaki = Auth::user()->id;
        $zis->perubah = Auth::user()->id;
        
        $zis->hijri = \GeniusTS\HijriDate\Date::today();
        $zis->save();

    //Display a successful message upon save
        //dd($zis);
        return redirect()->route('invoice-zis.show', $zis->uuid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ZisType = ZisType::all()->sortBy('id')->pluck('zis_name', 'id');

        $zis = InvoiceZis::findOrFail($id);
        if($zis->muzaki == Auth::user()->id || Auth::user()->hasPermissionTo('Create Masjid Report')){
            return view('dashboard.invoice.show', compact('zis', 'ZisType'));
        }else{
            abort(401);
        }
        //dd($zis->uuidnya);
        
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
        $messages = [
            'gambar.required' => 'Upload bukti transaksi',
            'gambar.image' => 'File yang diupload berupa gambar',
            'gambar.max' => 'ukuran gambar tidak lebih dari :max kb ',
            'gambar.mimes' => 'Extensi yang diperbolehkan hanya jpg,png,jpeg '
        ];
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:2500'
        ], $messages);
        $zis = InvoiceZis::findOrFail($id);
        if($request->hasFile('gambar')){
            $struk = $request->file('gambar');
            $imageName = 'transfer-' . time() . '.' . $struk->getClientOriginalExtension();
            Image::make($struk)->encode('jpg', 70)->save(public_path('/transfer/' .$imageName));
            $zis->gambar = $imageName;
            $zis->status = 1;
            $zis->save();
            //dd($imageName);
        }
        return redirect()->back();
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
    public function invoiceStoreToZis(Request $request, $id){
        if(Auth::user()->hasPermissionTo('Create Masjid Report')){
            //Store to Zis database & update inoive-zis status to 3
            //$id = $request->uuidnya;
            $invoice = InvoiceZis::findOrFail($id);
            $invoice->status=3;
            $invoice->perubah=Auth::user()->id;
            $invoice->save();

            $zis = new Zis;
            $zis->zis_name = $request->zis_name;
            $zis->uuid_invoice = $invoice->uuid;
            $zis->muzaki = $invoice->muzaki;
            $zis->amil = Auth::user()->id;
            $zis->atas_nama = $request->atas_nama;
            $zis->jumlah_jiwa = $request->jumlah_jiwa;
            $zis->uang = $request->uang;
            $zis->uang_infaq = $request->uang_infaq;
            $zis->uuidq = Uuid::uuid4()->getHex();
            $zis->hijri = \GeniusTS\HijriDate\Date::today();
            $zis->save();

            return redirect()->back();
        }
        
    }
    public function updateTo2(Request $request, $id){
        if(Auth::user()->hasPermissionTo('Create Masjid Report')){
            $zis = InvoiceZis::findOrFail($id);
            $zis->status=2;
            $zis->perubah=Auth::user()->id;
            $zis->save();
            return redirect()->back();
        }
        
    }
}

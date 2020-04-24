<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

//get models 
use App\Models\Zis;
use App\Models\Zistype;
use App\Models\Qurban;
use App\Models\Blog;

//get app
use Carbon\Carbon;
use Datatables;


class ClientController extends Controller
{
    public function index(){
        $blog = Blog::orderBy('id', 'DESC')->limit(3)->get();
        return view('client.index', compact('blog'));
    }
    public function zakat(){
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
        return view('client.zakat', compact(
            'fitrah',
            'nowHijri','nowMasehi', 
            'jumlahUangZakatFitrahTahunIni','jumlahUangInfaqFitrahTahunIni','jumlahBerasZakatFitrahTahunIni','jumlahBerasInfaqFitrahTahunIni',
            'jumlahUangZakatMallTahunIni','jumlahUangInfaqMallTahunIni','jumlahBerasZakatMallTahunIni','jumlahBerasInfaqMallTahunIni',
            'jumlahUangZakatFidyahTahunIni','jumlahUangInfaqFidyahTahunIni','jumlahBerasZakatFidyahTahunIni','jumlahBerasInfaqFidyahTahunIni',
            'jumlahJiwaFitrahTahunIni'
        ));
    }
    public function qurban(){
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $nowMasehi = Carbon::today()->format('Y');
        //qurban kambing
        $qurbanKambing = Qurban::orderBy('id','asc')
        ->whereYear('created_at',$nowMasehi)
        ->where('jenis_hewan', 1)
        ->get();

        //qurban domba
        $qurbanDomba = Qurban::orderBy('id','asc')
        ->whereYear('created_at',$nowMasehi)
        ->where('jenis_hewan', 2)
        ->get();
        
        $qurbanSapi = Qurban::orderBy('id','asc')
        ->whereYear('created_at',$nowMasehi)
        ->where('jenis_hewan', 3)
        ->get();
       
        return view('client.qurban', compact(
            'qurbanKambing', 'qurbanDomba', 'qurbanSapi',
            'nowHijri','nowMasehi'
        ));
    }
    //showing blog Content
    public function blogContent($slug){
        $blog = Blog::where('slug','=',$slug)->first();
        
        if(!$blog == null){
            $blog = Blog::where('slug','=',$slug)->first();
            return view('client.blogcontent', compact('blog'));
            //if(Auth::check()){
            //    $userApply = Apply::where('job_applied', $job->id)->where('user_apply', Auth::user()->id)->count();
            //    return view('client.jobs.jobsdetail', compact('job', 'userApply'));
            //}
        }else{
            abort('404');
        }
        return view('client.blogcontent');
    }
}

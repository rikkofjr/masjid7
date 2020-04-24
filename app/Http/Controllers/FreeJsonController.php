<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zis;
use App\Models\ZisType;
//kas
use App\Models\KasPenerimaan;
use App\Models\KasPengeluaran;

use App\User;

use Carbon\Carbon;
use DataTables;
use Ramsey\Uuid\Uuid;
use PDF;
use DB;
class FreeJsonController extends Controller
{
    //guest can accses data json for free
    public function dataFitrah(){
        $nowHijri = \GeniusTS\HijriDate\Date::today()->format('Y');
        $nowMasehi = Carbon::today()->format('Y');
        $dataFitrah = Zis::orderBy('id','desc')
        ->whereYear('hijri',$nowHijri)
        ->where('zis_name', 1);
        
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
        ->removeColumn('id','updated_at','nama_lain','zis_name')
        //->addIndexColumn()
        ->make();
    }
    public function dataMall(){
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
        ->removeColumn('id','updated_at','nama_lain','zis_name')
        //->addIndexColumn()
        ->make();
    }
    public function dataFidyah(){
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
        ->removeColumn('id','updated_at','nama_lain','zis_name')
        //->addIndexColumn()
        ->make();
    }
    public function kasPenerimaanTahunan(){
        $kasPenerimaan = KasPenerimaan::select(
            DB::raw('sum(penerimaan) as totalPenerimaan'),  
            //DB::raw("DATE_FORMAT(created_at,'%Y') as tahunMasehi"),
            DB::raw("DATE_FORMAT(created_at,'%Y') as tahunPenerimaanKas")
                )
                ->groupBy('tahunPenerimaanKas')
                ->orderBy('created_at', 'ASC')
                ->get();
            return response()->json($kasPenerimaan);
    }
    public function kasPengeluaranTahunan(){
        $kasPengeluaran = KasPengeluaran::select(
            DB::raw('sum(pengeluaran) as totalPengeluaran'),  
            DB::raw("DATE_FORMAT(created_at,'%Y') as tahunPengeluaranKas")
                )
                ->groupBy('tahunPengeluaranKas')
                ->orderBy('created_at', 'ASC')
                ->get();
            return response()->json($kasPengeluaran);
    }
}

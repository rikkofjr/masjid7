<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zis extends Model
{
    use SoftDeletes; 

    protected $filablle = [
        'zis_name', 
        'amil', 
        'atas_nama', 
        'nama_lain', 
        'jumlah_jiwa', 
        'jumlah_uang_zakat',
        'jumlah_uang_infaq',
        'jumlah_uang_shadaqoh',
        'beras_zakat',
        'beras_infaq',
        'beras_shadaqoh',
        'uuidq',
        'hijri'
    ];
    protected $table ='tb_zis';
    protected $dates = ['deleted_at'];
    protected $primaryKey ='uuidq';
    protected $keyType = 'string';
    public $incrementing = false;

    public function jenis_zakat(){
        return $this->belongsTo('App\Models\ZisType', 'zis_name');
        
    }
    public function data_amil(){
        return $this->belongsTo('App\User', 'amil');  
    }
    
}

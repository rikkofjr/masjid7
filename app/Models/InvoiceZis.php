<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceZis extends Model
{
    use softDeletes;
    protected $fillablle = ['uuid', 'atas_nama', 'jumlah_jiwa', 'uang_zakat', 'uang_infaq', 'gambar', 'status', 'perubah', 'muzaki'];
    protected $table ='tb_invoice_zis';
    //protected $dates = ['deleted_at'];
    protected $primaryKey ='uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    public function jenis_zakatt(){
        return $this->belongsTo('App\Models\ZisType', 'jenis_zakat');
    }
    public function data_amil(){
        return $this->belongsTo('App\User', 'muzaki');  
    }
    public function perubah_data(){
        return $this->belongsTo('App\User', 'perubah');  
    }
    public function uuidnya(){
        return $this->hasOne('App\Models\Zis', 'uuida', 'uuid_ina');  
    }
}

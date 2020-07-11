<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Qurban extends Model
{
    use SoftDeletes; 

    protected $table = 'tb_qurban_penerimaan';
    protected $fillable = [
        'jenis_hewan',
        'atas_nama',
        'nama_lain',
        'alamat',
        'permintaan',
        'nomor_handphone',
        'disaksikan',
        'keterangan',
        'penerima'
    ];
    public function data_amil(){
        return $this->belongsTo('App\User', 'penerima');  
    }
    
}

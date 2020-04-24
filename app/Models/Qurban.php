<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qurban extends Model
{
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
}

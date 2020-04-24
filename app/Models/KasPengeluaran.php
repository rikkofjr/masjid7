<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KasPengeluaran extends Model
{
    use SoftDeletes;
    protected $table = 'tb_kas_pengeluaran';
    protected $fillable = [
        'keterangan',
        'catatan',
        'pengeluaran'
    ];
    protected $dates = ['deteled_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KasPenerimaan extends Model
{
    use SoftDeletes;
    protected $table = 'tb_kas_penerimaan';
    protected $fillable = [
        'keterangan',
        'catatan',
        'penerimaan'
    ];
    protected $dates = ['deteled_at'];
}

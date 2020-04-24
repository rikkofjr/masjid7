<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataJamaah extends Model
{
    use SoftDeletes;
    protected $table = 'tb_data_jamaah';
    protected $fillable = [
        'nama', 
        'jenis_kelamin', 
        'tanggal_lahir'
    ];
    protected $dates = ['deleted_at'];

    
}

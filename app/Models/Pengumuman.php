<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pengumuman extends Model
{
    use SoftDeletes;
    protected $fillable =['judul_pengumuman', 'deskripsi'];
    protected $table = 'tb_pengumuman';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
}

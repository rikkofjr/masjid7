<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlamatJamaah extends Model
{
    use SoftDeletes;

    //protected $primaryKey = 'uuid';
    protected $table = 'tb_alamat_jamaah';
    protected $fillable = [
        'nama_pemilik', 
        'kategori_alamat', 
        'kategori_jamaah', 
        'alamat', 
        'rt', 
        'rw', 
        'uuid'
    ];
    protected $dates = ['deleted_at'];

    
    public function anggotaKeluarga()
    {
        return $this->hasMany(DataJamaah::class, 'id_alamat_jamaah');
    }
}

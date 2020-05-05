<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Blog extends Model
{
    use Sluggable;
    protected $table='tb_blog';
    protected $fillable=['gambar', 'judul', 'isi', 'slug'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function penulisnya(){
        return $this->belongsTo('App\User', 'penulis');  
    }
}

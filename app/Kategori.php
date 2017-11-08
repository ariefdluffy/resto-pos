<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $primaryKey   = 'id_kategori';
    protected $fillable =   [
        'id_kategori','nama_kategori'
    ];

    public function Barang()
    {
        return $this->belongTo('App\Barang', 'id_kategori');
    }
}

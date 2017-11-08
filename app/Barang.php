<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // protected $table = 'barang';
    protected $primaryKey   = 'id_barang';
    protected $fillable =   [
        'id_barang','kode_barang','nama_barang','ket','harga','id_kategori','id_rak','id_satuan','qty'
    ];

    public function Kategori()
    {
        return $this->hasMany('App\Kategori', 'id_kategori');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'transaksis_detail';
    protected $fillable =   [
        'id_transaksi','id_barang','qty_jual','id_satuan','diskon_jual','harga_jual'
    ];
}

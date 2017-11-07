<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'transaksis_detail';
    protected $primaryKey = 'id_transaksi_detail';
    protected $fillable =   [
        'id_transaksi','id_barang','qty_jual', 'subtotal','id_satuan','diskon_jual','harga_jual'
    ];
}

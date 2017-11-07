<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey   = 'id_transaksi';
    protected $fillable =   [
        'id_transaksi','invoice','id_pelanggan','id_type_bayar',
        'diskon_persen','diskon_rupiah','diskon_belanja','jumlah_bayar','ket','status'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Perusahaan extends Model
{
    Protected $table = 'perusahaan';
    Protected $primaryKey = 'id_perusahaan';
    protected $fillable = ['id_perusahaan','nama_perusahaan','alamat_perusahaan','no_tlp','jenis_perusahaan'];
    
    public function Laporan()
    {
      return $this->hasMany('App\Laporan','id_perusahaan');
    }
}

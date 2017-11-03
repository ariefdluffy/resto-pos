<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $fillable = ['id_laporan','id_perusahaan','nama_file'];

    public function Perusahaan()
    {
      return $this->belongsTo('App\Perusahaan', 'id_perusahaan');
    }
}

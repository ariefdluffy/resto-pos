<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $primaryKey   = 'id_satuan';
    protected $fillable =   [
        'id_satuan','nama_satuan'
    ];
}

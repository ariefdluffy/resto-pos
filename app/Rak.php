<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $primaryKey   = 'id_rak';
    protected $fillable =   [
        'id_rak','nama_rak'
    ];
}

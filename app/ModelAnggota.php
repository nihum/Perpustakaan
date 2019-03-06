<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAnggota extends Model
{
    //
    protected $table    = 'tb_anggota';
    protected $guarded  = ['kd_anggota'];
    public $timestamps  = false;
}

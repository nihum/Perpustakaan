<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAnggota extends Model
{
    //
    protected $table = "tb_anggota";
    public $timestamps = false;
    protected $guarded = ['kd_anggota'];
}

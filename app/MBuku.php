<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBuku extends Model
{
    //
    protected $table    = 'tb_buku';
    protected $guarded  = ['kd_buku'];
    public $timestamps  = false;
}

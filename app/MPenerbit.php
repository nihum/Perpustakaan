<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPenerbit extends Model
{
    //
    protected $table    = 'tb_penerbit';
    protected $guarded  = ['kd_penerbit'];
    public $timestamps  = false;
}

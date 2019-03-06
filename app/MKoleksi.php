<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MKoleksi extends Model
{
    //
    protected $table = "tb_koleksi_buku";    
    public $timestamps = false;
    protected $guarded = ['kd_koleksi'];

}

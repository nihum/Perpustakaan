<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRak extends Model
{
    //
    protected $table = "tb_rak";    
    protected $guarded = ['kd_rak'];
    public $timestamps = false;    
}

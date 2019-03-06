<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Manggota;

class DashboardControl extends Controller
{
    //
    function index(){
        $pinjam_banyak = DB::select('select tb_anggota.no_anggota,tb_anggota.nama,
        (select count(*) from tb_peminjaman WHERE tb_peminjaman.no_anggota = tb_anggota.no_anggota GROUP BY tb_peminjaman.no_anggota) as jumlah
        FROM tb_anggota order by jumlah DESC ' );

       $anggota = DB::select('SELECT COUNT(tb_anggota.kd_anggota) as jumlah FROM tb_anggota');
        
   return view('dashboard',compact('pinjam_banyak' , 'anggota', 'jmlh_pinjam'));
    }
}

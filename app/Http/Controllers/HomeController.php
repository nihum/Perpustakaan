<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            //peminjam terbanyak keseluran tanpa  perbulan atau pertahun 
            $pinjam_banyak = DB::select('SELECT tb_anggota.no_anggota,tb_anggota.nama,
             (select count(*) from tb_peminjaman WHERE tb_peminjaman.no_anggota = tb_anggota.no_anggota GROUP BY tb_peminjaman.no_anggota) as jumlah
             FROM tb_anggota order by jumlah DESC ' );

            $anggota = DB::select('SELECT COUNT(*) as jumlah FROM tb_anggota');
            
            //jumlah peminjam bulan ini
           $jmlh_pinjam = DB::select('select COUNT(*) as jumlah from tb_peminjaman  where month(tb_peminjaman.tgl_pinjam)=month(CURDATE())');

            //peminjam terbanyak per bulan
            $p_bulan    = DB::select('SELECT tb_anggota.no_anggota,tb_anggota.nama,
            (select count(*) from tb_peminjaman WHERE tb_peminjaman.no_anggota = tb_anggota.no_anggota AND month(tb_peminjaman.tgl_pinjam)=month(NOW()) GROUP BY tb_peminjaman.no_anggota) as jumlah
            FROM tb_anggota order by jumlah DESC ');

        return view('dashboard',compact('pinjam_banyak','anggota', 'jmlh_pinjam', 'p_bulan'));
    }
}

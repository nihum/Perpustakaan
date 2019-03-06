<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\ModelAnggota;
use App\Buku;
use App\MKoleksi;

class PinjamControl extends Controller
{
    //
    function Data_pinjam(){
        $pinjam = DB::select('select tb_peminjaman.no_pinjam, tb_peminjaman.tgl_kembali ,tb_buku.judul ,tb_anggota.nama  from tb_peminjaman , tb_koleksi_buku, tb_buku, tb_anggota 
        where tb_peminjaman.no_induk_buku=tb_koleksi_buku.no_induk_buku AND tb_koleksi_buku.kd_buku=tb_buku.kd_buku AND tb_peminjaman.no_anggota=tb_anggota.no_anggota
        AND tb_peminjaman.status=0');
        
        return view('data.data_peminjaman', compact('pinjam'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MAnggota;
use App\Mbuku;
use App\MKoleksi;
use Mpdf\Mpdf;

class ReportControl extends Controller
{
    //
    function rpt_anggota(){
        $anggota = MAnggota::all();
        $pdf = new Mpdf([
            'orientation' => "L",
            'format'      => "Folio"
        ]);

        $content = view('report.rpt_anggota',compact('anggota'));

        $pdf->WriteHTML($content);
        $pdf->Output(public_path()."/Laporan Anggota.pdf","I");

    }
    
    function rpt_buku(){
        $buku = DB::select('SELECT tb_buku.kd_buku , tb_buku.judul , tb_pengarang.nama_pengarang , tb_penerbit.nama_penerbit , tb_buku.tempat_terbit , tb_buku.tahun_terbit , tb_kategori.nama_kategori , tb_buku.halaman , tb_buku.edisi , tb_buku.ISBN FROM tb_buku LEFT JOIN tb_pengarang ON tb_buku.kd_pengarang=tb_pengarang.kd_pengarang LEFT JOIN tb_penerbit ON tb_buku.kd_penerbit=tb_penerbit.kd_penerbit LEFT JOIN tb_kategori ON tb_buku.kd_kategori=tb_kategori.kd_kategori');

        //$buku = MBuku::all();
        //jadi kalau pakai query builder itu manggilnya satu kali aja
        $pdf = new Mpdf([
            'orientation' => "L",
            'format'      => "Folio"
        ]);
        $content = view('report.rpt_buku',compact('buku'));

        $pdf->WriteHTML($content);
        $pdf->Output(public_path()."/Laporan Buku.pdf","I");
    }

    function rpt_pinjam(){
        $pinjam = DB::select('SELECT tb_peminjaman.no_pinjam, tb_peminjaman.tgl_kembali ,tb_buku.judul ,tb_anggota.nama  from tb_peminjaman , tb_koleksi_buku, tb_buku, tb_anggota 
        WHERE tb_peminjaman.no_induk_buku=tb_koleksi_buku.no_induk_buku AND tb_koleksi_buku.kd_buku=tb_buku.kd_buku AND tb_peminjaman.no_anggota=tb_anggota.no_anggota
        AND tb_peminjaman.status=0');

        $pdf = new Mpdf([
            'orientation' => "L",
            'format'      => "Folio"
        ]);
        $content = view('report.rpt_pinjam',compact('pinjam'));

        $pdf->WriteHTML($content);
        $pdf->Output(public_path()."/Laporan Buku Belum Dikembalikan.pdf","I");

    }

    function rpt_QRCode_Buku(){
        $buku = MKoleksi::all();

        $content = view('report.rpt_qrcode_buku', compact('buku'));

        $pdf = new Mpdf([
            'orientation' => "L",
            'format'      => "Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path()."/Laporan QR Code Buku.pdf","I");
    }

    function rpt_QRCode_Anggota(){
        $anggota = MAnggota::all();

        $content = view('report.rpt_qrcode_anggota', compact('anggota'));

        $pdf = new Mpdf([
            'orientation' => "L",
            'format'      => "Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path()."/Laporan QR Code anggota.pdf","I");
    }

    function rpt_kartu_anggota($id){
        $anggota = Manggota::where('kd_anggota',$id)->first();

        $cetak = view('report.rpt_kartu_anggota',compact('anggota'));

        $pdf = new Mpdf([
            'orientation' => "L",
            'format'      => "A6"
        ]);

        $pdf->WriteHTML($cetak);
        $pdf->Output(public_path()."/Kartu QR Code anggota.pdf","I");

    }
}

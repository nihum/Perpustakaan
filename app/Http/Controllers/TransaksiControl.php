<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Mike42\Escpos\Printer; 
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use App\MAnggota;

class TransaksiControl extends Controller
{
    //  
    function peminjaman(Request $req){
        if(count($req->all())==0){
            $anggota ="";
            $buku    ="";
        }else{
            $anggota = MAnggota::where('no_anggota', $req->get('no_anggota'))->first();
            $buku    = DB::select('select tb_koleksi_buku.kd_koleksi, tb_koleksi_buku.no_induk_buku, tb_buku.judul FROM tb_koleksi_buku, tb_buku WHERE tb_koleksi_buku.kd_buku=tb_buku.kd_buku AND tb_koleksi_buku.status=0');
        }

        return view('form.frm_peminjaman',compact('anggota','buku'));
    }

    function save_peminjaman(Request $req){

        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_peminjaman"');
        $no_pinjam = "P".sprintf('%06d',$newid[0]->Auto_increment);         
        foreach($req->get('nobuku') as $no_induk){ 
               
            // Simpan ke tabel peminjaman      
            DB::table('tb_peminjaman')->insert([
                'no_pinjam'=>$no_pinjam,
                'tgl_pinjam'=>date('Y-m-d'),
                'tgl_kembali'=>date('Y-m-d',strtotime('+3 days')),
                'no_induk_buku'=>$no_induk,
                'no_anggota'=>$req->get('no_anggota'),
                'status'=>0
            ]);
            
            // Update status buku supaya jadi terpinjam
            DB::table('tb_koleksi_buku')->where("no_induk_buku",$no_induk)->update([
                'status'=>1
            ]);
        }

    
        //proses Cetak 

        // ini adalah lokasi printer dan printer yang digunakan 
        $ip = '192.168.1.40'; // IP komputer kita atau printer lain yang masih satu jaringan 
        $printer = 'POS 5'; //nama Printer yang di sharing
        $connector = new WindowsPrintConnector("smb://".$ip."/".$printer);
        $printer = new Printer($connector);

        //Header
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer -> text("PERPUSTAKAAN WEARNES \n");
        $printer -> text("Jl Thamrin 35 A MADIUN \n");
        $printer -> text("=============================== \n");
        //barcode
        $printer -> setBarcodeHeight(50);
        $printer -> setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
        $printer -> barcode($no_pinjam);
        // information peminjam
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> text("No Anggota : ".$req->get('no_anggota')." \n");
        $printer -> text("Nama       : ".$req->get('nama')." \n");
        $printer -> text("Tanggal    : ".date('d-M-Y')." \n");
        $printer -> text("Kembali    : ".date('d-M-Y', strtotime('+3 days')) ." \n");
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $i=1; $count = count($req->get('judul'));
        foreach($req->get('judul') as $judul){
            $printer -> text("$i".$judul." \n");
            if($i<$count){
                $printer -> text("-------------------------------");
            }
            $i++;
        }

        //footer
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer -> text("================================= \n");
        $printer -> text("Terima Kasih \n");
        $printer -> text("Kami Tunggu Kunjungan Anda \n \n \n \n \n \n");

        // perintah print
        $printer -> cut();
        $printer -> close();

        return redirect('trans/peminjaman');
    }

    function pengembalian(Request $req){
        if( count($req->all())==0){
            $pinjam="";
            
        }else{
        $pinjam = DB::select("select tb_peminjaman.no_pinjam,tb_peminjaman.no_induk_buku,tb_buku.judul,          tb_peminjaman.no_anggota,tb_anggota.nama,tb_peminjaman.tgl_kembali from tb_peminjaman,tb_buku,tb_anggota,tb_koleksi_buku WHERE tb_peminjaman.no_anggota = tb_anggota.no_anggota AND tb_peminjaman.no_induk_buku = tb_koleksi_buku.no_induk_buku AND tb_koleksi_buku.kd_buku=tb_buku.kd_buku AND tb_peminjaman.status=0 AND tb_peminjaman.no_pinjam='".$req->get('no_pinjam')."'");
        }

        return view('form.frm_pengembalian', compact('pinjam'));
    }

    function save_pengembalian(Request $req){
        foreach($req->get('no_induk') as $no_induk){
            DB::table('tb_peminjaman')->where('no_pinjam',$req->get('no_pinjam'))->where('no_induk_buku',$no_induk)->update([
                'denda'=>$req->get('denda'),
                'status'=>1
            ]);

            //status buku di tabel koleksi buku diubah menjadi tersedia dengan status 0
            DB::table('tb_koleksi_buku')->where('no_induk_buku',$no_induk)->update([
                'status'=>0
            ]);
        }

        return redirect('trans/pengembalian');
    }

}

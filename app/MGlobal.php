<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MGlobal extends Model
{
    public static function Get_Row_Empty($table){
        $columns = DB::select('show columns from ' . $table);
        foreach($columns as $col){
            $column[$col->Field]="";
        }

        return $column;
    }

    public static function Get_Pengarang($kd_pengarang){
        $pengarang =DB::table('tb_pengarang')->where('kd_pengarang',$kd_pengarang)->first();

        if($pengarang!=""){
            $nama = $pengarang->nama_pengarang;
        }else{
            $nama = "Hah.. Kosong";
        }

        return $nama;
    }

    public static function Get_Penerbit($kd_penerbit){
        $penerbit =DB::table('tb_penerbit')->where('kd_penerbit',$kd_penerbit)->first();
        if($penerbit!=""){
            $nama = $penerbit->nama_penerbit;
        }else{
            $nama = "Hah.. Kosong";
        }

        return $nama;
    }

    public static function Get_Kategori($kd_kategori){
        $kategori =DB::table('tb_kategori')->where('kd_kategori',$kd_kategori)->first();
        if($kategori!=""){
            $nama = $kategori->nama_kategori;
        }else{
            $nama = "Hah.. Kosong";
        }

        return $nama;
    }

}

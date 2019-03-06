<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MGlobal;
use App\MKategori;

class KategoriControl extends Controller
{
    //
    function index(){
        $kategori = MKategori::all();
        return view('data.data_kategori', compact('kategori'));
    }

    function add(){
        $kategori  = MGlobal::Get_Row_Empty('tb_kategori');
        return view('form.frm_kategori',compact('kategori'));
    }

    function edit($id){
        $kategori = MKategori::where("kd_kategori",$id)->first();
        return view('form.frm_kategori',compact('kategori'));
    }

    function save(Request $req){

        $this->validate($req,[
            'kategori' => 'required',
            'singkatan'     => 'required|max:4'
        ]);

        if($req->get('kd_kategori')==""){

            // Simpan Ke Tabel Buku
            $kategori = new MKategori([
                'nama_kategori' =>$req->get('kategori'),
                'singkatan'     =>$req->get('singkatan')
            ]);
            $kategori->save();
        } else {
            $kategori = MKategori::where("kd_kategori",$req->get('kd_kategori'));  
            $kategori->update([
                'nama_kategori' =>$req->get('kategori'),
                'singkatan'     =>$req->get('singkatan')
            ]);
        }
        return redirect('kategori');
    }

    function delete($id){
        $kategori = MKategori::where("kd_kategori",$id);        
        $kategori->delete();
        return redirect('kategori');
    }
}

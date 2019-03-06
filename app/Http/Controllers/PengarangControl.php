<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MGlobal;
use App\MPengarang;

class PengarangControl extends Controller
{
    //
    function index(){
        $pengarang = MPengarang::all();
        return view('data.data_pengarang', compact('pengarang'));
    }

    function add(){
        $pengarang  = MGlobal::Get_Row_Empty('tb_pengarang');
        return view('form.frm_pengarang',compact('pengarang'));
    }

    function edit($id){
        $pengarang = MPengarang::where("kd_pengarang",$id)->first();
        return view('form.frm_pengarang',compact('pengarang'));
    }

    function save(Request $req){

        if($req->get('kd_pengarang')==""){
            
            $this->validate($req,[
                'pengarang' => 'required'
            ]);
            // Simpan Ke Tabel Buku
            $pengarang = new MPengarang([
                'nama_pengarang' =>$req->get('pengarang')
            ]);
            $pengarang->save();
        } else {
            $pengarang = MPengarang::where("kd_pengarang",$req->get('kd_pengarang'));  
            $pengarang->update([
                'nama_pengarang' =>$req->get('pengarang')
            ]);
        }

        return redirect('pengarang');
    }

    function delete($id){
        $pengarang = MPengarang::where("kd_pengarang",$id);        
        $pengarang->delete();
        return redirect('pengarang');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MGlobal;
use App\MRak;

class RakControl extends Controller
{
    //
    function index(){
        $rak = MRak::all();
        return view('data.data_rak', compact('rak'));
    }

    function add(){
        $rak  = MGlobal::Get_Row_Empty('tb_rak');
        return view('form.frm_rak',compact('rak'));
    }

    function edit($id){
        $rak = MRak::where("kd_rak",$id)->first();
        return view('form.frm_rak',compact('rak'));
    }

    function save(Request $req){

        if($req->get('kd_rak')==""){

            // Simpan Ke Tabel Buku
            $rak = new MRak([
                'nama_rak' =>$req->get('rak')
            ]);
            $rak->save();
        } else {
            $rak = MRak::where("kd_rak",$req->get('kd_rak'));  
            $rak->update([
                'nama_rak' =>$req->get('rak')
            ]);
        }
        return redirect('rak');
    }

    function delete($id){
        $rak = MRak::where("kd_rak",$id);        
        $rak->delete();
        return redirect('rak');
    }
}

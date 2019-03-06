<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MGlobal;
use App\MPenerbit;

class PenerbitControl extends Controller
{
    //
    function index(){
        $penerbit = MPenerbit::all();
        return view('data.data_penerbit', compact('penerbit'));
    }

    function add(){
        $penerbit  = MGlobal::Get_Row_Empty('tb_penerbit');
        return view('form.frm_penerbit',compact('penerbit'));
    }

    function edit($id){
        $penerbit = MPenerbit::where("kd_penerbit",$id)->first();
        return view('form.frm_penerbit',compact('penerbit'));
    }

    function save(Request $req){
        
        $this->validate($req,[
            'penerbit' => 'required'
        ]);

        if($req->get('kd_penerbit')==""){

            // Simpan Ke Tabel Buku
            $penerbit = new MPenerbit([
                'nama_penerbit' =>$req->get('penerbit')
            ]);
            $penerbit->save();
        } else {
            $penerbit = MPenerbit::where("kd_penerbit",$req->get('kd_penerbit'));  
            $penerbit->update([
                'nama_penerbit' =>$req->get('penerbit')
            ]);
        }
        return redirect('penerbit');
    }

    function delete($id){
        $penerbit = MPenerbit::where("kd_penerbit",$id);        
        $penerbit->delete();
        return redirect('penerbit');
    }
}

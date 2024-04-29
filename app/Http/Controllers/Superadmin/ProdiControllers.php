<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\ProdiModels;
use Illuminate\Http\Request;

class ProdiControllers extends Controller
{
    function index () {
        $prodi =ProdiModels::all();
        return view ("superadmin.daftarprodi.index",compact("prodi"));
    }

    function create(){
        return view("superadmin.daftarprodi.create");
    }

    function createData (Request $request){
        ProdiModels::create([
            'prodi'=> $request->input('prodi'),
        ]);
        return redirect("/daftar-prodi");
    }
    function update($id_prodi){
        $prodi = ProdiModels::find($id_prodi);
        return view("superadmin.daftarprodi.update",compact("prodi"));
    }

    function updateData (Request $request,$id_prodi){
        ProdiModels::where('id_prodi',$id_prodi)
        ->update([
            'prodi'=> $request->input('prodi'),
        ]);
        return redirect("/daftar-prodi");
    }

    function delete($id_prodi)
    {
        ProdiModels::find($id_prodi)->delete();
        return redirect('/daftar-prodi')->with('success', 'prodi berhasil dihapus.');
    }
}

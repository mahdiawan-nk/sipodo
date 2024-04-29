<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\ProdiModels;
use App\Models\RoleModels;
use App\Models\UsersModels;
use Illuminate\Http\Request;

class DaftarPenggunaControllers extends Controller
{
    function index()
    {
        $join = UsersModels::select('tb_user.*', 'tb_role.role')
            // ->join('tb_prodi','tb_user.id_prodi','=','tb_prodi.id_prodi')
            ->join('tb_role', 'tb_user.id_role', '=', 'tb_role.id_role')
            ->get();
        return view("superadmin.daftarpengguna.index", compact("join"));
    }
    function create()
    {
        $role = RoleModels::all();
        $prodi = ProdiModels::all();
        return view("superadmin.daftarpengguna.create", compact("role", "prodi"));
    }

    function Data(Request $request)
    {
        $hash = bcrypt($request->input('password'));
        UsersModels::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hash,
            'id_role' => $request->input('id_role'),
            'id_prodi' => $request->input('id_prodi'),
            'nrp' => $request->input('nrp'),
        ]);
        return redirect('/daftar-pengguna');
    }
    function update($id){
        $user = UsersModels::find($id);
        return view('superadmin.daftarpengguna.update',compact('user','id'));
    }
    function updateData(Request $request,$id){
        $hash=bcrypt($request->input('password'));
        UsersModels::where('tb_user.id',$id)
        ->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$hash,
        ]);
        return redirect("/daftar-pengguna")->with('success','User berhasil diperbarui.');
        }

    function delete($id)
    {
        $item = UsersModels::find($id);
        $item->delete();
        return redirect('/daftar-pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }

}

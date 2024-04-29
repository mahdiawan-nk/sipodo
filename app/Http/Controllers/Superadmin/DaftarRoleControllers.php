<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;

use App\Models\RoleModels;
use Illuminate\Http\Request;

class DaftarRoleControllers extends Controller
{
    function index () {
        $role =RoleModels::all();
        return view ("superadmin.daftarrole.index",compact("role"));
    }

    function create(){
        return view("superadmin.daftarrole.create");
    }

    function createData (Request $request){
        RoleModels::create([
            'role'=> $request->input('role'),
        ]);
        return redirect("/daftar-role");
    }
}

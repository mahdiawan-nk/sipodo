<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\MengajarModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormMengajarDosenControllers extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan data pengalaman mengajar berdasarkan ID pengguna
        $mengajar = MengajarModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.mengajar.index", compact("mengajar"));
    }
    function create()
    {
        return view("dosen.mengajar.create");
    }
    function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pengajaran' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pengalaman-mengajar-dosen")->with('error', 'Data Pengalaman Mengajar gagal ditambahkan.');
        }
        $userId = Auth::id();

        MengajarModels::create([
            'id' => $userId,
            'jenis_pengajaran' => $request->input('jenis_pengajaran'),
        ]);
        return redirect('/form-pengalaman-mengajar-dosen')->with('success', 'Data Pengalaman Mengajar berhasil ditambahkan.');
    }

    function update($id_mengajar)
    {
        $mengajar = MengajarModels::find($id_mengajar);
        return view("dosen.mengajar.update", compact('mengajar'));
    }

    function updateData(Request $request, $id_mengajar)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pengajaran' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pengalaman-mengajar-dosen")->with('error', 'Data Pengalaman Mengajar gagal diperbarui.');
        }
        $userId = Auth::id();

        MengajarModels::where('id_mengajar', $id_mengajar)->update([
            'id' => $userId,
            'jenis_pengajaran' => $request->input('jenis_pengajaran'),
        ]);
        return redirect('/form-pengalaman-mengajar-dosen')->with('success', 'Data Pengalaman Mengajar berhasil diperbarui.');
    }

    function delete($id_mengajar)
    {
        $mengajar = MengajarModels::find($id_mengajar);
        $mengajar->delete();
        return redirect('/form-pengalaman-mengajar-dosen')->with('success', 'Data Pengalaman Mengajar berhasil dihapus.');
    }
}

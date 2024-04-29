<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\JabatanModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormJabatanDosenControllers extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan data pengalaman jabatan berdasarkan ID pengguna
        $jabatan = JabatanModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.jabatan.index", compact("jabatan"));
    }
    function create()
    {
        return view("dosen.jabatan.create");
    }
    function createData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
            'posisi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pengalaman-jabatan-dosen")->with('error', 'Data Pengalaman Jabatan gagal ditambahkan.');
        }
        $userId = Auth::id();

        JabatanModels::create([
            'id' => $userId,
            'tahun_mulai' => $request->input('tahun_mulai'),
            'tahun_selesai' => $request->input('tahun_selesai'),
            'posisi' => $request->input('posisi'),
        ]);
        return redirect('/form-pengalaman-jabatan-dosen')->with('success', 'Data Pengalaman Jabatan berhasil ditambahkan');
    }
    function update($id_jabatan)
    {
        $jabatan = JabatanModels::find($id_jabatan);
        return view("dosen.jabatan.update", compact('jabatan'));
    }
    function updateData(Request $request, $id_jabatan)
    {

        $validator = Validator::make($request->all(), [
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
            'posisi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pengalaman-jabatan-dosen")->with('error', 'Data Pengalaman Jabatan gagal diperbarui.');
        }
        $userId = Auth::id();

        JabatanModels::where('id_jabatan', $id_jabatan)->update([
            'id' => $userId,
            'tahun_mulai' => $request->input('tahun_mulai'),
            'tahun_selesai' => $request->input('tahun_selesai'),
            'posisi' => $request->input('posisi'),
        ]);
        return redirect('/form-pengalaman-jabatan-dosen')->with('success', 'Data Pengalaman Jabatan berhasil diperbarui.');
    }

    function delete($id_jabatan)
    {
        $jabatan = JabatanModels::find($id_jabatan);
        $jabatan->delete();
        return redirect('/form-pengalaman-jabatan-dosen')->with('success', 'Data Pengalaman Jabatan berhasil dihapus.');
    }
}

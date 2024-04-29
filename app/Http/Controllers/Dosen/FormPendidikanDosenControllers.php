<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\PendidikanModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormPendidikanDosenControllers extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan data pendidikan berdasarkan ID pengguna
        $pendidikan = PendidikanModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.pendidikan.index", compact("pendidikan"));
    }

    public function create()
    {
        return view("dosen.pendidikan.create");
    }

    public function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gelar' => 'required',
            'jurusan' => 'required',
            'perguruan_tinggi' => 'required',
            'asal_perguruan_tinggi' => 'required',
            'tanggal_kelulusan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pendidikan-dosen")->with('error', 'Data pendidikan gagal ditambahkan.');
        }

        $userId = Auth::id();

        PendidikanModels::create([
            'id' => $userId,
            'gelar' => $request->input('gelar'),
            'jurusan' => $request->input('jurusan'),
            'perguruan_tinggi' => $request->input('perguruan_tinggi'),
            'asal_perguruan_tinggi' => $request->input('asal_perguruan_tinggi'),
            'tanggal_kelulusan' => $request->input('tanggal_kelulusan'),
        ]);

        return redirect('/form-pendidikan-dosen')->with('success', 'Data pendidikan berhasil ditambahkan');
    }

    public function update($id_pendidikan)
    {
        $pendidikan = PendidikanModels::find($id_pendidikan);
        return view('dosen.pendidikan.update', compact('pendidikan'));
    }

    public function updateData(Request $request, $id_pendidikan)
    {
        $validator = Validator::make($request->all(), [
            'gelar' => 'required',
            'jurusan' => 'required',
            'perguruan_tinggi' => 'required',
            'asal_perguruan_tinggi' => 'required',
            'tanggal_kelulusan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pendidikan-dosen")->with('error', 'Data pendidikan gagal diperbarui.');
        }

        PendidikanModels::where('id_pendidikan', $id_pendidikan)->update([
            'gelar' => $request->input('gelar'),
            'jurusan' => $request->input('jurusan'),
            'perguruan_tinggi' => $request->input('perguruan_tinggi'),
            'asal_perguruan_tinggi' => $request->input('asal_perguruan_tinggi'),
            'tanggal_kelulusan' => $request->input('tanggal_kelulusan'),
        ]);

        return redirect('/form-pendidikan-dosen')->with('success', 'Data pendidikan berhasil diperbarui');
    }

    public function delete($id_pendidikan)
    {
        $pendidikan = PendidikanModels::find($id_pendidikan);
        $pendidikan->delete();
        return redirect('/form-pendidikan-dosen')->with('success', 'Data pendidikan berhasil dihapus');
    }
}

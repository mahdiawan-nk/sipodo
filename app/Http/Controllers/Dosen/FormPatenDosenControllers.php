<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\PatenHakiModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormPatenDosenControllers extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan data pendidikan berdasarkan ID pengguna
        $patendanHaKi = PatenHakiModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.paten.index", compact("patendanHaKi"));
    }
    function create()
    {
        return view("dosen.paten.create");
    }

    function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_terima' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-patendanHaKi-dosen")->with('error', 'Data Paten Dan HaKi gagal ditambahkan.');
        }

        $userId = Auth::id();

        PatenHakiModels::create([
            'id' => $userId,
            'nama' => $request->input('nama'),
            'tanggal_terima' => $request->input('tanggal_terima'),
        ]);
        return redirect('/form-patendanHaKi-dosen')->with('success', 'Data Paten Dan HaKi berhasil ditambahkan.');
    }
    function update($id_patendanhaki)
    {
        $paten = PatenHakiModels::find($id_patendanhaki);
        return view("dosen.paten.update", compact('paten'));
    }

    function updateData(Request $request, $id_patendanhaki)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_terima' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-patendanHaKi-dosen")->with('error', 'Data Paten Dan HaKi gagal diperbarui.');
        }

        $userId = Auth::id();

        PatenHakiModels::where('id_patendanhaki', $id_patendanhaki)->update([
            'id' => $userId,
            'nama' => $request->input('nama'),
            'tanggal_terima' => $request->input('tanggal_terima'),
        ]);
        return redirect('/form-patendanHaKi-dosen')->with('success', 'Data Paten Dan HaKi berhasil diperbarui.');
    }

    function delete($id_patendanhaki)
    {
        $paten = PatenHakiModels::find($id_patendanhaki);
        $paten->delete();
        return redirect('/form-patendanHaKi-dosen')->with('success', 'Data Paten Dan HaKi berhasil dihapus.');
    }
}

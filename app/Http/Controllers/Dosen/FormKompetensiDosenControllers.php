<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\KompetensiModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormKompetensiDosenControllers extends Controller
{
    public function index()
    {
    $userId = Auth::id();

        // Mendapatkan data pengalaman jabatan berdasarkan ID pengguna
        $kompetensi = KompetensiModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.kompetensi.index", compact("kompetensi"));
    }
    function create() {
        return view("dosen.kompetensi.create");
    }
    function createData(Request $request) {
        $userId = Auth::id();

        KompetensiModels::create([
            'id'=>$userId,
            'jenis_kompetensi'=>$request->input('jenis_kompetensi'),
        ]);
        return redirect('/form-kompetensi-dosen')->with('success', 'Data Kompetensi berhasil ditambahkan'); 
    }
    function update($id_kompetensi)
    {
        $kompetensi = KompetensiModels::find($id_kompetensi);
        return view("dosen.kompetensi.update", compact('kompetensi'));
    }

    function updateData(Request $request, $id_kompetensi)
    {
        $validator = Validator::make($request->all(), [
            'jenis_kompetensi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-kompetensi-dosen")->with('error', 'Data Kompetensi gagal diperbarui.');
        }
        $userId = Auth::id();

        KompetensiModels::where('id_kompetensi', $id_kompetensi)->update([
            'id' => $userId,
            'jenis_kompetensi' => $request->input('jenis_kompetensi'),
        ]);
        return redirect('/form-kompetensi-dosen')->with('success', 'Data Kompetensi berhasil diperbarui.');
    }

    function delete($id_kompetensi)
    {
        $kompetensi = KompetensiModels::find($id_kompetensi);
        $kompetensi->delete();
        return redirect('/form-kompetensi-dosen')->with('success', 'Data Kompetensi berhasil dihapus.');
    }
}

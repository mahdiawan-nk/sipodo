<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\BukuModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormBukuControllers extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan data pengalaman mengajar berdasarkan ID pengguna
        $buku = BukuModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.buku.index", compact("buku"));
    }
    function create()
    {
        return view("dosen.buku.create");
    }
    function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'link' => 'required',
            'lokasi_terbit' => 'required',
            'penerbit' => 'required',
            'autor' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-buku-dosen")->with('error', 'Data buku gagal ditambahkan.');
        }
        $userId = Auth::id();

        BukuModels::create([
            'id' => $userId,
            'tahun_terbit' => $request->input('tahun_terbit'),
            'isbn' => $request->input('isbn'),
            'kategori' => $request->input('kategori'),
            'judul' => $request->input('judul'),
            'link' => $request->input('link'),
            'lokasi_terbit' => $request->input('lokasi_terbit'),
            'penerbit' => $request->input('penerbit'),
            'autor' => $request->input('autor'),
        ]);
        return redirect('/form-buku-dosen')->with('success', 'Data Buku berhasil ditambahkan');
    }
    function update($id_buku)
    {
        $buku = BukuModels::find($id_buku);
        return view("dosen.buku.update", compact('buku'));
    }
    function updateData(Request $request, $id_buku)
    {
        $validator = Validator::make($request->all(), [
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'link' => 'required',
            'lokasi_terbit' => 'required',
            'penerbit' => 'required',
            'autor' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-buku-dosen")->with('error', 'Data buku gagal diperbarui.');
        }

        $userId = Auth::id();

        BukuModels::where('id_buku', $id_buku)->update([
            'id' => $userId,
            'tahun_terbit' => $request->input('tahun_terbit'),
            'isbn' => $request->input('isbn'),
            'kategori' => $request->input('kategori'),
            'judul' => $request->input('judul'),
            'link' => $request->input('link'),
            'lokasi_terbit' => $request->input('lokasi_terbit'),
            'penerbit' => $request->input('penerbit'),
            'autor' => $request->input('autor'),
        ]);
        return redirect('/form-buku-dosen')->with('success', 'Data Buku berhasil diperbarui');
    }

    function delete($id_buku)
    {
        $buku = BukuModels::find($id_buku);
        $buku->delete();
        return redirect('/form-buku-dosen')->with('success', 'Data Buku dihapus.');
    }
}

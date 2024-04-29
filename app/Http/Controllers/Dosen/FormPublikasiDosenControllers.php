<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\PublikasiModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormPublikasiDosenControllers extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan data pengalaman jabatan berdasarkan ID pengguna
        $publikasi = PublikasiModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.publikasi.index", compact("publikasi"));
    }

    public function create()
    {
        return view("dosen.publikasi.create");
    }

    public function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_publikasi' => 'required',
            'nama_publikasi' => 'required',
            'tahun_publikasi' => 'required',
            'autor' => 'required',
            'publiser' => 'required',
            'status_akreditasi' => 'required',
            'link_publikasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-publikasi-dosen")->with('error', 'Data publikasi gagal disimpan.');
        }

        $userId = Auth::id();

        PublikasiModels::create([
            'id' => $userId,
            'kategori_publikasi' => $request->input('kategori_publikasi'),
            'nama_publikasi' => $request->input('nama_publikasi'),
            'tahun_publikasi' => $request->input('tahun_publikasi'),
            'autor' => $request->input('autor'),
            'publiser' => $request->input('publiser'),
            'status_akreditasi' => $request->input('status_akreditasi'),
            'link_publikasi' => $request->input('link_publikasi'),
        ]);

        return redirect('/form-publikasi-dosen')->with('success', 'Data Publikasi berhasil ditambahkan');
    }

    public function update($id_publikasi)
    {
        $publikasi = PublikasiModels::find($id_publikasi);
        return view('dosen.publikasi.update', compact('publikasi'));
    }

    public function updateData(Request $request, $id_publikasi)
    {
        $validator = Validator::make($request->all(), [
            'kategori_publikasi' => 'required',
            'nama_publikasi' => 'required',
            'tahun_publikasi' => 'required',
            'autor' => 'required',
            'publiser' => 'required',
            'status_akreditasi' => 'required',
            'link_publikasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-publikasi-dosen")->with('error', 'Data publikasi gagal diperbarui.');
        }

        $publikasi = PublikasiModels::find($id_publikasi);

        if (!$publikasi) {
            return abort(404);
        }

        // Mengisi nilai-nilai atribut pada model PublikasiModels
        $publikasi->kategori_publikasi = $request->input('kategori_publikasi');
        $publikasi->nama_publikasi = $request->input('nama_publikasi');
        $publikasi->tahun_publikasi = $request->input('tahun_publikasi');
        $publikasi->autor = $request->input('autor');
        $publikasi->publiser = $request->input('publiser');
        $publikasi->status_akreditasi = $request->input('status_akreditasi');
        $publikasi->link_publikasi = $request->input('link_publikasi');

        $publikasi->save();

        return redirect("/form-publikasi-dosen")->with('success', 'Data Publikasi berhasil diperbarui.');
    }

    public function delete($id_publikasi)
    {
        $publikasi = PublikasiModels::find($id_publikasi);

        if (!$publikasi) {
            return abort(404);
        }

        $publikasi->delete();

        return redirect("/form-publikasi-dosen")->with('success', 'Data Publikasi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\PengabdianModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormPengabdianDosenControllers extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan data pendidikan berdasarkan ID pengguna
        $pengabdian = PengabdianModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.pengabdian.index", compact("pengabdian"));
    }

    public function create()
    {
        return view("dosen.pengabdian.create");
    }

    public function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_kegiatan' => 'required',
            'tahun_kegiatan' => 'required',
            'status' => 'required',
            'lokasi_kegiatan' => 'required',
            'link_pengabdian' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pengabdian-dosen")->with('error', 'Data pengabdian gagal disimpan.');
        }

        $userId = Auth::id();
        $idProdi = Auth::user()->id_prodi;

        PengabdianModels::create([
            'id' => $userId,
            'judul_kegiatan' => $request->input('judul_kegiatan'),
            'tahun_kegiatan' => $request->input('tahun_kegiatan'),
            'lokasi_kegiatan' => $request->input('lokasi_kegiatan'),
            'status' => $request->input('status'),
            'link_pengabdian' => $request->input('link_pengabdian'),
        ]);

        return redirect('/form-pengabdian-dosen')->with('success', 'Data Pengabdian berhasil ditambahkan');
    }

    public function update($id_pengabdian)
    {
        $pengabdian = PengabdianModels::find($id_pengabdian);
        return view('dosen.pengabdian.update', compact('pengabdian'));
    }

    public function updateData(Request $request, $id_pengabdian)
    {
        $validator = Validator::make($request->all(), [
            'judul_kegiatan' => 'required',
            'tahun_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'status' => 'required',
            'link_pengabdian' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pengabdian-dosen")->with('error', 'Data pengabdian gagal diperbarui.');
        }

        $pengabdian = PengabdianModels::find($id_pengabdian);

        if (!$pengabdian) {
            return abort(404);
        }

        // Mengisi nilai-nilai atribut pada model PengabdianModels
        $pengabdian->judul_kegiatan = $request->input('judul_kegiatan');
        $pengabdian->tahun_kegiatan = $request->input('tahun_kegiatan');
        $pengabdian->lokasi_kegiatan = $request->input('lokasi_kegiatan');
        $pengabdian->status = $request->input('status');
        $pengabdian->link_pengabdian = $request->input('link_pengabdian');

        $pengabdian->save();

        return redirect("/form-pengabdian-dosen")->with('success', 'Data Pengabdian berhasil diperbarui.');
    }

    public function delete($id_pengabdian)
    {
        $pengabdian = PengabdianModels::find($id_pengabdian);

        if (!$pengabdian) {
            return abort(404);
        }

        $pengabdian->delete();

        return redirect("/form-pengabdian-dosen")->with('success', 'Data Pengabdian berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\PenelitianModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormPenelitianDosenControllers extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan data pengalaman jabatan berdasarkan ID pengguna
        $penelitian = PenelitianModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.penelitian.index", compact("penelitian"));
    }

    public function create()
    {
        return view("dosen.penelitian.create");
    }

    public function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_penelitian' => 'required',
            'tahun_penelitian' => 'required',
            'lokasi_penelitian' => 'required',
            'status' => 'required',
            'link_penelitian' => 'required',
            'sumber_dana' => 'required',
            'nama_pemberi_dana' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-penelitian-dosen")->with('error', 'Data Penelitian gagal disimpan.');
        }

        $userId = Auth::id();

        PenelitianModels::create([
            'id' => $userId,
            'judul_penelitian' => $request->input('judul_penelitian'),
            'tahun_penelitian' => $request->input('tahun_penelitian'),
            'lokasi_penelitian' => $request->input('lokasi_penelitian'),
            'status' => $request->input('status'),
            'link_penelitian' => $request->input('link_penelitian'),
            'sumber_dana' => $request->input('sumber_dana'),
            'nama_pemberi_dana' => $request->input('nama_pemberi_dana'),
        ]);

        return redirect('/form-penelitian-dosen')->with('success', 'Data Penelitian berhasil ditambahkan');
    }

    public function update($id_penelitian)
    {
        $penelitian = PenelitianModels::find($id_penelitian);
        return view('dosen.penelitian.update', compact('penelitian', 'id_penelitian'));
    }

    public function updateData(Request $request, $id_penelitian)
    {
        $validator = Validator::make($request->all(), [
            'judul_penelitian' => 'required',
            'tahun_penelitian' => 'required',
            'lokasi_penelitian' => 'required',
            'status' => 'required',
            'link_penelitian' => 'required',
            'sumber_dana' => 'required',
            'nama_pemberi_dana' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-penelitian-dosen")->with('error', 'Data Penelitian gagal diperbarui.');
        }

        $penelitian = PenelitianModels::find($id_penelitian);

        if (!$penelitian) {
            return abort(404);
        }

        // Mengisi nilai-nilai atribut pada model PenelitianModels
        $penelitian->judul_penelitian = $request->input('judul_penelitian');
        $penelitian->tahun_penelitian = $request->input('tahun_penelitian');
        $penelitian->lokasi_penelitian = $request->input('lokasi_penelitian');
        $penelitian->status = $request->input('status');
        $penelitian->link_penelitian = $request->input('link_penelitian');
        $penelitian->sumber_dana = $request->input('sumber_dana');
        $penelitian->nama_pemberi_dana = $request->input('nama_pemberi_dana');

        $penelitian->save();

        return redirect("/form-penelitian-dosen")->with('success', 'Data Penelitian berhasil diperbarui.');
    }

    public function delete($id_penelitian)
    {
        $penelitian = PenelitianModels::find($id_penelitian);

        if (!$penelitian) {
            return abort(404);
        }

        $penelitian->delete();

        return redirect("/form-penelitian-dosen")->with('success', 'Data Penelitian berhasil dihapus.');
    }
}

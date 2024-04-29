<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\PembicaraModels;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class FormPembicaraControllers extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan data pendidikan berdasarkan ID pengguna
        $pembicara = PembicaraModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.pembicara.index", compact("pembicara"));
    }

    public function create()
    {
        return view("dosen.pembicara.create");
    }

    public function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_materi' => 'required',
            'lokasi_kegiatan' => 'required',
            'ruang_lingkup' => 'required',
            'tanggal_kegiatan' => 'required',
            'penyelenggara' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pembicara-dosen")->with('error', 'Data pembicara dosen gagal ditambahkan.');
        }

        $userId = Auth::id();

        PembicaraModels::create([
            'id' => $userId,
            'judul_materi' => $request->input('judul_materi'),
            'lokasi_kegiatan' => $request->input('lokasi_kegiatan'),
            'ruang_lingkup' => $request->input('ruang_lingkup'),
            'tanggal_kegiatan' => $request->input('tanggal_kegiatan'),
            'penyelenggara_kegiatan' => $request->input('penyelenggara'),
        ]);

        return redirect('/form-pembicara-dosen')->with('success', 'Data pembicara dosen berhasil ditambahkan');
    }

    public function update($id_pembicara)
    {
        $pembicara = PembicaraModels::find($id_pembicara);

        return view("dosen.pembicara.update", compact("pembicara"));
    }

    public function updateData(Request $request, $id_pembicara)
    {
        // $validator = Validator::make($request->all(), [
        //     'judul_materi' => 'required',
        //     'lokasi_kegiatan' => 'required',
        //     'ruang_lingkup' => 'required',
        //     'tanggal_kegiatan' => 'required',
        //     'penyelenggara' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect("/form-pembicara-dosen")->with('error', 'Data pembicara dosen gagal diperbarui.');
        // }

        PembicaraModels::where('id_pembicara', $id_pembicara)->update([
            'judul_materi' => $request->input('judul_materi'),
            'lokasi_kegiatan' => $request->input('lokasi_kegiatan'),
            'ruang_lingkup' => $request->input('ruang_lingkup'),
            'tanggal_kegiatan' => $request->input('tanggal_kegiatan'),
            'penyelenggara_kegiatan' => $request->input('penyelenggara_kegiatan'), // Sesuaikan nama field di sini
        ]);
    
        return redirect('/form-pembicara-dosen')->with('success', 'Data pembicara dosen berhasil diperbarui');
    }

    public function delete($id_pembicara)
    {
        $pembicara = PembicaraModels::find($id_pembicara);
        $pembicara->delete();

        return redirect('/form-pembicara-dosen')->with('success', 'Data pengalaman hibah berhasil dihapus');
    }
}

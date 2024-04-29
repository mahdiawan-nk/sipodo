<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\SeminardanPelatihanModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormSeminarDosenControllers extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan data pengalaman jabatan berdasarkan ID pengguna
        $seminardanpelatihan = SeminardanPelatihanModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.seminar.index", compact("seminardanpelatihan"));
    }

    function create()
    {
        return view("dosen.seminar.create");
    }
    function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tema_seminardanpelatihan' => 'required',
            'tanggal_seminardanpelatihan' => 'required',
            'lokasi_seminardanpelatihan' => 'required',
            'penyelenggara' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-seminardanpelatihan-dosen")->with('error', 'Data seminar dan pelatihan gagal disimpan.');
        }

        $userId = Auth::id();

        SeminardanPelatihanModels::create([
            'id' => $userId,
            'tema_seminardanpelatihan' => $request->input('tema_seminardanpelatihan'),
            'tanggal_seminardanpelatihan' => $request->input('tanggal_seminardanpelatihan'),
            'lokasi_seminardanpelatihan' => $request->input('lokasi_seminardanpelatihan'),
            'penyelenggara' => $request->input('penyelenggara'),
        ]);
        return redirect('/form-seminardanpelatihan-dosen')->with('success', 'Data seminar dan pelatihan berhasil ditambahkan');
    }
    function update($id_seminardanpelatihan)
    {
        $seminar = SeminardanPelatihanModels::find($id_seminardanpelatihan);
        return view("dosen.seminar.update", compact('seminar'));
    }
    function updateData(Request $request, $id_seminardanpelatihan)
    {
        $validator = Validator::make($request->all(), [
            'tema_seminardanpelatihan' => 'required',
            'tanggal_seminardanpelatihan' => 'required',
            'lokasi_seminardanpelatihan' => 'required',
            'penyelenggara' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-seminardanpelatihan-dosen")->with('error', 'Data seminar dan pelatihan gagal diperbarui.');
        }

        $userId = Auth::id();

        SeminardanPelatihanModels::where('id_seminardanpelatihan', $id_seminardanpelatihan)->update([
            'id' => $userId,
            'tema_seminardanpelatihan' => $request->input('tema_seminardanpelatihan'),
            'tanggal_seminardanpelatihan' => $request->input('tanggal_seminardanpelatihan'),
            'lokasi_seminardanpelatihan' => $request->input('lokasi_seminardanpelatihan'),
            'penyelenggara' => $request->input('penyelenggara'),
        ]);
        return redirect('/form-seminardanpelatihan-dosen')->with('success', 'Data seminar dan pelatihan berhasil diperbarui.');
    }

    function delete($id_seminardanpelatihan)
    {
        $seminar = SeminardanPelatihanModels::find($id_seminardanpelatihan);
        $seminar->delete();
        return redirect('/form-seminardanpelatihan-dosen')->with('success', 'Data seminar dan pelatihan berhasil dihapus.');
    }
}

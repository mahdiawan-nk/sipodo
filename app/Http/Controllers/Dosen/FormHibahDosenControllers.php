<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\HibahModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormHibahDosenControllers extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mendapatkan data pendidikan berdasarkan ID pengguna
        $hibah = HibahModels::where('id', $userId)->get();

        // Mengirimkan data ke view
        return view("dosen.hibah.index", compact("hibah"));
    }

    public function create()
    {
        return view("dosen.hibah.create");
    }

    public function createData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_hibah' => 'required',
            'tanggal_hibah' => 'required',
            'lokasi_hibah' => 'required',
            'jumlah_dana' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pengalaman-hibah-dosen")->with('error', 'Data pengalaman hibah gagal ditambahkan.');
        }

        $userId = Auth::id();

        HibahModels::create([
            'id' => $userId,
            'nama_hibah' => $request->input('nama_hibah'),
            'tanggal_hibah' => $request->input('tanggal_hibah'),
            'lokasi_hibah' => $request->input('lokasi_hibah'),
            'jumlah_dana' => $request->input('jumlah_dana'),
        ]);

        return redirect('/form-pengalaman-hibah-dosen')->with('success', 'Data pengalaman hibah berhasil ditambahkan');
    }

    public function update($id_hibah)
    {
        $hibah = HibahModels::find($id_hibah);

        return view("dosen.hibah.update", compact("hibah"));
    }

    public function updateData(Request $request, $id_hibah)
    {
        $validator = Validator::make($request->all(), [
            'nama_hibah' => 'required',
            'tanggal_hibah' => 'required',
            'lokasi_hibah' => 'required',
            'jumlah_dana' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/form-pengalaman-hibah-dosen")->with('error', 'Data pengalaman hibah gagal diperbarui.');
        }

        HibahModels::where('id_hibah', $id_hibah)->update([
            'nama_hibah' => $request->input('nama_hibah'),
            'tanggal_hibah' => $request->input('tanggal_hibah'),
            'lokasi_hibah' => $request->input('lokasi_hibah'),
            'jumlah_dana' => $request->input('jumlah_dana'),
        ]);

        return redirect('/form-pengalaman-hibah-dosen')->with('success', 'Data pengalaman hibah berhasil diperbarui');
    }

    public function delete($id_hibah)
    {
        $hibah = HibahModels::find($id_hibah);
        $hibah->delete();

        return redirect('/form-pengalaman-hibah-dosen')->with('success', 'Data pengalaman hibah berhasil dihapus');
    }
}

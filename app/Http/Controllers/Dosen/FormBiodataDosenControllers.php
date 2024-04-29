<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\BiodataModels;
use App\Models\UsersModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormBiodataDosenControllers extends Controller
{
    public function index()
    {
        $id = Auth::id();

        // Mendapatkan data pendidikan berdasarkan ID pengguna
        $biodata = BiodataModels::select('tb_biodata.*', 'tb_user.nrp')
            ->join('tb_user', 'tb_biodata.id', '=', 'tb_user.id')
            ->where('tb_user.id', $id)
            ->get();

        if ($biodata->count() > 0) {
            return view("dosen.biodata.index", compact('biodata','id'));
        } else {
            return view("dosen.biodata.index2")->with('error', 'Data tidak ditemukan.');
        }
    }

    public function create()
    {
        return view("dosen.biodata.create");
    }

    public function createData(Request $request)
    {
        $userId = Auth::id();
        $request->validate([
            // ... (aturan validasi lainnya)
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // contoh: batasan untuk tipe file dan ukuran
        ]);

        $biodataData = [
            'id' => $userId,
            'nama' => $request->input('nama'),
            'nidn' => $request->input('nidn'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'nik' => $request->input('nik'),
            'agama' => $request->input('agama'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'jabfung' => $request->input('jabfung'),
            
        ];

        if ($request->hasFile('photo')) {
            $foto = $request->file('photo');

            // Membuat nama unik untuk file agar tidak menimpa file yang sudah ada
            $namaFoto = uniqid() . '_' . $foto->getClientOriginalName();

            // Memindahkan file ke direktori public/photo_profile
            $foto->move(public_path('photo_profile'), $namaFoto);

            // Memperbarui kolom photo_profile dalam array data dengan nama file
            $biodataData['photo_profile'] = 'photo_profile/' . $namaFoto;
        }

        BiodataModels::create($biodataData);

        return redirect('/profile-dosen')->with('success', 'Data Biodata berhasil ditambahkan');
    }

    function update($id_biodata)
    {
        $biodata = BiodataModels::find($id_biodata);
        return view('dosen.biodata.update', compact('biodata'));
    }

    public function updateData(Request $request, $id_biodata)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // contoh: batasan untuk tipe file dan ukuran
        ]);

        $biodata = BiodataModels::find($id_biodata);

        if (!$biodata) {
            return abort(404);
        }

        // Mengisi nilai-nilai atribut pada model BiodataModels
        $biodata->nama = $request->input('nama');
        $biodata->nidn = $request->input('nidn');
        $biodata->alamat = $request->input('alamat');
        $biodata->jenis_kelamin = $request->input('jenis_kelamin');
        $biodata->tempat_lahir = $request->input('tempat_lahir');
        $biodata->tanggal_lahir = $request->input('tanggal_lahir');
        $biodata->nik = $request->input('nik');
        $biodata->agama = $request->input('agama');
        $biodata->email = $request->input('email');
        $biodata->no_hp = $request->input('no_hp');
        $biodata->jabfung = $request->input('jabfung');

        if ($request->hasFile('photo')) {
            $foto = $request->file('photo');

            // Membuat nama unik untuk file agar tidak menimpa file yang sudah ada
            $namaFoto = uniqid() . '_' . $foto->getClientOriginalName();

            // Memindahkan file ke direktori public/photo_profile
            $foto->move(public_path('photo_profile'), $namaFoto);

            // Memperbarui kolom photo_profile dalam model dengan nama file
            $biodata->photo_profile = 'photo_profile/' . $namaFoto;
        }


        $biodata->save();

        return redirect("/profile-dosen")->with('success', 'Data Biodata berhasil diperbarui.');
    }

    function updateuser($id){
        $user = UsersModels::find($id);
        return view('dosen.biodata.updateuser',compact('user','id'));
    }
    function updateuserData(Request $request,$id){
        $hash=bcrypt($request->input('password'));
        UsersModels::where('tb_user.id',$id)
        ->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$hash,
        ]);
        return redirect("/profile-dosen")->with('success','User berhasil diperbarui.');
        }

}

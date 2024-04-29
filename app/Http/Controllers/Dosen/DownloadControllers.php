<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\BiodataModels;
use App\Models\BukuModels;
use App\Models\HibahModels;
use App\Models\KompetensiModels;
use App\Models\MengajarModels;
use App\Models\PatenHakiModels;
use App\Models\PendidikanModels;
use App\Models\JabatanModels;
use App\Models\PembicaraModels;
use App\Models\PenelitianModels;
use App\Models\PengabdianModels;
use App\Models\PublikasiModels;
use App\Models\SeminardanPelatihanModels;
use Illuminate\Http\Request;
use PDF;
use Auth;

class DownloadControllers extends Controller
{
    public function index()
    {
        $AdminId = Auth::id();
        $biodata = BiodataModels::select('tb_biodata.*','tb_user.nrp')
        ->join('tb_user','tb_biodata.id','=','tb_user.id')
        ->where('tb_biodata.id', $AdminId)
        ->get();
        $pendidikan = PendidikanModels::where('id',$AdminId)->get();
        $jabatan = JabatanModels::where('id',$AdminId)->get();
        $kompetensi = KompetensiModels::where('id',$AdminId)->get();
        $mengajar = MengajarModels::where('id',$AdminId)->get();
        $seminardanpelatihan = SeminardanPelatihanModels::where('id',$AdminId)->get();
        $penelitian = PenelitianModels::where('id',$AdminId)->get();
        $publikasi = PublikasiModels::where('id',$AdminId)->get();
        $pengabdian = PengabdianModels::where('id',$AdminId)->get();
        $hibah = HibahModels::where('id',$AdminId)->get();
        $buku = BukuModels::where('id',$AdminId)->get();
        $patendanhaki = PatenHakiModels::where('id',$AdminId)->get();
        $pembicara = PembicaraModels::where('id',$AdminId)->get();
        return view("dosen.cv.index", compact('biodata', 'pendidikan', 'jabatan', 'kompetensi', 'mengajar', 
        'seminardanpelatihan', 'penelitian', 'publikasi', 'pengabdian', 'hibah', 'buku', 'patendanhaki','pembicara'));
    }

    public function downloadPDF(Request $request)
    {
        $selectedBiodataIds = $request->input('selected_biodata_ids', []);
        $selectedPendidikanIds = $request->input('selected_pendidikan_ids', []);
        $selectedJabatanIds = $request->input('selected_jabatan_ids', []);
        $selectedKompetensiIds = $request->input('selected_kompetensi_ids', []);
        $selectedMengajarIds = $request->input('selected_mengajar_ids', []);
        $selectedSeminardanPelatihanIds = $request->input('selected_seminardanpelatihan_ids', []);
        $selectedPenelitianIds = $request->input('selected_penelitian_ids', []);
        $selectedPublikasiIds = $request->input('selected_publikasi_ids', []);
        $selectedPengabdianIds = $request->input('selected_pengabdian_ids', []);
        $selectedHibahIds = $request->input('selected_hibah_ids', []);
        $selectedBukuIds = $request->input('selected_buku_ids', []);
        $selectedPatendanHaKiIds = $request->input('selected_patendanHaKi_ids', []);
        $selectedPembicara = $request->input('selected_pembicara_ids', []);

        $biodata = BiodataModels::whereIn('id_biodata', $selectedBiodataIds)->get();
        // dd($biodata);
// Ambil PendidikanModel menggunakan kolom yang benar (misalnya, 'id_pendidikan')
        $pendidikan = PendidikanModels::whereIn('id_pendidikan', $selectedPendidikanIds)->get();

        // Ambil JabatanModel menggunakan kolom yang benar (misalnya, 'id_jabatan')
        $jabatan = JabatanModels::whereIn('id_jabatan', $selectedJabatanIds)->get();

        // Ambil kompetensimodel menggunakan kolom yang benar (misalnya, 'id_kompetensi')
        $kompetensi = KompetensiModels::whereIn('id_kompetensi', $selectedKompetensiIds)->get();
        
        // Ambil MengajarModel menggunakan kolom yang benar (misalnya, 'id_mengajar')
        $mengajar = MengajarModels::whereIn('id_mengajar', $selectedMengajarIds)->get();
       
        // Ambil SeminardanPelatihanModel menggunakan kolom yang benar (misalnya, 'id_seminardanpelatihan')
        $seminardanpelatihan = SeminardanPelatihanModels::whereIn('id_seminardanpelatihan', $selectedSeminardanPelatihanIds)->get();
       
        // Ambil PenelitianModel menggunakan kolom yang benar (misalnya, 'id_pendidikan')
        $penelitian = PenelitianModels::whereIn('id_penelitian', $selectedPenelitianIds)->get();
        
        // Ambil PengabdianModel menggunakan kolom yang benar (misalnya, 'id_pengabdian')
        $publikasi = PublikasiModels::whereIn('id_publikasi', $selectedPublikasiIds)->get();

        $pengabdian = PengabdianModels::whereIn('id_pengabdian', $selectedPengabdianIds)->get();
        
        // Ambil Pengalaman HibahModel menggunakan kolom yang benar (misalnya, 'id_hibah')
        $hibah = HibahModels::whereIn('id_hibah', $selectedHibahIds)->get();
        
        // Ambil Pengalaman DiklatModel menggunakan kolom yang benar (misalnya, 'id_diklat')
        $buku = BukuModels::whereIn('id_buku', $selectedBukuIds)->get();
        
        // Ambil PatendanHaKiModel menggunakan kolom yang benar (misalnya, 'id_patendanhaki')
        $patendanHaKi = PatenHakiModels::whereIn('id_patendanhaki', $selectedPatendanHaKiIds)->get();
   
        // Ambil PatendanHaKiModel menggunakan kolom yang benar (misalnya, 'id_patendanhaki')
        $pembicara = PembicaraModels::whereIn('id_pembicara', $selectedPembicara)->get();
   


        
        $pdf = PDF::loadView('dosen.cv.pdf', compact('biodata', 'pendidikan','jabatan','kompetensi', 'mengajar',
        'seminardanpelatihan', 'penelitian', 'publikasi', 'pengabdian', 'hibah', 'buku', 'patendanHaKi','pembicara'));
        return $pdf->download('cv.pdf');
    }
}
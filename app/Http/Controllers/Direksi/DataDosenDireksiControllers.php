<?php

namespace App\Http\Controllers\Direksi;

use App\Exports\EksporCSV;
use App\Models\KompetensiModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\BiodataModels;
use App\Models\BukuModels;
use App\Models\HibahModels;
use App\Models\JabatanModels;
use App\Models\MengajarModels;
use App\Models\PatenHakiModels;
use App\Models\PembicaraModels;
use App\Models\PendidikanModels;
use App\Models\PenelitianModels;
use App\Models\PengabdianModels;
use App\Models\ProdiModels;
use App\Models\PublikasiModels;
use App\Models\SeminardanPelatihanModels;
use App\Models\UsersModels;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Concerns\FromCollection;


class DataDosenDireksiControllers extends Controller
{
    function index()
    {
        $prodi = ProdiModels::all();
        $user = UsersModels::select('tb_user.*', 'tb_prodi.prodi')
            ->join('tb_prodi', 'tb_user.id_prodi', '=', 'tb_prodi.id_prodi')
            ->get();
        return view('direksi.datadosen.index', compact('user', 'prodi'));
    }

    function check($id)
    {
        $biodata = BiodataModels::select('tb_biodata.*','tb_user.nrp')
            ->join('tb_user','tb_biodata.id','=','tb_user.id')
            ->where('tb_biodata.id', $id)
            ->get();
        $pendidikan = PendidikanModels::select('tb_pendidikan.*')
            ->where('id', $id)
            ->get();
        $jabatan = JabatanModels::select('tb_jabatan.*')
            ->where('id', $id)
            ->get();
        $kompetensi = KompetensiModels::select('tb_kompetensi.*')
            ->where('id', $id)
            ->get();
        $mengajar = MengajarModels::select('tb_mengajar.*')
            ->where('id', $id)
            ->get();
        $seminardanpelatihan = SeminardanPelatihanModels::select('tb_seminardanpelatihan.*')
            ->where('id', $id)
            ->get();
        $penelitian = PenelitianModels::select('tb_penelitian.*')
            ->where('id', $id)
            ->get();
        $publikasi = PublikasiModels::select('tb_publikasi.*')
            ->where('id', $id)
            ->get();
        $pengabdian = PengabdianModels::select('tb_pengabdian.*')
            ->where('id', $id)
            ->get();
        $hibah = HibahModels::select('tb_hibah.*')
            ->where('id', $id)
            ->get();
        $buku = BukuModels::select('tb_buku.*')
            ->where('id', $id)
            ->get();
        $patendanhaki = PatenHakiModels::select('tb_patendanhaki.*')
            ->where('id', $id)
            ->get();
        $pembicara = PembicaraModels::select('tb_pembicara.*')
            ->where('id', $id)
            ->get();
        return view('direksi.datadosen.checkdata', compact('biodata', 'pendidikan', 'jabatan', 'kompetensi', 'mengajar', 'seminardanpelatihan', 'penelitian', 'publikasi', 'pengabdian', 'hibah', 'buku', 'patendanhaki','pembicara','id'));
    }

    public function downloadCsv(Request $request)
    {
        $selectedBiodataIds = $request->input('selected_biodata_ids', []);
        $selectedPendidikanIds = $request->input('selected_pendidikan_ids', []);
        $selectedJabatanIds = $request->input('selected_jabatan_ids', []);
        $selectedKompetensiIds = $request->input('selected_kompetensi_ids', []);
        $selectedMengajarIds = $request->input('selected_mengajar_ids',[]);
        $selectedSeminarDanPelatihanIds = $request->input('selected_seminardanpelatihan_ids',[]);
        $selectedPenelitianIds = $request->input('selected_penelitian_ids',[]);
        $selectedPublikasiIds = $request->input('selected_publikasi_ids',[]);
        $selectedPengabdianIds = $request->input('selected_pengabdian_ids',[]);
        $selectedHibahIds = $request->input('selected_hibah_ids',[]);
        $selectedBukuIds = $request->input('selected_buku_ids',[]);
        $selectedPatenDanHakiIds = $request->input('selected_patendanhaki_ids',[]);
        $selectedPembicaraIds = $request->input('selected_pembicara_ids',[]);

    
        $biodata = BiodataModels::whereIn('id_biodata', $selectedBiodataIds)->get();
        $pendidikan = PendidikanModels::whereIn('id_pendidikan', $selectedPendidikanIds)->get();
        $jabatan = JabatanModels::whereIn('id_jabatan', $selectedJabatanIds)->get();
        $kompentensi = KompetensiModels::whereIn('id_kompetensi', $selectedKompetensiIds)->get();
        $mengajar = MengajarModels::whereIn('id_mengajar', $selectedMengajarIds)->get();
        $seminar = SeminardanPelatihanModels::whereIn('id_seminardanpelatihan', $selectedSeminarDanPelatihanIds)->get();
        $penelitian = PenelitianModels::whereIn('id_penelitian', $selectedPenelitianIds)->get();
        $publikasi = PublikasiModels::whereIn('id_publikasi', $selectedPublikasiIds)->get();
        $pengabdian = PengabdianModels::whereIn('id_pengabdian', $selectedPengabdianIds)->get();
        $hibah = HibahModels::whereIn('id_hibah', $selectedHibahIds)->get();
        $buku = BukuModels::whereIn('id_buku', $selectedBukuIds)->get();
        $patendanhaki = PatenHakiModels::whereIn('id_patendanhaki', $selectedPatenDanHakiIds)->get();
        $pembicara = PembicaraModels::whereIn('id_pembicara', $selectedPembicaraIds)->get();
        
        $models = [
            'biodata' => ['data' => $biodata], 
            'pendidikan' => ['data' => $pendidikan], 
            'jabatan' => ['data' => $jabatan],
            'mengajar' => ['data' => $mengajar],
            'kompetensi' => ['data' => $kompentensi],
            'seminar' => ['data' => $seminar ],
            'penelitian' => ['data' => $penelitian ],
            'publikasi' => ['data' => $publikasi ],
            'pengabdian' => ['data' => $pengabdian ],
            'hibah' => ['data' => $hibah],
            'buku' => ['data' => $buku ],
            'patendanhaki' => ['data' => $patendanhaki ],
            'pembicara' => ['data' => $pembicara ],
        ];
    
        $excelFileName = 'CV Dosen.xlsx';
    
        return Excel::download(new EksporCSV($models), $excelFileName);
    }

    function checkCV($id)
    {
        $biodata = BiodataModels::select('tb_biodata.*','tb_user.nrp')
            ->join('tb_user','tb_biodata.id','=','tb_user.id')
            ->where('tb_biodata.id', $id)
            ->get();
        $pendidikan = PendidikanModels::select('tb_pendidikan.*')
            ->where('id', $id)
            ->get();
        $jabatan = JabatanModels::select('tb_jabatan.*')
            ->where('id', $id)
            ->get();
        $kompetensi = KompetensiModels::select('tb_kompetensi.*')
            ->where('id', $id)
            ->get();
        $mengajar = MengajarModels::select('tb_mengajar.*')
            ->where('id', $id)
            ->get();
        $seminardanpelatihan = SeminardanPelatihanModels::select('tb_seminardanpelatihan.*')
            ->where('id', $id)
            ->get();
        $penelitian = PenelitianModels::select('tb_penelitian.*')
            ->where('id', $id)
            ->get();
        $publikasi = PublikasiModels::select('tb_publikasi.*')
            ->where('id', $id)
            ->get();
        $pengabdian = PengabdianModels::select('tb_pengabdian.*')
            ->where('id', $id)
            ->get();
        $hibah = HibahModels::select('tb_hibah.*')
            ->where('id', $id)
            ->get();
        $buku = BukuModels::select('tb_buku.*')
            ->where('id', $id)
            ->get();
        $patendanhaki = PatenHakiModels::select('tb_patendanhaki.*')
            ->where('id', $id)
            ->get();
        $pembicara = PembicaraModels::select('tb_pembicara.*')
            ->where('id', $id)
            ->get();
        return view('direksi.datadosen.checkdataCV', compact('biodata', 'pendidikan', 'jabatan', 'kompetensi', 'mengajar', 'seminardanpelatihan', 'penelitian', 'publikasi', 'pengabdian', 'hibah', 'buku', 'patendanhaki','pembicara','id'));
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
        $selectedPembicaraIds = $request->input('selected_pembicara_ids', []);

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

        $pembicara = PembicaraModels::whereIn('id_pembicara', $selectedPembicaraIds)->get();
                
        $pdf = PDF::loadView('direksi.datadosen.pdf', compact('biodata', 'pendidikan','jabatan','kompetensi', 'mengajar',
        'seminardanpelatihan', 'penelitian', 'publikasi', 'pengabdian', 'hibah', 'buku', 'patendanHaKi','pembicara'));
        return $pdf->download('cv.pdf');
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');
        $idProdi = $request->input('id_prodi');

        $query = UsersModels::select('tb_user.*', 'tb_prodi.prodi')
            ->join('tb_prodi', 'tb_user.id_prodi', '=', 'tb_prodi.id_prodi')
            ->when($search, function ($query) use ($search) {
                $query->where('tb_user.nrp', 'like', '%' . $search . '%')
                    ->orWhere('tb_user.name', 'like', '%' . $search . '%');
            })
            ->when($idProdi, function ($query) use ($idProdi) {
                $query->where('tb_prodi.id_prodi', $idProdi);
            });

        $user = $query->get();
        $prodi = ProdiModels::all();

        return view('direksi.datadosen.index', compact('user', 'prodi'));
    }
}
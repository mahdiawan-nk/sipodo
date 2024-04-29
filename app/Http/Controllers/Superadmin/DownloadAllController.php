<?php

namespace App\Http\Controllers\Superadmin;

use App\Exports\EksporExcelDownloadAll;
use App\Exports\EksportExcelHibah;
use App\Exports\EksportExcelPatenHaki;
use App\Exports\EksportExcelPenelitian;
use App\Exports\EksportExcelPengabdian;
use App\Exports\EksportExcelPublikasi;
use App\Http\Controllers\Controller;
use App\Models\HibahModels;
use App\Models\PatenHakiModels;
use App\Models\PenelitianModels;
use App\Models\PengabdianModels;
use App\Models\PublikasiModels;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\BukuModels;
use Illuminate\Http\Request;

class DownloadAllController extends Controller
{

    public function index()
    {
        $buku = DB::table('tb_buku')->select(DB::raw('YEAR(tahun_terbit) as tahun, GROUP_CONCAT(id_buku) as id_buku'))->groupBy('tahun')->get();
        $hibah = DB::table('tb_hibah')->select(DB::raw('YEAR(tanggal_hibah) as tahun, GROUP_CONCAT(id_hibah) as id_hibah'))->groupBy('tahun')->get();
        $patendanhaki = DB::table('tb_patendanhaki')->select(DB::raw('YEAR(tanggal_terima) as tahun, GROUP_CONCAT(id_patendanhaki) as id_patendanhaki'))->groupBy('tahun')->get();
        $penelitian = DB::table('tb_penelitian')->select(DB::raw('YEAR(tahun_penelitian) as tahun, GROUP_CONCAT(id_penelitian) as id_penelitian'))->groupBy('tahun')->get();
        $pengabdian = DB::table('tb_pengabdian')->select(DB::raw('YEAR(tahun_kegiatan) as tahun, GROUP_CONCAT(id_pengabdian) as id_pengabdian'))->groupBy('tahun')->get();
        $publikasi = DB::table('tb_publikasi')->select(DB::raw('YEAR(tahun_publikasi) as tahun, GROUP_CONCAT(id_publikasi) as id_publikasi'))->groupBy('tahun')->get();
        return view('superadmin.download.index', compact('buku','hibah','patendanhaki','penelitian','pengabdian','publikasi'));
    }

    public function downloadBuku(Request $request, $tahun, $id_buku)
    {
        $idBukuArray = explode(',', $id_buku);

        $buku = BukuModels::whereIn('id_buku', $idBukuArray)->get();


        $models = [
            'Buku' => ['data' => $buku, 'Buku' => 'Buku'],
        ];
        

        $excelFileName = 'Data Buku Dosen - Tahun '.$tahun.'.xlsx';

        return Excel::download(new EksporExcelDownloadAll($models), $excelFileName);
    }
    public function downloadHibah(Request $request, $tahun, $id_hibah)
    {
        $idHibahArray = explode(',', $id_hibah);

        $hibah = HibahModels::whereIn('id_hibah', $idHibahArray)->get();


        $models = [
            'hibah' => ['data' => $hibah,'Hibah'=>'Hibah'],
        ];

        $excelFileName = 'Data Hibah Dosen - Tahun '.$tahun.'.xlsx';

        return Excel::download(new EksportExcelHibah($models), $excelFileName);
    }
    public function downloadPatendanhaki(Request $request, $tahun, $id_patendanhaki)
    {
        $idPatendanhakiArray = explode(',', $id_patendanhaki);

        $patendanhaki = PatenHakiModels::whereIn('id_patendanhaki', $idPatendanhakiArray)->get();


        $models = [
            'patendanhaki' => ['data' => $patendanhaki,'Paten Dan Haki'=>'Paten Dan Haki'],
        ];

        $excelFileName = 'Data Paten Dan Haki Dosen - Tahun '.$tahun.'.xlsx';

        return Excel::download(new EksportExcelPatenHaki($models), $excelFileName);
    }
    public function downloadPenelitian(Request $request, $tahun, $id_penelitian)
    {
        $idPenelitianArray = explode(',', $id_penelitian);

        $penelitian = PenelitianModels::whereIn('id_penelitian', $idPenelitianArray)->get();


        $models = [
            'penelitian' => ['data' => $penelitian,'Penelitian'=>'Penelitian'],
        ];

        $excelFileName = 'Data Penelitian Dosen - Tahun '.$tahun.'.xlsx';

        return Excel::download(new EksportExcelPenelitian($models), $excelFileName);
    }
    public function downloadPengabdian(Request $request, $tahun, $id_pengabdian)
    {
        $idPengabdianArray = explode(',', $id_pengabdian);

        $pengabdian = PengabdianModels::whereIn('id_pengabdian', $idPengabdianArray)->get();


        $models = [
            'pengabdian' => ['data' => $pengabdian,'Pengabdian'=>'Pengabdian'],
        ];

        $excelFileName = 'Data Pengabdian Dosen - Tahun '.$tahun.'.xlsx';

        return Excel::download(new EksportExcelPengabdian($models), $excelFileName);
    }
    public function downloadPublikasi(Request $request, $tahun, $id_publikasi)
    {
        $idPublikasiArray = explode(',', $id_publikasi);

        $publikasi = PublikasiModels::whereIn('id_publikasi', $idPublikasiArray)->get();


        $models = [
            'publikasi' => ['data' => $publikasi,'Publikasi'=>'Publikasi'],
        ];

        $excelFileName = 'Data Publikasi Dosen - Tahun '. $tahun .'.xlsx';

        return Excel::download(new EksportExcelPublikasi($models), $excelFileName);
    }

}

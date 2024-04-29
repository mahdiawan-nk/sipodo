<?php
/**
 * Untuk Form Login
 */

use App\Http\Controllers\Direksi\DataDosenDireksiControllers;
use App\Http\Controllers\Direksi\ProfileDireksiControllers;
use App\Http\Controllers\Dosen\DownloadControllers;
use App\Http\Controllers\Dosen\FormBukuControllers;
use App\Http\Controllers\Dosen\FormKompetensiDosenControllers;
use App\Http\Controllers\LoginControllers;
use App\Http\Controllers\Superadmin\DaftarPenggunaControllers;

/**
 * Untuk Tampilan Dosen
 */
use App\Http\Controllers\Dosen\FormBiodataDosenControllers;
use App\Http\Controllers\Dosen\FormHibahDosenControllers;
use App\Http\Controllers\Dosen\FormJabatanDosenControllers;
use App\Http\Controllers\Dosen\FormMengajarDosenControllers;
use App\Http\Controllers\Dosen\FormPatenDosenControllers;
use App\Http\Controllers\Dosen\FormPembicaraControllers;
use App\Http\Controllers\Dosen\FormPendidikanDosenControllers;
use App\Http\Controllers\Dosen\FormPenelitianDosenControllers;
use App\Http\Controllers\Dosen\FormPengabdianDosenControllers;
use App\Http\Controllers\Dosen\FormSeminarDosenControllers;
use App\Http\Controllers\Dosen\FormPublikasiDosenControllers;

use App\Http\Controllers\Superadmin\DaftarRoleControllers;
use App\Http\Controllers\Superadmin\DataDosenControllers;
use App\Http\Controllers\Superadmin\DownloadAllController;
use App\Http\Controllers\Superadmin\ProdiControllers;
use App\Http\Controllers\Superadmin\ProfileSuperAdminControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Untuk tampilan Login
Route::middleware(['web', 'guest'])->group(function () {
    //Tampilan Login
    Route::get('/', [LoginControllers::class, 'index'])->name('login');
    Route::post('/', [LoginControllers::class, 'authLogin']);
    Route::get('/home', function () {
        return redirect('/login');
    });
});

Route::middleware('auth')->group(function () {
    Route::middleware('check.user:1')->group(function () {
        /**
         * Untuk Tampilan Super Admin
         */
        Route::get('/profile-super-admin', [ProfileSuperAdminControllers::class, 'index']);
        Route::get('/update-user/{id}', [ProfileSuperAdminControllers::class, 'updateuser']);
        Route::put('/update-akun/{id}/updateuserData', [ProfileSuperAdminControllers::class, 'updateuserData']);

        // Untuk Tampilan Daftar Pengguna
        Route::get('/daftar-pengguna', [DaftarPenggunaControllers::class, 'index']);
        Route::get('/daftar-pengguna/create', [DaftarPenggunaControllers::class, 'create']);
        Route::post('/daftar-pengguna/Data', [DaftarPenggunaControllers::class, 'Data']);
        Route::get('/user/{id}/update', [DaftarPenggunaControllers::class, 'update']);
        Route::put('/user/{id}/updateData', [DaftarPenggunaControllers::class, 'updateData']);
        Route::get('/user/{id}/delete', [DaftarPenggunaControllers::class, 'delete']);

        // Untuk Tampilan Daftar Prodi
        Route::get('/daftar-prodi', [ProdiControllers::class, 'index']);
        Route::get('/daftar-prodi/create', [ProdiControllers::class, 'create']);
        Route::post('/daftar-prodi/createData', [ProdiControllers::class, 'createData']);
        Route::get('/daftar-prodi/update/{id_prodi}', [ProdiControllers::class, 'update']);
        Route::put('/daftar-prodi/updateData/{id_prodi}', [ProdiControllers::class, 'updateData']);
        Route::get('/daftar-prodi/{id_prodi}/delete', [ProdiControllers::class, 'delete']);

        // Untuk Tampilan data dosen
        Route::get('/data-dosen', [DataDosenControllers::class, 'index']);
        Route::get('/search-dosen', [DataDosenControllers::class, 'search'])->name('search-dosen');
        Route::get('/download-excel/{id}', [DataDosenControllers::class, 'check']);
        Route::post('/download-excel/download', [DataDosenControllers::class, 'downloadCsv'])->name('downloadCsv');
        Route::get('/download-cv/{id}', [DataDosenControllers::class, 'checkCV']);
        Route::post('/download-cv/downloadPDF', [DataDosenControllers::class, 'downloadPDF'])->name('downloadCsv');

        // untuk tampilan download seluruh data
        Route::get('/download-all', [DownloadAllController::class, 'index']);
        // Buku
        Route::get('/download-all-buku/{tahun}/{id_buku}',[DownloadAllController::class,'downloadBuku']);
        Route::get('/download-all-hibah/{tahun}/{id_hibah}',[DownloadAllController::class,'downloadHibah']);
        Route::get('/download-all-paten-haki/{tahun}/{id_patendanhaki}',[DownloadAllController::class,'downloadPatendanhaki']);
        Route::get('/download-all-penelitian/{tahun}/{id_penelitian}',[DownloadAllController::class,'downloadPenelitian']);
        Route::get('/download-all-pengabdian/{tahun}/{id_pengabdian}',[DownloadAllController::class,'downloadPengabdian']);
        Route::get('/download-all-publikasi/{tahun}/{id_publikasi}',[DownloadAllController::class,'downloadPublikasi']);

        Route::get('/logout', [LoginControllers::class, 'logout']);
    });

    

    Route::middleware('check.user:2')->group(function () {
        /**
         * Untuk Dosen
         */
        // Untuk tampilan biodata dosen
        Route::get('/profile-dosen', [FormBiodataDosenControllers::class, 'index']);
        Route::get('/biodata-dosen/create', [FormBiodataDosenControllers::class, 'create']);
        Route::post('/biodata-dosen/createData', [FormBiodataDosenControllers::class, 'createData']);
        Route::get('/biodata-dosen/{id_biodata}/update', [FormBiodataDosenControllers::class, 'update']);
        Route::put('/biodata-dosen/{id_biodata}/updateData', [FormBiodataDosenControllers::class, 'updateData']);
        Route::get('/update-user/{id}/updateuser', [FormBiodataDosenControllers::class, 'updateuser']);
        Route::put('/update-user/{id}/updateuserData', [FormBiodataDosenControllers::class, 'updateuserData']);

        // Untuk tampilan hibah dosen
        Route::get('/form-pengalaman-hibah-dosen', [FormHibahDosenControllers::class, 'index']);
        Route::get('/form-pengalaman-hibah-dosen/create', [FormHibahDosenControllers::class, 'create']);
        Route::post('/form-pengalaman-hibah-dosen/createData', [FormHibahDosenControllers::class, 'createData']);
        Route::get('/form-pengalaman-hibah-dosen/update/{id_hibah}', [FormHibahDosenControllers::class, 'update']);
        Route::put('/form-pengalaman-hibah-dosen/updateData/{id_hibah}', [FormHibahDosenControllers::class, 'updateData']);
        Route::get('/form-pengalaman-hibah-dosen/delete/{id_hibah}', [FormHibahDosenControllers::class, 'delete']);

        // Untuk tampilan pengalaman jabatan dosen
        Route::get('/form-pengalaman-jabatan-dosen', [FormJabatanDosenControllers::class, 'index']);
        Route::get('/form-pengalaman-jabatan-dosen/create', [FormJabatanDosenControllers::class, 'create']);
        Route::post('/form-pengalaman-jabatan-dosen/createData', [FormJabatanDosenControllers::class, 'createData']);
        Route::get('/form-pengalaman-jabatan-dosen/update/{id_jabatan}', [FormJabatanDosenControllers::class, 'update']);
        Route::put('/form-pengalaman-jabatan-dosen/updateData/{id_jabatan}', [FormJabatanDosenControllers::class, 'updateData']);
        Route::get('/form-pengalaman-jabatan-dosen/delete/{id_jabatan}', [FormJabatanDosenControllers::class, 'delete']);

        // Untuk tampilan Buku dosen
        Route::get('/form-buku-dosen', [FormBukuControllers::class, 'index']);
        Route::get('/form-buku-dosen/create', [FormBukuControllers::class, 'create']);
        Route::post('/form-buku-dosen/createData', [FormBukuControllers::class, 'createData']);
        Route::get('/form-buku-dosen/update/{id_buku}', [FormBukuControllers::class, 'update']);
        Route::put('/form-buku-dosen/updateData/{id_buku}', [FormBukuControllers::class, 'updateData']);
        Route::get('/form-buku-dosen/delete/{id_buku}', [FormBukuControllers::class, 'delete']);

        // Untuk tampilan pengalaman mengajar dosen
        Route::get('/form-pengalaman-mengajar-dosen', [FormMengajarDosenControllers::class, 'index']);
        Route::get('/form-pengalaman-mengajar-dosen/create', [FormMengajarDosenControllers::class, 'create']);
        Route::post('/form-pengalaman-mengajar-dosen/createData', [FormMengajarDosenControllers::class, 'createData']);
        Route::get('/form-pengalaman-mengajar-dosen/update/{id_mengajar}', [FormMengajarDosenControllers::class, 'update']);
        Route::put('/form-pengalaman-mengajar-dosen/updateData/{id_mengajar}', [FormMengajarDosenControllers::class, 'updateData']);
        Route::get('/form-pengalaman-mengajar-dosen/delete/{id_mengajar}', [FormMengajarDosenControllers::class, 'delete']);

        // Untuk tampilan Paten Dan HaKi dosen
        Route::get('/form-patendanHaKi-dosen', [FormPatenDosenControllers::class, 'index']);
        Route::get('/form-patendanHaKi-dosen/create', [FormPatenDosenControllers::class, 'create']);
        Route::post('/form-patendanHaKi-dosen/createData', [FormPatenDosenControllers::class, 'createData']);
        Route::get('/form-patendanHaKi-dosen/update/{id_patendanhaki}', [FormPatenDosenControllers::class, 'update']);
        Route::put('/form-patendanHaKi-dosen/updateData/{id_patendanhaki}', [FormPatenDosenControllers::class, 'updateData']);
        Route::get('/form-patendanHaKi-dosen/delete/{id_patendanhaki}', [FormPatenDosenControllers::class, 'delete']);

        // Untuk tampilan Pendidikan dosen
        Route::get('/form-pendidikan-dosen', [FormPendidikanDosenControllers::class, 'index']);
        Route::get('/form-pendidikan-dosen/create', [FormPendidikanDosenControllers::class, 'create']);
        Route::post('/form-pendidikan-dosen/createData', [FormPendidikanDosenControllers::class, 'createData']);
        Route::get('/form-pendidikan-dosen/update/{id_pendidikan}', [FormPendidikanDosenControllers::class, 'update']);
        Route::put('/form-pendidikan-dosen/updateData/{id_pendidikan}', [FormPendidikanDosenControllers::class, 'updateData']);
        Route::get('/form-pendidikan-dosen/delete/{id_pendidikan}', [FormPendidikanDosenControllers::class, 'delete']);

        // Untuk tampilan Penelitian dosen
        Route::get('/form-penelitian-dosen', [FormPenelitianDosenControllers::class, 'index']);
        Route::get('/form-penelitian-dosen/create', [FormPenelitianDosenControllers::class, 'create']);
        Route::post('/form-penelitian-dosen/createData', [FormPenelitianDosenControllers::class, 'createData']);
        Route::get('/form-penelitian-dosen/update/{id_penelitian}', [FormPenelitianDosenControllers::class, 'update']);
        Route::put('/form-penelitian-dosen/{id_penelitian}/updateData', [FormPenelitianDosenControllers::class, 'updateData']);
        Route::get('/form-penelitian-dosen/delete/{id_penelitian}', [FormPenelitianDosenControllers::class, 'delete']);

        // Untuk tampilan Pengabdian dosen
        Route::get('/form-pengabdian-dosen', [FormPengabdianDosenControllers::class, 'index']);
        Route::get('/form-pengabdian-dosen/create', [FormPengabdianDosenControllers::class, 'create']);
        Route::post('/form-pengabdian-dosen/createData', [FormPengabdianDosenControllers::class, 'createData']);
        Route::get('/form-pengabdian-dosen/update/{id_pengabdian}', [FormPengabdianDosenControllers::class, 'update']);
        Route::put('/form-pengabdian-dosen/{id_pengabdian}/updateData', [FormPengabdianDosenControllers::class, 'updateData']);
        Route::get('/form-pengabdian-dosen/delete/{id_pengabdian}', [FormPengabdianDosenControllers::class, 'delete']);

        // Untuk tampilan Publikasi dosen
        Route::get('/form-publikasi-dosen', [FormPublikasiDosenControllers::class, 'index']);
        Route::get('/form-publikasi-dosen/create', [FormPublikasiDosenControllers::class, 'create']);
        Route::post('/form-publikasi-dosen/createData', [FormPublikasiDosenControllers::class, 'createData']);
        Route::get('/form-publikasi-dosen/update/{id_publikasi}', [FormPublikasiDosenControllers::class, 'update']);
        Route::put('/form-publikasi-dosen/updateData/{id_publikasi}', [FormPublikasiDosenControllers::class, 'updateData']);
        Route::get('/form-publikasi-dosen/delete/{id_publikasi}', [FormPublikasiDosenControllers::class, 'delete']);

        // Untuk tampilan Seminar Dan Pelatihan dosen
        Route::get('/form-seminardanpelatihan-dosen', [FormSeminarDosenControllers::class, 'index']);
        Route::get('/form-seminardanpelatihan-dosen/create', [FormSeminarDosenControllers::class, 'create']);
        Route::post('/form-seminardanpelatihan-dosen/createData', [FormSeminarDosenControllers::class, 'createData']);
        Route::get('/form-seminardanpelatihan-dosen/update/{id_seminardanpelatihan}', [FormSeminarDosenControllers::class, 'update']);
        Route::put('/form-seminardanpelatihan-dosen/updateData/{id_seminardanpelatihan}', [FormSeminarDosenControllers::class, 'updateData']);
        Route::get('/form-seminardanpelatihan-dosen/delete/{id_seminardanpelatihan}', [FormSeminarDosenControllers::class, 'delete']);

        // Untuk tampilan Kompetensi dosen
        Route::get('/form-kompetensi-dosen', [FormKompetensiDosenControllers::class, 'index']);
        Route::get('/form-kompetensi-dosen/create', [FormKompetensiDosenControllers::class, 'create']);
        Route::post('/form-kompetensi-dosen/createData', [FormKompetensiDosenControllers::class, 'createData']);
        Route::get('/form-kompetensi-dosen/update/{id_kompetensi}', [FormKompetensiDosenControllers::class, 'update']);
        Route::put('/form-kompetensi-dosen/updateData/{id_kompetensi}', [FormKompetensiDosenControllers::class, 'updateData']);
        Route::get('/form-kompetensi-dosen/delete/{id_kompetensi}', [FormKompetensiDosenControllers::class, 'delete']);
        
        // Untuk tampilan pembicara dosen
        Route::get('/form-pembicara-dosen', [FormPembicaraControllers::class, 'index']);
        Route::get('/form-pembicara-dosen/create', [FormPembicaraControllers::class, 'create']);
        Route::post('/form-pembicara-dosen/createData', [FormPembicaraControllers::class, 'createData']);
        Route::get('/form-pembicara-dosen/update/{id_pembicara}', [FormPembicaraControllers::class, 'update']);
        Route::put('/form-pembicara-dosen/updateData/{id_pembicara}', [FormPembicaraControllers::class, 'updateData']);
        Route::get('/form-pembicara-dosen/delete/{id_pembicara}', [FormPembicaraControllers::class, 'delete']);


        Route::get('/unduh-cv', [DownloadControllers::class, 'index']);
        Route::post('/unduh-cv/download', [DownloadControllers::class, 'downloadPDF']);
        Route::get('/download', [DownloadControllers::class, 'download'])->name('download');


        Route::get('/logout', [LoginControllers::class, 'logout']);
    });
// Tampilan Untuk Direksi
    Route::middleware('check.user:3')->group(function () {
        /**
         * Untuk Tampilan Direksi
         */
        Route::get('/profile-direksi', [ProfileDireksiControllers::class, 'index']);
        Route::get('/update-user-direksi/{id}', [ProfileDireksiControllers::class, 'updateuser']);
        Route::put('/update-akun-direksi/{id}/updateuserData', [ProfileDireksiControllers::class, 'updateuserData']);

        // Untuk Tampilan data dosen
        Route::get('/data-dosen-direksi', [DataDosenDireksiControllers::class, 'index']);
        Route::get('/search-dosen-direksi', [DataDosenDireksiControllers::class, 'search'])->name('search-dosen-direksi');
        Route::get('/download-excel-direksi/{id}', [DataDosenDireksiControllers::class, 'check']);
        Route::post('/download-excel-direksi/download', [DataDosenDireksiControllers::class, 'downloadCsv'])->name('downloadCsv');
        Route::get('/download-cv-direksi/{id}', [DataDosenDireksiControllers::class, 'checkCV']);
        Route::post('/download-cv-direksi/downloadPDF', [DataDosenDireksiControllers::class, 'downloadPDF'])->name('downloadCsv');
     
        Route::get('/logout', [LoginControllers::class, 'logout']);
    });

});

/**
 * Route Untuk Super Admin
 */

Route::get('/daftar-role', [DaftarRoleControllers::class, 'index']);
Route::get('/daftar-role/create', [DaftarRoleControllers::class, 'create']);
Route::post('/daftar-role/createData', [DaftarRoleControllers::class, 'createData']);

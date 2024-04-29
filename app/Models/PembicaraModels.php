<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembicaraModels extends Model
{
    use HasFactory;
    protected $table = "tb_pembicara";
    protected $primaryKey = "id_pembicara";

    protected $guarded = [];
    protected $casts = [
        'tanggal_kegiatan'=>'date',
    ];

    protected $fillable = [
        'id_pembicara',
        'judul_materi',
        'lokasi_kegiatan',
        'penyelenggara_kegiatan',
        'tanggal_kegiatan',
        'ruang_lingkup',
    ];
}

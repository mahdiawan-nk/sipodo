<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengabdianModels extends Model
{
    use HasFactory;
    protected $table = "tb_pengabdian";
    protected $primaryKey = "id_pengabdian";

    protected $guarded = [];

    protected $casts = [
        'tahun_kegiatan'=>'date',
    ];
}

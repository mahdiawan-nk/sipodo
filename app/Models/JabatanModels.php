<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanModels extends Model
{
    use HasFactory;
    protected $table = "tb_jabatan";
    protected $primaryKey = "id_jabatan";

    protected $guarded = [];
    protected $casts = [
        'tahun_mulai' => 'date',
        'tahun_selesai' => 'date',
    ];

    protected $dateFormat= 'Y-m-d';
}

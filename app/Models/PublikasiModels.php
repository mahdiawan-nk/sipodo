<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublikasiModels extends Model
{
    use HasFactory;
    protected $table = "tb_publikasi";
    protected $primaryKey = "id_publikasi";

    protected $guarded = [];

    protected $casts = [
        'tahun_publikasi' => 'date',
    ];
}

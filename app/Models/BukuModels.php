<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModels extends Model
{
    use HasFactory;
    protected $table = "tb_buku";
    protected $primaryKey = "id_buku";

    protected $guarded = [];
    protected $casts = [
        'tahun_terbit' => 'date'
    ];
}

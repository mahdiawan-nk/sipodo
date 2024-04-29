<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminardanPelatihanModels extends Model
{
    use HasFactory;
    protected $table = "tb_seminardanpelatihan";
    protected $primaryKey = "id_seminardanpelatihan";
    protected $guarded = [];
    protected $casts = [
        'tanggal_seminardanpelatihan' => 'date'
    ];
}

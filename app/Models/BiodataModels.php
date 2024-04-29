<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataModels extends Model
{
    use HasFactory;
    protected $table = "tb_biodata";
    protected $primaryKey = "id_biodata";

    protected $guarded = [];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}

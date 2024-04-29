<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanModels extends Model
{
    use HasFactory;
    protected $table = "tb_pendidikan";
    protected $primaryKey = "id_pendidikan";

    protected $guarded = [];
    protected $casts = [
        'tanggal_kelulusan' => 'date',
    ];
}

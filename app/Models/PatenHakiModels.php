<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatenHakiModels extends Model
{
    use HasFactory;
    protected $table = "tb_patendanhaki";
    protected $primaryKey = "id_patendanhaki";

    protected $guarded = [];
    protected $casts = [
        'tanggal_terima' => 'date',
    ];
}

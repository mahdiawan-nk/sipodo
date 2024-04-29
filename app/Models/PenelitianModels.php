<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenelitianModels extends Model
{
    use HasFactory;
    protected $table = "tb_penelitian";
    protected $primaryKey = "id_penelitian";

    protected $guarded = [];
    protected $casts = [
        'tahun_penelitian' => 'date:Y-m-d',
    ];

}

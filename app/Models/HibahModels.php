<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HibahModels extends Model
{
    use HasFactory;
    protected $table = "tb_hibah";
    protected $primaryKey = "id_hibah";

    protected $guarded = [];
    protected $casts = [
        'tanggal_hibah' => 'date',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdiModels extends Model
{
    use HasFactory;

    protected $table = ('tb_prodi');
    protected $primaryKey = "id_prodi";
    protected $guard = [];

    protected $fillable = [
        'id_prodi',
        'prodi',
    ];
}

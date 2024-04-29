<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MengajarModels extends Model
{
    use HasFactory;
    protected $table = "tb_mengajar";
    protected $primaryKey = "id_mengajar";

    protected $guarded = [];
}

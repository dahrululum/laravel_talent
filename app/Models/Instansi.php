<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'instansi';
    protected $fillable = [
        'id',
        'id_induk',
        'nama',
        'singkatan',
        
    ];
}

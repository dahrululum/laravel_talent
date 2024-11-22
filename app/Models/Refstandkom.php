<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refstandkom extends Model
{
    use HasFactory;
    protected $table = 'cat_ref_pk';
    protected $connection = 'mysql3';
    protected $fillable = [
        'id',
        'no_komp',
        'nama_kompetensi',
        'desk_kompetensi',
        'ket',
          
    ];
}

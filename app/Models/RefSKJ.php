<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSKJ extends Model
{
    use HasFactory;
    protected $table = 'cat_ref_kompetensi';
    protected $connection = 'mysql3';
    protected $fillable = [
        'id',
        'no_komp',
        'nama_kompetensi',
        'desk_kompetensi',
        'level',
        'desk_level',
        'no_indikator',
        'desk_indikator',
        'ket',
        
          
    ];
}

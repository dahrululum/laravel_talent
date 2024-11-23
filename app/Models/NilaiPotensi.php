<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiPotensi extends Model
{
   use HasFactory;
    use SoftDeletes;
    protected $table = 'nilai_potensi';
    protected $fillable = [
        'nip',
        'nama',
        'jenjang_inovasi',
        'nilai_inovasi',
        'jenjang_prestasi',
        'nilai_prestasi',
       
        
    ];
}

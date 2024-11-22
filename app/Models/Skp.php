<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skp extends Model
{
    use HasFactory;
    protected $table = 'cat_nilai_skp';
    protected $connection = 'mysql3';
    protected $fillable = [
        'nip',
        'nama',
        'nilai_skp',
        'status',
 
         
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navpeg extends Model
{
    use HasFactory;
    protected $table = 'cat_navigasi';
    protected $connection = 'mysql3';
    protected $fillable = [
        
        'id',
        'alias',
        'nama_navigasi',
        'status',
        'ket',


    ];
}

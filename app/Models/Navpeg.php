<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Navpeg extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cat_navigasi';
    protected $connection = 'mysql3';
    protected $fillable = [
        
        'id',
        'nourut',
        'alias',
        'nama_navigasi',
        'status',
        'ket',


    ];
}

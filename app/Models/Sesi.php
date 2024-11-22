<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;
    protected $table = 'cat_sesi';
    protected $connection = 'mysql3';
    protected $fillable = [
        
        'id',
        'token',
        'jenispeserta',
        'tipesesi',
        'namasesi',
        'ket',
        'periode',
        'penyelenggara',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',


    ];
}

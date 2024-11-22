<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reflevelkom extends Model
{
    
    use HasFactory;
    protected $table = 'cat_standar_kompetensi';
    protected $connection = 'mysql3';
    protected $fillable = [
        'id',
        'leveljab',
        'namalevel',
        
          
    ];
}

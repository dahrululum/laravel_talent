<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecerdasan extends Model
{
    use HasFactory;
    protected $table = 'cat_output_kecerdasan';
    protected $connection = 'mysql3';
    protected $fillable = [
        'nip',
        'nama',
        'skor',
        'predikat',
        'status',
 
         
    ];
    public function detSesi()
    {
        return $this->hasOne(Sesi::class,'token','idtoken')->withDefault();
     
    }
}

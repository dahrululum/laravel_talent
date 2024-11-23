<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jpm extends Model
{
    use HasFactory;
    protected $table = 'cat_output_jpm';
    protected $connection = 'mysql3';
    protected $fillable = [
        'nip',
        'nama',
        'jpm',
        'kategori',
        'status',
 
         
    ];
    public function detSesi()
    {
        return $this->hasOne(Sesi::class,'token','idtoken')->withDefault();
     
    }
}

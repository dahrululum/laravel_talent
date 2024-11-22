<?php

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nipotinpres extends Model
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

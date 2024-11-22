<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaku extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pelaku_ekraf';
    protected $fillable = [
        'id',
        'id_daerah',
        'nik',
        'nama_usaha',
        'username',
        'password',
        'nama_pemilik',
        'email',
        'notelp',
        'jenkel',
        'tempatlahir',
        'tgllahir',
        'agama',
        'pekerjaan',
        'alamat',
        'nort',
        'norw',
        'dusun',
        'nokec',
        'namakec',
        'nokel',
        'namakel',
        'foto',
        
        
        
        
    ];
}
 

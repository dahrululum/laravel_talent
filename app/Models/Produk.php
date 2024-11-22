<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'produk_ekraf';
    protected $fillable = [
        'id',
        'alias',
        'id_pelaku',
        'id_daerah',
        'id_sektor',
        'nama_produk',
        'deskripsi',
        'foto',
        'harga',
        'status',
        
        
        
        
    ];
}

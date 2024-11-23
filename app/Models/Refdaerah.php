<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refdaerah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ref_daerah';
    protected $fillable = [
        'id',
        'kode',
        'namadaerah',
        'status',
        
        
        
        
    ];
}

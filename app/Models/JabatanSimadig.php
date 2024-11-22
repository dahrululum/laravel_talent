<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanSimadig extends Model
{
    use HasFactory;
    protected $table = 'tbljabatan';
    protected $connection = 'mysql2';
    protected $fillable = [
        'Comment_ID',
        'News_ID',
        'Unit_Krj',
        'Nama_Jbtan',
        'Eselon',
        'Mulai',
        'created_at',
        'updated_at',
        'deleted_at',
         
    ];
}

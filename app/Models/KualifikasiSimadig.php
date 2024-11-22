<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualifikasiSimadig extends Model
{
    use HasFactory;
    protected $table = 'tblnews_pendidikan_terakhir';
    protected $connection = 'mysql2';
   
}
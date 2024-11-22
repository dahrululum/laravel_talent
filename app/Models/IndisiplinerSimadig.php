<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndisiplinerSimadig extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tblhukuman';
    protected $connection = 'mysql2';
   
}
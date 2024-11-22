<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DiklatStrukturalSimadig extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbldiklat';
    protected $connection = 'mysql2';
   
}
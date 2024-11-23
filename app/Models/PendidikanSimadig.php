<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanSimadig extends Model
{
     use HasFactory;
    protected $table = 'tblpend';
    protected $connection = 'mysql2';
}

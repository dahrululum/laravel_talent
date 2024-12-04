<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'id_instansi',
        'nama_instansi',
        'nip',
    ];
    public function hasInsta()
    {
        return $this->hasOne(Instansi::class,'id','id_instansi')->withDefault();
    }
    public function getSKPD()
    {
        return $this->hasOne(Instansi::class,'id','id_instansi')->withDefault();
    }
}

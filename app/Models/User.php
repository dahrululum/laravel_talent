<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user_asn';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama','username','nip','nik','email','jabatan','gol','tempatlahir','tgllahir','nohp','unitkerja','jenis_jabatan','id_instansi','id_user_role','status_aktif','id_unit', 'password'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function detPeg()
    {
        return $this->hasOne(PegawaiSimadig::class,'NIPBR','nip')->withDefault();
    }
    public function detSkp()
    {
        return $this->hasOne(Skp::class,'nip','nip')->withDefault();
    }
    public function detJpm()
    {
        return $this->hasOne(Jpm::class,'nip','nip')->orderby('tglinput','desc');
    }
    public function detSkpSimadig()
    {
        return $this->hasOne(SkpSimadig::class,'nip','nip')->withDefault();
     
    }
}

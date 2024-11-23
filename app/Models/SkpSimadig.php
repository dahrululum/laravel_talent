<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpSimadig extends Model
{
    use HasFactory;
    protected $table = 'tblskp_baru';
    protected $connection = 'mysql2';
    protected $fillable = [
        'nip',
        'nama',
        'tahun',
        'nama_pejabat_penilai',
        'nip_pejabat_penilai',
        'nama_atasan_pejabat_penilai',
        'nip_atasan_pejabat_penilai',
        'nilai_skp_periode_1',
        'orientasi_pelayanan_periode_1',
        'integritas_periode_1',
        'komitmen_periode_1',
        'disiplin_periode_1',
        'kerjasama_periode_1',
        'kepemimpinan_periode_1',
        'nilai_skp_periode_2',
        'integrasi_nilai_periode_2',
        'orientasi_pelayanan_periode_2',
        'integritas_periode_2',
        'komitmen_periode_2',
        'disiplin_periode_2',
        'kerjasama_periode_2',
        'kepemimpinan_periode_2',
        'total_nilai_integritas_periode_1',
        'total_nilai_integritas_periode_2',
        'total_nilai_integrasi',
        'status_penilai',
        'status_atasan_penilai',
        'status_asn_dinilai',
 
         
    ];
}
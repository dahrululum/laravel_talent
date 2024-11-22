<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpSimadigBkn extends Model
{
    use HasFactory;
    protected $table = 'tbl_skp2022_bkn';
    protected $connection = 'mysql2';
    protected $fillable = [
        'id_skp_bkn',
        'id_pegawai',
        'hasilKinerja',
        'hasilKinerjaNilai',
        'kuadranKinerja',
        'KuadranKinerjaNilai',
        'namaPenilai',
        'nipNrpPenilai',
        'penilaiGolonganId',
        'penilaiJabatanNm',
        'penilaiUnorNm',
        'perilakuKerja',
        'PerilakuKerjaNilai',
        'pnsDinilaiId',
        'statusPenilai',
        'tahun',
     
         
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKompetensi extends Model
{
    use HasFactory;
    protected $table = 'data_kompetensi_jpm';
    protected $fillable = [
        'nip',
        'nama',
        
        'jabatan',
        'jenis_jabatan',
        'id_jenis_jabatan',
        'id_instansi',
        'nama_instansi',
        'nilai_integritas',
        'nilai_kerjasama',
        'nilai_komunikasi',
        'nilai_pelayanan',
        'nilai_pengembangan',
        'nilai_orientasi',
        'nilai_perubahan',
        'nilai_keputusan',
        'nilai_perekat',
        'skor',
        'jpm',
        'levelskj',
        'standarskj',
        'nilai_mutu',
        'kategori',
        'tglinput',
        'inputby',
        
        
        
    ];

    public static function kat1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->where('kategori','Memenuhi Syarat');
        //    dd($query);
        return $query;
    }
    public static function kat2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
               
        }
        $query ->where('kategori','Masih Memenuhi Syarat');
        //    dd($query);
        return $query;
    }
    public static function kat3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->where('kategori','Kurang Memenuhi Syarat');
        //    dd($query);
        return $query;
    }
    public static function katnull($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereNull('kategori');
        //    dd($query);
        return $query;
    }
    public static function integritas1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_integritas','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function integritas2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_integritas','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function integritas3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_integritas','>','levelskj');
        //    dd($query);
        return $query;
    }
    public static function kerjasama1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_kerjasama','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function kerjasama2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_kerjasama','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function kerjasama3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_kerjasama','>','levelskj');
        //    dd($query);
        return $query;
    }
    public static function komunikasi1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_komunikasi','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function komunikasi2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_komunikasi','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function komunikasi3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_komunikasi','>','levelskj');
        //    dd($query);
        return $query;
    }
    public static function orientasi1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_orientasi','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function orientasi2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_orientasi','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function orientasi3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_orientasi','>','levelskj');
        //    dd($query);
        return $query;
    }
    public static function pelayanan1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_pelayanan','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function pelayanan2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_pelayanan','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function pelayanan3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_pelayanan','>','levelskj');
        //    dd($query);
        return $query;
    }
    public static function pengembangan1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_pengembangan','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function pengembangan2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_pengembangan','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function pengembangan3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_pengembangan','>','levelskj');
        //    dd($query);
        return $query;
    }
    public static function perubahan1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_perubahan','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function perubahan2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_perubahan','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function perubahan3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_perubahan','>','levelskj');
        //    dd($query);
        return $query;
    }
    public static function keputusan1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_keputusan','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function keputusan2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_keputusan','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function keputusan3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_keputusan','>','levelskj');
        //    dd($query);
        return $query;
    }
    public static function perekat1($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_perekat','<','levelskj');
        //    dd($query);
        return $query;
    }
    public static function perekat2($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_perekat','=','levelskj');
        //    dd($query);
        return $query;
    }
    public static function perekat3($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
            $query->where('id_instansi', '=', $params['idpd']);
                
        }
        $query->whereColumn('nilai_perekat','>','levelskj');
        //    dd($query);
        return $query;
    }
    
     
}

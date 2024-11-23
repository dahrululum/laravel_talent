<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiSimadig extends Model
{
    use HasFactory;
    protected $table = 'tblnews';
    protected $connection = 'mysql2';
    protected $fillable = [
        'News_ID',
        'NAMA',
        'NIP_GABUNG',
        'Jenis_Klamin',

        'Agama',
        'created_at',
        'updated_at',
        'deleted_at',
         
    ];
    public function getJab()
    {
        return $this->hasOne(JabatanSimadig::class, 'News_ID', 'News_ID')->where('Mulai','<>','')->orderby('Comment_ID','desc');
    }
    public function getSKP()
    {
        return $this->hasOne(SkpSimadigBkn::class, 'id_pegawai', 'News_ID')->withDefault();
    }
    public function getKualifikasi()
    {
        return $this->hasOne(KualifikasiSimadig::class, 'News_ID', 'News_ID')->withDefault();
    }
    
    public function getDiklatStruktural()
    {
       
        return $this->hasMany(DiklatStrukturalSimadig::class, 'News_ID', 'News_ID');
    }
    public function getDiklatFungsional()
    {
       
        return $this->hasMany(DiklatFungsionalSimadig::class, 'News_ID', 'News_ID');
                
    }
    public function getDiklatTeknis()
    {
        return $this->hasMany(DiklatTeknisSimadig::class, 'News_ID', 'News_ID');
    }
    public function getIndispliner()
    {
        return $this->hasMany(IndisiplinerSimadig::class, 'News_ID', 'News_ID')->where('Kasus','<>','');
    }
    //getData Simadig
    //13 nov 2023
    public function getRiwayatPendidikan()
    {
       return $this->hasMany(PendidikanSimadig::class, 'News_ID', 'News_ID');
    }
    public function getRiwayatJabatan()
    {
       return $this->hasMany(JabatanSimadig::class, 'News_ID', 'News_ID');
    }
    public function getRiwayatDF()
    {
       return $this->hasMany(DiklatFungsionalSimadig::class, 'News_ID', 'News_ID');
    }
    public function getRiwayatDT()
    {
       return $this->hasMany(DiklatTeknisSimadig::class, 'News_ID', 'News_ID');
    }
    public function getRiwayatSertifikasi()
    {
       return $this->hasMany(SertifikatKompetensiSimadig::class, 'News_ID', 'News_ID');
    }

    //suksesor
    public function cariJabatan()
    {
       
        if(!empty($_GET['key'])){
            $key=$_GET["key"];
            return $this->hasMany(JabatanSimadig::class, 'News_ID', 'News_ID')->where('Nama_Jbtan','like','%' . $key . '%');
        }else{
            $key="";
            return $this->hasMany(JabatanSimadig::class, 'News_ID', 'News_ID')->where('Nama_Jbtan','=','null');
        }
       
     
    }
    public function cariKualifikasi()
    {
        if(!empty($_GET['key'])){
            $key=$_GET["key"];
            return $this->hasMany(KualifikasiSimadig::class, 'News_ID', 'News_ID')->where('Jurusan_Terakhir','like','%' . $key . '%');
        }else{
            $key="";
            return $this->hasMany(KualifikasiSimadig::class, 'News_ID', 'News_ID')->where('Jurusan_Terakhir','=','null');
        }
        
     
    }
    public function cariDiklatTeknis()
    {
        if(!empty($_GET['key'])){
            $key=$_GET["key"];
            return $this->hasMany(DiklatTeknisSimadig::class, 'News_ID', 'News_ID')->where('Nama_Kur','like','%' . $key . '%');
        }else{
            $key="";
            return $this->hasMany(DiklatTeknisSimadig::class, 'News_ID', 'News_ID')->where('Nama_Kur','=','null');
        }
        
     
    }
    public function cariDiklatFungsional()
    {
        if(!empty($_GET['key'])){
            $key=$_GET["key"];
            return $this->hasMany(DiklatFungsionalSimadig::class, 'News_ID', 'News_ID')->where('Nama_Kur','like','%' . $key . '%');
        }else{
            $key="";
            return $this->hasMany(DiklatFungsionalSimadig::class, 'News_ID', 'News_ID')->where('Nama_Kur','=','null');
        }
       
     
    }
    public function cariSertifikatKomp()
    {
        if(!empty($_GET['key'])){
            $key=$_GET["key"];
            return $this->hasMany(SertifikatKompetensiSimadig::class, 'News_ID', 'News_ID')->where('Nama_Kur','like','%' . $key . '%');
        }else{
            $key="";
            return $this->hasMany(SertifikatKompetensiSimadig::class, 'News_ID', 'News_ID')->where('Nama_Kur','=','null');
        }
        
     
    }
    // public function cariKualifikasi()
    // {
    //     $key=$_GET["key"];
    //     return $this->hasMany(DiklatFungsionalSimadig::class, 'News_ID', 'News_ID')->where('Nama_Kur','like','%' . $key . '%');
    //     //return $this->hasMany(DiklatFungsionalSimadig::class, 'News_ID', 'News_ID')->where('Nama_Kur','like','%pertanian%');
    //     //return $this->hasMany(DiklatFungsionalSimadig::class, 'News_ID', 'News_ID');
    //     // $query = parent::query();
    //     // if (@$params['idpd'] != null) {
    //     //         $query->where('id_instansi', '=', $params['idpd'])->where('nilai_tb',$box)->where('id_jenis_jabatan',1);
    //     // }
        
    //     // $query->where('nilai_tb',$box)->where('id_jenis_jabatan',1);
    //     // return $query;

    // }
}

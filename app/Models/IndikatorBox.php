<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Http;

class IndikatorBox extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'indikator_box';
    protected $fillable = [
        'id_instansi',
        'nama_instansi',
        'nip',
        'nama',
        'id_jabatan',
        'jabatan',
        'id_jenis_jabatan',
        'jenis_jabatan',
        'eselon',
        'nilai_skp',
        'nilai_inovasi',
        'nilai_prestasi',
        'nilai_indisipliner',
        'nilai_kompetensi',
        'nilai_kualifikasi',
        'nilai_riwayat_jabatan',
        'nilai_riwayat_diklat',
        'nilai_kecerdasan',
        'nilai_x',
        'nilai_y',
        'nilai_tb',
        'uraian_tb',
        'ket',
        
        
    ];

    public function pegawaina()
    {
        return $this->belongsTo(PegawaiSimadig::class,'NIPBR','nip');
    }

    public function detPeg()
    {
        return $this->hasOne(PegawaiSimadig::class,'NIPBR','nip')->withDefault();
     
    }
    public function getJPM()
    {
        return $this->hasOne(Jpm::class, 'nip', 'nip')->orderBy('tglinput','desc')->withDefault();
    }
    public function getCerdas()
    {
        return $this->hasOne(Kecerdasan::class, 'nip', 'nip')->orderBy('tglinput','desc')->withDefault();
    }
    public function getKompetensi()
    {
        return $this->hasOne(DataKompetensi::class, 'nip', 'nip')->orderBy('tglinput','desc')->withDefault();
    }

    public static function query($params = [])
    {
        $query = parent::query();

        if (@$params['nama'] != null) {
            
                $query->where('nama', 'like', '%' . $params['nama'] . '%');
           
        }

        if (@$params['nip'] != null) {
             
                $query->where('nip', '=', $params['nip']);
             
        }
        if (@$params['idpd'] != null) {
             
                $query->where('id_instansi', '=', $params['idpd']);
             
        }
        if (@$params['id_jenjab'] != null) {
             
                $query->where('id_jenis_jabatan', '=', $params['id_jenjab']);
             
        }
        if (@$params['id_box'] != null) {
             
                $query->where('nilai_tb', '=', $params['id_box']);
             
        }

       

        
        $query->orderby('nilai_tb','desc');
        

        return $query;
    }
    public static function queryinsta($params = [])
    {
        $query = parent::query();
        if (@$params['nama'] != null) {
            
                $query->where('nama', 'like', '%' . $params['nama'] . '%');
           
        }

        if (@$params['nip'] != null) {
             
                $query->where('nip', '=', $params['nip']);
             
        }
        
        if (@$params['idpd'] != null) {
                $query->where('id_instansi', '=', $params['idpd']);
        }
       
        $query->orderby('nilai_tb','desc');
        

        return $query;
    }
    public static function countque($params = [])
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
                $query->where('id_instansi', '=', $params['idpd'])->where('nilai_tb',1);
        }
        if (@$params['id_jenjab'] != null) {
                $query->where('id_jenis_jabatan', '=', $params['id_jenjab'])->where('nilai_tb',1);
        }
        $query->orderby('nilai_tb','desc');
        return $query;
    }
    //per box
    public static function boxque($params = [],$box)
    {
        $query = parent::query();
        if (@$params['idpd'] != null) {
                $query->where('id_instansi', '=', $params['idpd'])->where('nilai_tb',$box);
        }
        if (@$params['id_jenjab'] != null) {
                $query->where('id_jenis_jabatan', '=', $params['id_jenjab'])->where('nilai_tb',$box);
        }
        $query->where('nilai_tb',$box)->orderby('nilai_tb','desc');
        return $query;
    }

    //box1
    public static function jpt($params = [], $box)
    {
       // dd(isset($params['idpd']));
        $query = parent::query();
        

        if (isset($params['idpd'] )) {
        //if (@$params['idpd'] != null) {
                $query->where('id_instansi', '=', $params['idpd'])->where('nilai_tb',$box)->where('id_jenis_jabatan',1);
        }
        
        $query->where('nilai_tb',$box)->where('id_jenis_jabatan',1);
        return $query;
    }
    public static function jadm($params = [], $box)
    {
        $query = parent::query();
        if (isset($params['idpd'] )) {
        //if (@$params['idpd'] != null) {
                $query->where('id_instansi', '=', $params['idpd'])->where('nilai_tb',$box)->where('id_jenis_jabatan',2);
        }
        
        $query->where('nilai_tb',$box)->where('id_jenis_jabatan',2);
        return $query;
    }
    public static function jpws($params = [], $box)
    {
        $query = parent::query();
        if (isset($params['idpd'] )) {
        //if (@$params['idpd'] != null) {
                $query->where('id_instansi', '=', $params['idpd'])->where('nilai_tb',$box)->where('id_jenis_jabatan',3);
        }
        
        $query->where('nilai_tb',$box)->where('id_jenis_jabatan',3);
        return $query;
    }
    public static function jpel($params = [], $box)
    {
        $query = parent::query();
        if (isset($params['idpd'] )) {
        //if (@$params['idpd'] != null) {
                $query->where('id_instansi', '=', $params['idpd'])->where('nilai_tb',$box)->where('id_jenis_jabatan',4);
        }
        
        $query->where('nilai_tb',$box)->where('id_jenis_jabatan',4);
        return $query;
    }
    public static function jfung($params = [], $box)
    {
        $query = parent::query();
        if (isset($params['idpd'] )) {
        //if (@$params['idpd'] != null) {
                $query->where('id_instansi', '=', $params['idpd'])->where('nilai_tb',$box)->where('id_jenis_jabatan',5);
        }
        
        $query->where('nilai_tb',$box)->where('id_jenis_jabatan',5);
        return $query;
    }
    //pencarian
    public static function search($params = [])
    {
        $query = parent::query();
         
        if (@$params['box9'] == "on") {
                $query->where('nilai_tb', '=', 9);
        }
        if (@$params['box8'] == "on") {
                $query->orwhere('nilai_tb', '=', 8);
        }
        if (@$params['box7']  == "on") {
                $query->orwhere('nilai_tb', '=', 7);
        }
       
       

        
        $query->orderby('nilai_tb','desc');
        

        return $query;
    }

    // public static function getDataFromApi($nip,$key)
    // {
    //     $response = Http::get('https://satamasn.babelprov.go.id/simadig/api/primadona/pegawai/'.$nip);

    //     if ($response->successful()) {
    //             $res = $response->json();
    //             $riwpend = $res["riwayat_pendidikan_umum"];
    //             $collection = collect($riwpend);
    //            // $colna = $collection->flatten();
    //             //$rscol = $colna->search('manajemen');
    //             $filtered = $collection->whereIn('jurusan',$key);
 
    //             //$filtered->all();

    //             //$hasilcari= array_search('manajemen', array_column($riwpend, 'jurusan'));
    //         //return $response->json();
    //         return $collection;
    //         //return $filtered->all();
    //     }

    //     // Handle errors if needed
    //     return [];
    // }
    // public static function getApiJabatan($nip)
    // {
    //     //$response = Http::get('https://satamasn.babelprov.go.id/simadig/api/primadona/pegawai/'.$nip);
    //     $response = Http::get('http://localhost/laravel_simadig/simadig-laravel/public/api/primadona/pegawai/'.$nip);

    //     if ($response->successful()) {
    //             $res = $response->json();
    //             $riwjab = $res["riwayat_jabatan"];
    //             $collection = collect($riwjab);
            
    //         return $collection;
            
    //     }

    //     // Handle errors if needed
    //     return [];
    // }
    // public static function getApiPendidikan($nip)
    // {
    //     //$response = Http::get('https://satamasn.babelprov.go.id/simadig/api/primadona/pegawai/'.$nip);
    //     $response = Http::get('http://localhost/laravel_simadig/simadig-laravel/public/api/primadona/pegawai/'.$nip);

    //     if ($response->successful()) {
    //             $res = $response->json();
    //             $riwpen = $res["riwayat_pendidikan_umum"];
    //             $collection = collect($riwpen);
               
    //         return $collection;
            
    //     }

    //     // Handle errors if needed
    //     return [];
    // }
    // public static function getApiDiklatTeknis($nip)
    // {
    //     //$response = Http::get('https://satamasn.babelprov.go.id/simadig/api/primadona/pegawai/'.$nip);
    //     $response = Http::get('http://localhost/laravel_simadig/simadig-laravel/public/api/primadona/pegawai/'.$nip);

    //     if ($response->successful()) {
    //             $res = $response->json();
    //             $riwdt = $res["riwayat_diklat_teknis"];
    //             $collection = collect($riwdt);
               
    //         return $collection;
            
    //     }

    //     // Handle errors if needed
    //     return [];
    // }
    // public static function getApiDiklatFungsional($nip)
    // {
    //     //$response = Http::get('https://satamasn.babelprov.go.id/simadig/api/primadona/pegawai/'.$nip);
    //     $response = Http::get('http://localhost/laravel_simadig/simadig-laravel/public/api/primadona/pegawai/'.$nip);

    //     if ($response->successful()) {
    //             $res = $response->json();
    //             $riwdf = $res["riwayat_diklat_fungsional"];
    //             $collection = collect($riwdf);
               
    //         return $collection;
            
    //     }

    //     // Handle errors if needed
    //     return [];
    // }
    // public static function getApiSertifikat($nip)
    // {
    //     $response = Http::get('http://localhost/laravel_simadig/simadig-laravel/public/api/primadona/pegawai/'.$nip);

    //     if ($response->successful()) {
    //             $res = $response->json();
    //             $riwsert = $res["riwayat_sertifikasi"];
    //             $collection = collect($riwsert);
               
    //         return $collection;
            
    //     }

    //     // Handle errors if needed
    //     return [];
    // }
    // public static function getAllApiSimadig($nip,$jenis)
    // {
    //    // $response = Http::get('http://localhost/laravel_simadig/simadig-laravel/public/api/primadona/pegawai/'.$nip);
    //    $link="http://localhost/laravel_simadig/simadig-laravel/public/api/primadona/pegawai/$nip";
    //    $response = Http::get($link,
    //     array(
    //         'Accept'=>'application/json',
    //         'Accept-Charset'=>'utf-8',
    //         "Connection"=> "keep-alive",
    //     ),array('timeout'=>0));

    //     if ($response->successful()) {
    //         $res = $response->json();
    //         if($jenis=="pendidikan"){
               
    //             $riwpen = $res["riwayat_pendidikan_umum"];
    //             $collection = collect($riwpen);
    //         }
    //         if($jenis=="jabatan"){
               
    //             $riwjab = $res["riwayat_jabatan"];
    //             $collection = collect($riwjab);
    //         }
    //         if($jenis=="pelatihan"){
               
    //             $riwdt = $res["riwayat_diklat_teknis"];
    //             $riwdf = $res["riwayat_diklat_fungsional"];

    //             $coldt = collect($riwdt);
    //             $coldf = collect($riwdf);
                
    //             $collection = $coldt."".$coldf;


    //         }
    //         if($jenis=="sertifikasi"){
               
    //             $riwsert = $res["riwayat_sertifikasi"];
    //             $collection = collect($riwsert);
    //         }
                
               
    //         return $collection;
            
    //     }

    //     // Handle errors if needed
    //     return [];
    // }



}

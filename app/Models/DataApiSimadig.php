<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataApiSimadig extends Model
{
    use HasFactory;
    protected $table = 'data_api_simadig';
    protected $fillable = [
        'nip',
        'id_instansi',
        'id_jenis_jabatan',
        'id_jabatan',
        'data_talentabox',
        'data_api_pendidikan',
        'data_api_jabatan',
        'data_api_pelatihan',
        'data_api_diklat_fungsional',
        'data_api_diklat_teknis',
        'data_api_sertifikasi',
       
        
    ];

    public function detPeg()
    {
        return $this->hasOne(PegawaiSimadig::class,'NIPBR','nip')->withDefault();
     
    }
    public function detInd()
    {
        return $this->hasOne(IndikatorBox::class,'nip','nip')->withDefault();
     
    }
    public static function search($params = [])
    {
        $query = parent::query();
        $query->select('id','id_instansi','id_jenis_jabatan','nip','data_talentabox');
        if (@$params['key'] != null) {
            
            
            $query->where(function ($que){
                $key=$_GET['key'];
                $que->where('data_api_pendidikan', 'like', '%' . $key . '%')
                    ->orwhere('data_api_jabatan', 'like', '%' . $key . '%')
                    ->orwhere('data_api_pelatihan', 'like', '%' . $key . '%')
                    ->orwhere('data_api_sertifikasi', 'like', '%' . $key . '%');
            });
       
        }
        
        //tambah filter jenjab kek pd
        //17 des 2024
        if (@$params['idpd'] != null) {
            $query->where(function ($que){
                $idpd=$_GET['idpd'];
                $que->orwhere('id_instansi', '=',$idpd);
            });
                
            //dd($query);
        }
        if (@$params['id_jenjab'] != null) {
            $query->where(function ($que){
                $id_jenjab=$_GET['id_jenjab'];
                $que->orwhere('id_jenis_jabatan', '=', $id_jenjab);
            });
                
            
        }

        if (@$params['box9'] == "on" && @$params['box8'] == "" && @$params['box7'] == "") {
            $query->where(function ($que){
                $que->orwhere('data_talentabox', '=', 9);
                  
                });
        }
        elseif (@$params['box9'] == "on" && @$params['box8'] == "on"  && @$params['box7'] == "") {
            $query->where(function ($que){
                $que->orwhere('data_talentabox', '=', 9)
                    ->orwhere('data_talentabox', '=', 8);
                     
                });
        } 
        elseif (@$params['box9'] == "on" && @$params['box8'] == ""  && @$params['box7'] == "on") {
            $query->where(function ($que){
                $que->orwhere('data_talentabox', '=', 9)
                    ->orwhere('data_talentabox', '=', 7);
                     
                });
        } 
        elseif (@$params['box9'] == "on" && @$params['box8'] == "on"  && @$params['box7'] == "on") {
            $query->where(function ($que){
                $que->orwhere('data_talentabox', '=', 9)
                    ->orwhere('data_talentabox', '=', 8)
                    ->orwhere('data_talentabox', '=', 7);
                     
                });
        } 
        elseif (@$params['box9'] == "" && @$params['box8'] == "on"  && @$params['box7'] == "on") {
            $query->where(function ($que){
                $que->orwhere('data_talentabox', '=', 8)
                    ->orwhere('data_talentabox', '=', 7);
                     
                });
        } 
        elseif (@$params['box9'] == "" && @$params['box8'] == ""  && @$params['box7'] == "on") {
            $query->where(function ($que){
                $que->orwhere('data_talentabox', '=',7);
                    
                     
                });
        } 
        elseif (@$params['box9'] == "" && @$params['box8'] == "on"  && @$params['box7'] == "") {
            $query->where(function ($que){
                $que->orwhere('data_talentabox', '=',8);
                });
        } 
        
         
       
       

        
        $query->orderby('data_talentabox','desc');
       // $query->limit(10);
        //    dd($query);
        return $query;
    }
}

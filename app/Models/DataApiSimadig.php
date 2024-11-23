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
        if (@$params['key'] != null) {
            
            // $query->where('data_api_pendidikan', 'like', '%' . $params['key'] . '%')
            //     ->orwhere('data_api_jabatan', 'like', '%' . $params['key'] . '%')
            //     ->orwhere('data_api_pelatihan', 'like', '%' . $params['key'] . '%')
            //     ->orwhere('data_api_sertifikasi', 'like', '%' . $params['key'] . '%');
            $query->where(function ($que){
                $key=$_GET['key'];
                $que->where('data_api_pendidikan', 'like', '%' . $key . '%')
                    ->orwhere('data_api_jabatan', 'like', '%' . $key . '%')
                    ->orwhere('data_api_pelatihan', 'like', '%' . $key . '%')
                    ->orwhere('data_api_sertifikasi', 'like', '%' . $key . '%');
            });
       
        }
        // if (@$params['box9'] == "on" && @$params['box8'] == "on" && @$params['box7'] == "on") {
        //         //$query->where('data_talentabox', '=', 9);
        //         $query->where(function ($que){
        //         $que->where('data_talentabox', '=', 9)
        //             ->orwhere('data_talentabox', '=', 8)
        //             ->orwhere('data_talentabox', '=', 7);
        //         });
        // }
        //  if (@$params['box9'] == "on" && @$params['box8'] == "on") {
        //     $query->where(function ($que){
        //         $que->where('data_talentabox', '=', 9)
        //             ->orwhere('data_talentabox', '=', 8);
                     
        //         });
        // }
        // if (@$params['box9'] == "on" && @$params['box7'] == "on") {
        //     $query->where(function ($que){
        //         $que->where('data_talentabox', '=', 9)
        //             ->orwhere('data_talentabox', '=', 7);
                     
        //         });
        // }
        // if ((@$params['box8'] == "on" ) and (@$params['box7'] == "on")) {
        //     $query->where(function ($que){
        //         $que->where('data_talentabox', '=', 8)
        //             ->orwhere('data_talentabox', '=', 7);
                     
        //         });
        //         //dd($query);
        // }
        //  if (@$params['box9'] == "on" || @$params['box8'] == "on" || @$params['box7'] == "on") {
                 
        //         $query->where(function ($que){
        //             $box9=@$params['box9'];
        //             $box8=@$params['box8'];
        //             $box7=@$params['box7'];
        //             if(!empty($box9)){
        //                 $que->where('data_talentabox', '=', 9);
        //             } 
        //             if(!empty($box9) and !empty($box8)){
        //                 $que->where('data_talentabox', '=', 9)->orwhere('data_talentabox', '=', 8);
        //             }        
        //             if(!empty($box7)){
        //                 $que->where('data_talentabox', '=', 9)->orwhere('data_talentabox', '=', 8)->orwhere('data_talentabox', '=', 7);
        //             }        
                    
                    


        //         });
        // }

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

        // elseif (@$params['box8'] == "on") {
        //     $query->where(function ($que){
        //         $que->orwhere('data_talentabox', '=', 8);
                
                     
        //         });
        //         //dd($query);
        // }
        
        // elseif (@$params['box7'] == "on") {
        //     $query->where(function ($que){
        //         $que->orwhere('data_talentabox', '=', 7);
                  
                     
        //         });
        // }
         
        
        // if (@$params['box7']  == "on") {
        //         $query->orwhere('data_talentabox', '=', 7);
        // }
       
       

        
        $query->orderby('data_talentabox','desc');
        
        //    dd($query);
        return $query;
    }
}

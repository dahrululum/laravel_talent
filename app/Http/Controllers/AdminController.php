<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Collection;

use App\Models\Admin;
use App\Models\Refumum;

use App\Models\Sesi;
use App\Models\Navpeg;
use App\Models\NilaiPotensi;
use App\Models\IndikatorBox;
use App\Models\PegawaiSimadig;
use App\Models\DataApiSimadig;
use App\Models\DataKompetensi;

use App\Exports\NilaiPotensiExport;
use App\Imports\NilaiPotensiImport;

use App\Exports\NineBoxExport;
use App\Exports\RekapKompTalentaExport;


use App\Models\Produk;
use App\Models\Refdaerah;

use App\Models\Layanan;
use App\Models\Sektor;
Use App\Models\Instansi;
 

 

 

use File;
use Session;
use Carbon;
class AdminController extends Controller
{
    //
    public $layout = 'layouts.backend.main';
     
    public function index()
    {
        if(Auth::guard('admin')->check()){  
            $bio  = Auth::guard('admin')->user();
            $level=$bio->level;
            if($level==1){    
                //jml
                $insta = instansi::get();
                $box1 = IndikatorBox::where('nilai_tb',1)->count();
                $box2 = IndikatorBox::where('nilai_tb',2)->count();
                $box3 = IndikatorBox::where('nilai_tb',3)->count();
                $box4 = IndikatorBox::where('nilai_tb',4)->count();
                $box5 = IndikatorBox::where('nilai_tb',5)->count();
                $box6 = IndikatorBox::where('nilai_tb',6)->count();
                $box7 = IndikatorBox::where('nilai_tb',7)->count();
                $box8 = IndikatorBox::where('nilai_tb',8)->count();
                $box9 = IndikatorBox::where('nilai_tb',9)->count();

               $params="";
                 

                return view('admin.dashboard',[
                'layout'        => $this->layout,
                'bio'           =>$bio,
                'levuser'       => $level,
                'insta'         => $insta,                        
                'box1'          => $box1,
                'box2'          => $box2,
                'box3'          => $box3,
                'box4'          => $box4,
                'box5'          => $box5,
                'box6'          => $box6,
                'box7'          => $box7,
                'box8'          => $box8,
                'box9'          => $box9,
                'params'        => $params

                
                ]);
            }else{

                $insta = instansi::get();
                $idinsta = $bio->id_instansi;

 

                return view('admin.dashboard_pd',[
                'layout'        => $this->layout,
                'bio'           =>$bio,
                'insta'         => $insta,    
               
                
                ]);
            }
          }
          return view('admin.login',[
            'layout' => $this->layout 
          ]);
    
    }
    //pegawai
    //rev 13 des 2023
    public function pegawai(Request $request){

        if(Auth::guard('admin')->check()){  
            $resallinsta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi");
            $allpd = $resallinsta->json();
            
            //default id insta
            $idinsta=1;

            $insta = collect($allpd)->where(
            'id_instansi_jenis',1)->where('status_aktif',1);

            $resinsta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi&id=$idinsta");
            $rinsta = $resinsta->json();
            
            $skpd = $rinsta[0];
            $selpd=collect($rinsta)->where('id',$idinsta);


            $params = $request->query();
            if(!empty($params)){
                if(!empty($params['nama'])){$nama=$params['nama'];}else{$nama="";}
                if(!empty($params['nip'])){$nip=$params['nip'];}else{$nip="";}
                if(!empty($params['id_jenjab'])){$id_jenjab=$params['id_jenjab'];}else{$id_jenjab="";}
                if(!empty($params['idpd'])){$idpd=$params['idpd'];}else{$idpd="";}
                

                $arrpar="?nama=".$nama."&nip=".$nip."&id_jenjab=".$id_jenjab."&idpd=".$idpd;
            
            }else{
                $arrpar="";
            }

            $queryIB = IndikatorBox::query($params);

            

            $queryIB->latest();
            $allIB = $queryIB->paginate(10);

            
            return view('admin/pegawai', [
                'layout'        =>  $this->layout,
                'model'         => $allIB->appends($params),
                'params'        => $params,
                'allpd'         => $allpd,
                'insta'         => $insta,
                'pd'            => (object) $skpd,
                'selpd'         => (object) $selpd[0],
                'rinsta'        => $rinsta,
                'arr_param'     => $arrpar,
            
                

            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function dialogprofilpegawai($nip) 
    {
        $ib = IndikatorBox::where('nip', $nip)->first();
        $detpeg = $ib->detPeg;
        return view('admin/dialog_profilpegawai', [
            'layout'        =>  $this->layout,
            
            'nip'           => $nip,
            'detpeg'        => $detpeg,
            
        
            

        ]);
    }
    //------------------------------
    //NIlai Potensi Inovasi Prestasi
    //export soal tpa
    public function exportnipotinpres() 
    {
        $now=date('Ymdhis');
        $namafile="fileNilaiPotensi_".$now.".xlsx";
        return Excel::download(new NilaiPotensiExport, $namafile);
    }
    public function postImportNilaipotensi(Request $request)
    {  
       
        $this->validate($request, [
			'filexls' => 'required|mimes:xls,xlsx'
		]);
        $idsesi = $request->input('idsesi');
        $idtoken = $request->input('idtoken');
        $idassessor = $request->input('idassessor');

        $file = $request->file('filexls');
        $now=date('Ymdhis');
        $nama_file = $now.'_'.$file->getClientOriginalName();
        
        $tujuan_upload = storage_path('uploads');
        $file->move($tujuan_upload,$nama_file);
       //clear table
        NilaiPotensi::truncate();

        Excel::import(new NilaiPotensiImport, storage_path('uploads/'.$nama_file));
      
        return Redirect::to("/admin/nipotinpres/")->with('success',' data Nilai Potensi  berhasil di import.'); 
    }
    public function nipotinpres(Request $request)
    {
        if(Auth::guard('admin')->check()){  
            $bio  = Auth::guard('admin')->user();    
            $level=$bio->level;
             $nipon = NilaiPotensi::orderby('id','asc')->paginate(100);
                
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.nipotinpres' , [
                    'layout'    => $this->layout,
                     'ms'       => $nipon,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function addnipotinpres()
    {
        if(Auth::guard('admin')->check()){  
            
            
            return view('admin/addnipotinpres',[
            'layout' => $this->layout,
            
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddnipotinpres(Request $request)
    {  
        request()->validate([
            'nilai_inovasi' => 'required',
            'nilai_prestasi' => 'required',
           
        
        ]);
         
        
        NilaiPotensi::create([
            'nip'               => $request['nip'],
            'nama'               => $request['nama'],
            'nilai_inovasi'      => $request['nilai_inovasi'],
            'nilai_prestasi'     => $request['nilai_prestasi'],
           
             
          ]);
       
        return Redirect::to("/admin/nipotinpres")->with('success','Selamat, nipotinpres berhasil ditambah');
    }
    public function editnipotinpres($id)
    {
        //$us = Admin::where('id', $id)->first();
        $np = NilaiPotensi::Where('id',$id)->first();
       
          return view('admin/editnipotinpres',[
            'layout' => $this->layout,
            'np' =>$np    
             
        ]);

       // return view('register');
    }
    public function postEditnipotinpres(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $id=$request->input('idna');
                NilaiPotensi::where('id', $id)
                ->update([
                     
                    'nip'                => $request['nip'],
                    'nama'               => $request['nama'],
                    'nilai_inovasi'      => $request['nilai_inovasi'],
                    'nilai_prestasi'     => $request['nilai_prestasi'],
                
            ]);
        
                return Redirect::to("/admin/nipotinpres")->with('success',' Edit nipotinpres berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function delnipotinpres($id)
    {
        if(Auth::guard('admin')->check()){      
             
            $np = NilaiPotensi::where('id', $id)->first();
            $np->delete();
            return Redirect::to("/admin/nipotinpres")->with('success',' Proses Delete nipotinpres berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
       
    }       
    
    //indikator ninebox
    public function indikatorninebox($id)
    {
        if(Auth::guard('admin')->check()){ 
             //allpd
          $resallinsta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi");
          $allpd = $resallinsta->json();
          

          $insta = collect($allpd)->where(
            'id_instansi_jenis',1)->where('status_aktif',1);
          //dd($insta);

          //pd per id
          $resinsta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi&id=$id");
          $rinsta = $resinsta->json();
          
          $skpd = $rinsta[0];
          $selpd=collect($rinsta)->where('id',$id);

          
            $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$id");
            $pegna = $respeg->json();
            $jmlpeg=collect($pegna)->count();  

            $indbox= IndikatorBox::where('id_instansi',$id)->get();

            return view('admin/indikatorninebox' , [
                'layout'    => $this->layout,
                'allpd'     => $allpd,
                'insta'     => $insta,
                'pd'        => (object) $skpd,
                'selpd'     => (object) $selpd[0],
                'rinsta'    => $rinsta,
               
                'jmlpeg'    => $jmlpeg,
                'pegna'     =>  $pegna,
                'indbox'    => $indbox,
                 
        ]);
           
            
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
       
    }     
    public function postIndikatorninebox(Request $request)
    {  
       // dd($request);
       $idinstansi= $request['idinstansi'];        
       $nminsta=Instansi::where('id', $idinstansi)->first();
       //pegawai-api
       $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinstansi");
       $pegna = $respeg->json();
       $jmlpeg=collect($pegna)->count();  
        //clear IB per PD
       $delIB = IndikatorBox::where('id_instansi', $idinstansi)->delete();

       foreach($pegna as $pegs){
        $peg =  (object) $pegs;
        //nilai inov pres
        $ins = IndikatorBox::create([ 
                    'id_instansi'           => $peg->id_instansi,
                    'nama_instansi'         => $nminsta->nama,
                    'nip'                   => $peg->nip,
                    'nama'                  => $peg->nama,
                    'id_jabatan'            => $peg->id_jabatan,
                    'nilai_skp'             => 0,
                    'nilai_inovasi'         => 0,
                    'nilai_prestasi'        => 0,
                    'nilai_indisipliner'    => 0,
                    'nilai_kompetensi'      => 0,
                    'nilai_kualifikasi'     => 0,
                    'nilai_riwayat_jabatan' => 0,
                    'nilai_riwayat_diklat'  => 0,
                    'nilai_kecerdasan'      => 0,
                    
                
                ]);
        
        } 

        $indbox= IndikatorBox::where('id_instansi',$idinstansi)->get();
        if(!empty(count($indbox))){
            foreach($indbox as $ib){
                $np = NilaiPotensi::where('nip',$ib->nip)->first();
                //SKP
                if($ib->detPeg->getSKP->kuadranKinerja == "SANGAT BAIK"){
                    $nilaiskp=80;
                }elseif($ib->detPeg->getSKP->kuadranKinerja == "BAIK"){
                    $nilaiskp=66;
                }elseif($ib->detPeg->getSKP->kuadranKinerja == "BUTUH PERBAIKAN"){
                    $nilaiskp=33;
                }else{
                    $nilaiskp=0;
                }
                //KUALIFIKASI
                $tkpend_terakhir=str_replace(['.','-'],'',$ib->detPeg->getKualifikasi->Pend_trakhir_Terakhir);
                if($tkpend_terakhir == "S3" ){
                    $nilaikualifikasi=20;
                }elseif($tkpend_terakhir == "S2"){
                    $nilaikualifikasi=15;
                }elseif(($tkpend_terakhir == "S1") or ($tkpend_terakhir == "DIV")  or ($tkpend_terakhir == "D4") or ($tkpend_terakhir == "SPG")){
                    $nilaikualifikasi=10;
                }elseif(($tkpend_terakhir == "D3") or  ($tkpend_terakhir == "DIII")  or ($tkpend_terakhir == "SPK") ){
                    $nilaikualifikasi=7.5;
                }else{
                    $nilaikualifikasi=5;
                }

                 //Riwayat Jabatan
                 $thnayena=date('Y');
                 $thncpns=substr($ib->nip, 8, 4);
                 $thnjab=$thnayena-$thncpns;
                 //$nilaijab=$thnjab;
                if($thnjab >= 20){
                    $nilaijab=10;
                }elseif(($thnjab <= 19) && ($thnjab >= 10)){
                    $nilaijab=6.6;
                }elseif(($thnjab <= 9) && ($thnjab >= 5)){
                    $nilaijab=3.3;
                }elseif(($thnjab <= 4) && ($thnjab >= 1)){
                    $nilaijab=1;
                }else{
                    $nilaijab=0;
                }
                //riwayat Diklat
                $ds=sizeof($ib->detPeg->getDiklatStruktural);
                $df=sizeof($ib->detPeg->getDiklatFungsional);
                $dt=sizeof($ib->detPeg->getDiklatTeknis);

                if($ds == 0){$jds=0;}else{$jds=1;}
                if($df == 0){$jdf=0;}else{$jdf=1;}
                if($dt == 0){$jdt=0;}else{$jdt=1;}
                
                $totdik = $jds+$jdf+$jdt;
                if($totdik == 0){
                    $nilaidiklat=0;
                }elseif($totdik == 1){
                    $nilaidiklat=3.3;
                }elseif($totdik == 2){
                    $nilaidiklat=6.6;
                }elseif($totdik == 3){
                    $nilaidiklat=10;
                }

                //indisipliner
                $dis=sizeof($ib->detPeg->getIndispliner);
                $tkhukuman= $ib->detPeg->getIndispliner;
                
                $nilaiindisipliner=0;
                $idtkhukum="";
                if(!empty($ib->detPeg->getIndispliner)){
                    //$idtkhukum=$tkhukuman->first() ;
                    foreach($tkhukuman as $tkhuk){
                       $idtkhukum=$tkhuk->id_tingkat_hukuman;

                        if($tkhuk->id_tingkat_hukuman=="3"){
                            $nilaiindisipliner = "-50";
                        }elseif($tkhuk->id_tingkat_hukuman=="2"){
                            $nilaiindisipliner = "-30";
                        }elseif($tkhuk->id_tingkat_hukuman=="1"){
                            $nilaiindisipliner = "-10";
                        }else{
                            $nilaiindisipliner="";
                        }
                    }
                   


                } 
                //JPM
                $njpm=$ib->getJPM->kategori;
                if($njpm=="Memenuhi Syarat"){
                    $nilaijpm=50;
                }elseif($njpm=="Masih Memenuhi Syarat"){
                    $nilaijpm=30;
                }elseif($njpm=="Kurang Memenuhi Syarat"){
                     $nilaijpm=10;
                }else{
                    $nilaijpm=0;
                }
                //KecerdasanUmum
                $ncer=$ib->getCerdas->predikat;
                if($ncer=="Very Superior"){
                    $nilaicer=10;
                }elseif($ncer=="Superior"){
                    $nilaicer=7.5;
                }elseif($ncer=="High Average"){
                     $nilaicer=5;
                }elseif($ncer=="Average"){
                     $nilaicer=2.5;
                }elseif($ncer=="Low Average"){
                     $nilaicer=1;
                }elseif($ncer=="Low"){
                     $nilaicer=0.5;
                }else{
                    $nilaicer=0;
                }
                //nilai import
                if(empty($np->nilai_inovasi)){
                    $nilaiinovasi=0;
                }else{
                    $nilaiinovasi=$np->nilai_inovasi;
                }
                if(empty($np->nilai_prestasi)){
                    $nilaiprestasi=0;
                }else{
                    $nilaiprestasi=$np->nilai_prestasi;
                }
                //sumbu x y
                $nilaiy=$nilaiskp+$nilaiinovasi+$nilaiprestasi+$nilaiindisipliner;
                 
                $nilaix=$nilaijpm+$nilaikualifikasi+$nilaijab+$nilaidiklat+$nilaicer;
 
                if(($nilaiy <= 34) and ($nilaix < 51)){
                    $nilaitb="1";
                    $stylena="bg-danger";
                    $uraianna="Kinerja di bawah ekspektasi dan potensi rendah";
                }elseif(($nilaiy > 34 && $nilaiy < 67) and ($nilaix < 51)){
                    $nilaitb="2";
                    $stylena="bg-danger";
                    $uraianna="Kinerja sesuai ekspektasi dan potensi rendah";
                }elseif(($nilaiy <= 34) and ($nilaix >= 51 && $nilaix < 81)){
                    $nilaitb="3";
                    $stylena="bg-danger";
                    $uraianna="Kinerja di bawah ekspektasi dan potensi menengah";
                }elseif(($nilaiy >= 67) and ($nilaix < 51 )){
                    $nilaitb="4";
                    $stylena="bg-warning";
                    $uraianna="Kinerja di atas ekspektasi dan potensi rendah";
                }elseif(($nilaiy > 34 && $nilaiy < 67) and ($nilaix >= 51 && $nilaix < 81)){
                    $nilaitb="5";
                    $stylena="bg-warning";
                    $uraianna="Kinerja sesuai ekspektasi dan potensi menengah";
                }elseif(($nilaiy <= 34 ) and ($nilaix >= 81)){
                    $nilaitb="6";
                    $stylena="bg-warning";
                    $uraianna="Kinerja di bawah ekspektasi dan potensi tinggi";
                }elseif(($nilaiy >= 67 ) and ($nilaix >= 51 && $nilaix < 81)){
                    $nilaitb="7";
                    $stylena="bg-success";
                    $uraianna="Kinerja di atas ekspektasi dan potensi menengah";
                }elseif(($nilaiy > 34 && $nilaiy < 67 ) and ($nilaix >= 81 )){
                    $nilaitb="8";
                    $stylena="bg-success";
                    $uraianna="Kinerja sesuai ekspektasi dan potensi tinggi";
                }elseif(($nilaiy >= 67 ) and ($nilaix >= 81)){
                    $nilaitb="9";
                    $stylena="bg-primary";
                    $uraianna="Kinerja di atas ekspektasi dan potensi tinggi";
                }else{
                    $nilaitb="0";
                    $stylena="bg-danger";
                    $uraianna="";
                }

                //cek jabatan
                $namajabatan    = strtoupper($ib->detPeg->JABATAN);
                $eselon         = strtoupper($ib->detPeg->ESELON);
                $jenisjabatan   = strtoupper($ib->detPeg->Jns_Jbtan);

                if(($eselon=="II-A") and  ($jenisjabatan=="STRUKTURAL")){
                    $id_jenisjabatan="1";
                }elseif(($eselon=="II-B") and ($jenisjabatan=="STRUKTURAL")){
                    $id_jenisjabatan="1";
                }elseif(($eselon=="III-A") and ($jenisjabatan=="STRUKTURAL")){
                    $id_jenisjabatan="2";
                }elseif(($eselon=="III-B") and ($jenisjabatan=="STRUKTURAL")){
                    $id_jenisjabatan="2";
                }elseif(($eselon=="IV-A") and ($jenisjabatan=="STRUKTURAL")){
                    $id_jenisjabatan="3";
                }elseif(($eselon=="IV-B") and ($jenisjabatan=="STRUKTURAL")){
                    $id_jenisjabatan="3";
                }elseif(($eselon=="NON ESELON") and ($jenisjabatan=="PELAKSANA")){
                    $id_jenisjabatan="4";
                }elseif(($eselon=="NON ESELON") and ($jenisjabatan=="FUNGSIONAL")){
                    $id_jenisjabatan="5";
                }else{
                     $id_jenisjabatan="0";
                } 

                // //CEK Nilai Kinerja
                if ($np) {
                    // Find and update the record in the IndikatorBox table
                    $indikatorBox = IndikatorBox::where('nip', $np->nip)->first();
                    
                    
                    
                    if ($indikatorBox) {
                        $indikatorBox->update([
                            'id_jenis_jabatan'      => $id_jenisjabatan,
                            'jenis_jabatan'         => $jenisjabatan,
                            'eselon'                => $eselon,
                            'jabatan'               => $namajabatan,
                            'nilai_inovasi'         => $nilaiinovasi,
                            'nilai_prestasi'        => $nilaiprestasi,
                            'nilai_skp'             => $nilaiskp,
                            'nilai_kualifikasi'     => $nilaikualifikasi,
                            'nilai_riwayat_jabatan' => $nilaijab,
                            'nilai_indisipliner'    => $nilaiindisipliner,
                            'nilai_kompetensi'      => $nilaijpm,
                            'nilai_riwayat_diklat'  => $nilaidiklat,
                            'nilai_kecerdasan'      => $nilaicer,
                            'nilai_x'               => $nilaix,
                            'nilai_y'               => $nilaiy,
                            'nilai_tb'              => $nilaitb,
                            'uraian_tb'             => $uraianna,
                           
                            
                        ]);
                    }else{
                        $indikatorBox->update([
                            'id_jenis_jabatan'      => $id_jenisjabatan,
                            'jenis_jabatan'         => $jenisjabatan,
                            'eselon'                => $eselon,
                            'jabatan'               => $namajabatan,
                            'nilai_inovasi'         => $nilaiinovasi,
                            'nilai_prestasi'        => $nilaiprestasi,
                            'nilai_skp'             => $nilaiskp,
                            'nilai_kualifikasi'     => $nilaikualifikasi,
                            'nilai_riwayat_jabatan' => $nilaijab,
                            'nilai_indisipliner'    => $nilaiindisipliner,
                            'nilai_kompetensi'      => $nilaijpm,
                            'nilai_riwayat_diklat'  => $nilaidiklat,
                            'nilai_kecerdasan'      => $nilaicer,
                            'nilai_x'               => $nilaix,
                            'nilai_y'               => $nilaiy,
                            'nilai_tb'              => $nilaitb,
                            'uraian_tb'             => $uraianna,
                            
                           
                           
                        ]);
                    }
                }else{
                    $indikatorBox = IndikatorBox::where('nip', $ib->nip)->first();
                    $indikatorBox->update([
                        'id_jenis_jabatan'      => $id_jenisjabatan,
                        'jenis_jabatan'         => $jenisjabatan,
                        'eselon'                => $eselon,
                        'jabatan'               => $namajabatan,
                        'nilai_inovasi'         => $nilaiinovasi,
                        'nilai_prestasi'        => $nilaiprestasi,
                        'nilai_skp'             => $nilaiskp,
                        'nilai_kualifikasi'     => $nilaikualifikasi,
                        'nilai_riwayat_jabatan' => $nilaijab,
                        'nilai_indisipliner'    => $nilaiindisipliner,
                        'nilai_kompetensi'      => $nilaijpm,
                        'nilai_riwayat_diklat'  => $nilaidiklat,
                        'nilai_kecerdasan'      => $nilaicer,
                        'nilai_x'               => $nilaix,
                        'nilai_y'               => $nilaiy,
                        'nilai_tb'              => $nilaitb,
                        'uraian_tb'             => $uraianna,
                       
                        
                    ]);
                }
            }
        
        }
     
         
       
        return response()->json(
            [
                'data'      =>$idinstansi,
                
                
                'success'   =>true,
                'message'   => 'ID '.$idinstansi.' jmlpeg: '.$jmlpeg,
            ]
        );
         
    }
    //getdataALL
    //09 nov 2023
    public function postIndikatornineboxAll(Request $request)
    {  
       // dd($request);
       $idpd= $request['idinstansi']; 
       $api_insta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi");
       $instana = $api_insta->json();
       $jmlpd=collect($instana)->count();  
       $rsinsta = collect($instana);
       //$rsinsta = collect($instana)->slice(0, 10);
       
      // dd($rsinsta);
       //clear table indikator
      IndikatorBox::truncate();
       
      

       //loop PD
       $jmlpeg=0;
       $totpeg=0;
       foreach($rsinsta as $skpd){
            $pd = (object) $skpd;
           //pegawai api
           //$idinstansi= $request['idinstansi']; 
            $idinstansi=$pd->id;       
            $nminsta=Instansi::where('id', $idinstansi)->first();
    
            $api_peg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinstansi");
            $pegna = $api_peg->json();
            $rspeg = collect($pegna);
            $jmlpeg=collect($pegna)->count();  
            $totpeg=$totpeg+$jmlpeg;
           
            
            //insert table indikator
            foreach($pegna as $pegs){
                $peg =  (object) $pegs;
                //nilai inov pres
                $ins = IndikatorBox::create([ 
                        'id_instansi'           => $peg->id_instansi,
                        'nama_instansi'         => $nminsta->nama,
                        'nip'                   => $peg->nip,
                        'nama'                  => $peg->nama,
                        'id_jabatan'            => $peg->id_jabatan,
                        'nilai_skp'             => 0,
                        'nilai_inovasi'         => 0,
                        'nilai_prestasi'        => 0,
                        'nilai_indisipliner'    => 0,
                        'nilai_kompetensi'      => 0,
                        'nilai_kualifikasi'     => 0,
                        'nilai_riwayat_jabatan' => 0,
                        'nilai_riwayat_diklat'  => 0,
                        'nilai_kecerdasan'      => 0,
                        
                    
                    ]);
            
            } 
            //edit data indikator
            $indbox= IndikatorBox::where('id_instansi',$idinstansi)->get();
            if(!empty(count($indbox))){
                foreach($indbox as $ib){
                    $np = NilaiPotensi::where('nip',$ib->nip)->first();
                    //SKP
                    if($ib->detPeg->getSKP->kuadranKinerja == "SANGAT BAIK"){
                        $nilaiskp=80;
                    }elseif($ib->detPeg->getSKP->kuadranKinerja == "BAIK"){
                        $nilaiskp=66;
                    }elseif($ib->detPeg->getSKP->kuadranKinerja == "BUTUH PERBAIKAN"){
                        $nilaiskp=33;
                    }else{
                        $nilaiskp=0;
                    }
                    //KUALIFIKASI
                    $tkpend_terakhir=str_replace(['.','-'],'',$ib->detPeg->getKualifikasi->Pend_trakhir_Terakhir);
                    if($tkpend_terakhir == "S3" ){
                        $nilaikualifikasi=20;
                    }elseif($tkpend_terakhir == "S2"){
                        $nilaikualifikasi=15;
                    }elseif(($tkpend_terakhir == "S1") or ($tkpend_terakhir == "DIV")  or ($tkpend_terakhir == "D4") or ($tkpend_terakhir == "SPG")){
                        $nilaikualifikasi=10;
                    }elseif(($tkpend_terakhir == "D3") or  ($tkpend_terakhir == "DIII")  or ($tkpend_terakhir == "SPK") ){
                        $nilaikualifikasi=7.5;
                    }else{
                        $nilaikualifikasi=5;
                    }

                    //Riwayat Jabatan
                    $thnayena=date('Y');
                    $thncpns=substr($ib->nip, 8, 4);
                    $thnjab=$thnayena-$thncpns;
                    //$nilaijab=$thnjab;
                    if($thnjab >= 20){
                        $nilaijab=10;
                    }elseif(($thnjab <= 19) && ($thnjab >= 10)){
                        $nilaijab=6.6;
                    }elseif(($thnjab <= 9) && ($thnjab >= 5)){
                        $nilaijab=3.3;
                    }elseif(($thnjab <= 4) && ($thnjab >= 1)){
                        $nilaijab=1;
                    }else{
                        $nilaijab=0;
                    }
                    //riwayat Diklat
                    $ds=sizeof($ib->detPeg->getDiklatStruktural);
                    $df=sizeof($ib->detPeg->getDiklatFungsional);
                    $dt=sizeof($ib->detPeg->getDiklatTeknis);

                    if($ds == 0){$jds=0;}else{$jds=1;}
                    if($df == 0){$jdf=0;}else{$jdf=1;}
                    if($dt == 0){$jdt=0;}else{$jdt=1;}
                    
                    $totdik = $jds+$jdf+$jdt;
                    if($totdik == 0){
                        $nilaidiklat=0;
                    }elseif($totdik == 1){
                        $nilaidiklat=3.3;
                    }elseif($totdik == 2){
                        $nilaidiklat=6.6;
                    }elseif($totdik == 3){
                        $nilaidiklat=10;
                    }

                    //indisipliner
                    $dis=sizeof($ib->detPeg->getIndispliner);
                    $tkhukuman= $ib->detPeg->getIndispliner;
                    
                    $nilaiindisipliner=0;
                    $idtkhukum="";
                    if(!empty($ib->detPeg->getIndispliner)){
                        //$idtkhukum=$tkhukuman->first() ;
                        foreach($tkhukuman as $tkhuk){
                        $idtkhukum=$tkhuk->id_tingkat_hukuman;

                            if($tkhuk->id_tingkat_hukuman=="3"){
                                $nilaiindisipliner = "-50";
                            }elseif($tkhuk->id_tingkat_hukuman=="2"){
                                $nilaiindisipliner = "-30";
                            }elseif($tkhuk->id_tingkat_hukuman=="1"){
                                $nilaiindisipliner = "-10";
                            }else{
                                $nilaiindisipliner="";
                            }
                        }
                    


                    } 
                    //JPM
                    $njpm=$ib->getJPM->kategori;
                    if($njpm=="Memenuhi Syarat"){
                        $nilaijpm=50;
                    }elseif($njpm=="Masih Memenuhi Syarat"){
                        $nilaijpm=30;
                    }elseif($njpm=="Kurang Memenuhi Syarat"){
                        $nilaijpm=10;
                    }else{
                        $nilaijpm=0;
                    }
                    //KecerdasanUmum
                    $ncer=$ib->getCerdas->predikat;
                    if($ncer=="Very Superior"){
                        $nilaicer=10;
                    }elseif($ncer=="Superior"){
                        $nilaicer=7.5;
                    }elseif($ncer=="High Average"){
                        $nilaicer=5;
                    }elseif($ncer=="Average"){
                        $nilaicer=2.5;
                    }elseif($ncer=="Low Average"){
                        $nilaicer=1;
                    }elseif($ncer=="Low"){
                        $nilaicer=0.5;
                    }else{
                        $nilaicer=0;
                    }
                    //nilai import
                    if(empty($np->nilai_inovasi)){
                        $nilaiinovasi=0;
                    }else{
                        $nilaiinovasi=$np->nilai_inovasi;
                    }
                    if(empty($np->nilai_prestasi)){
                        $nilaiprestasi=0;
                    }else{
                        $nilaiprestasi=$np->nilai_prestasi;
                    }
                    //sumbu x y
                    $nilaiy=$nilaiskp+$nilaiinovasi+$nilaiprestasi+$nilaiindisipliner;
                    
                    $nilaix=$nilaijpm+$nilaikualifikasi+$nilaijab+$nilaidiklat+$nilaicer;
    
                    if(($nilaiy <= 34) and ($nilaix < 51)){
                        $nilaitb="1";
                        $stylena="bg-danger";
                        $uraianna="Kinerja di bawah ekspektasi dan potensi rendah";
                    }elseif(($nilaiy > 34 && $nilaiy < 67) and ($nilaix < 51)){
                        $nilaitb="2";
                        $stylena="bg-danger";
                        $uraianna="Kinerja sesuai ekspektasi dan potensi rendah";
                    }elseif(($nilaiy <= 34) and ($nilaix >= 51 && $nilaix < 81)){
                        $nilaitb="3";
                        $stylena="bg-danger";
                        $uraianna="Kinerja di bawah ekspektasi dan potensi menengah";
                    }elseif(($nilaiy >= 67) and ($nilaix < 51 )){
                        $nilaitb="4";
                        $stylena="bg-warning";
                        $uraianna="Kinerja di atas ekspektasi dan potensi rendah";
                    }elseif(($nilaiy > 34 && $nilaiy < 67) and ($nilaix >= 51 && $nilaix < 81)){
                        $nilaitb="5";
                        $stylena="bg-warning";
                        $uraianna="Kinerja sesuai ekspektasi dan potensi menengah";
                    }elseif(($nilaiy <= 34 ) and ($nilaix >= 81)){
                        $nilaitb="6";
                        $stylena="bg-warning";
                        $uraianna="Kinerja di bawah ekspektasi dan potensi tinggi";
                    }elseif(($nilaiy >= 67 ) and ($nilaix >= 51 && $nilaix < 81)){
                        $nilaitb="7";
                        $stylena="bg-success";
                        $uraianna="Kinerja di atas ekspektasi dan potensi menengah";
                    }elseif(($nilaiy > 34 && $nilaiy < 67 ) and ($nilaix >= 81 )){
                        $nilaitb="8";
                        $stylena="bg-success";
                        $uraianna="Kinerja sesuai ekspektasi dan potensi tinggi";
                    }elseif(($nilaiy >= 67 ) and ($nilaix >= 81)){
                        $nilaitb="9";
                        $stylena="bg-primary";
                        $uraianna="Kinerja di atas ekspektasi dan potensi tinggi";
                    }else{
                        $nilaitb="0";
                        $stylena="bg-danger";
                        $uraianna="";
                    }

                    //cek jabatan
                    $namajabatan    = strtoupper($ib->detPeg->JABATAN);
                    $eselon         = strtoupper($ib->detPeg->ESELON);
                    $jenisjabatan   = strtoupper($ib->detPeg->Jns_Jbtan);

                    if(($eselon=="II-A") and  ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="1";
                    }elseif(($eselon=="II-B") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="1";
                    }elseif(($eselon=="III-A") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="2";
                    }elseif(($eselon=="III-B") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="2";
                    }elseif(($eselon=="IV-A") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="3";
                    }elseif(($eselon=="IV-B") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="3";
                    }elseif(($eselon=="NON ESELON") and ($jenisjabatan=="PELAKSANA")){
                        $id_jenisjabatan="4";
                    }elseif(($eselon=="NON ESELON") and ($jenisjabatan=="FUNGSIONAL")){
                        $id_jenisjabatan="5";
                    }else{
                        $id_jenisjabatan="0";
                    } 

                    // //CEK Nilai Kinerja
                    if ($np) {
                        // Find and update the record in the IndikatorBox table
                        $indikatorBox = IndikatorBox::where('nip', $np->nip)->first();
                        
                        
                        
                        if ($indikatorBox) {
                            $indikatorBox->update([
                                'id_jenis_jabatan'      => $id_jenisjabatan,
                                'jenis_jabatan'         => $jenisjabatan,
                                'eselon'                => $eselon,
                                'jabatan'               => $namajabatan,
                                'nilai_inovasi'         => $nilaiinovasi,
                                'nilai_prestasi'        => $nilaiprestasi,
                                'nilai_skp'             => $nilaiskp,
                                'nilai_kualifikasi'     => $nilaikualifikasi,
                                'nilai_riwayat_jabatan' => $nilaijab,
                                'nilai_indisipliner'    => $nilaiindisipliner,
                                'nilai_kompetensi'      => $nilaijpm,
                                'nilai_riwayat_diklat'  => $nilaidiklat,
                                'nilai_kecerdasan'      => $nilaicer,
                                'nilai_x'               => $nilaix,
                                'nilai_y'               => $nilaiy,
                                'nilai_tb'              => $nilaitb,
                                'uraian_tb'             => $uraianna,
                            
                                
                            ]);
                        }else{
                            $indikatorBox->update([
                                'id_jenis_jabatan'      => $id_jenisjabatan,
                                'jenis_jabatan'         => $jenisjabatan,
                                'eselon'                => $eselon,
                                'jabatan'               => $namajabatan,
                                'nilai_inovasi'         => $nilaiinovasi,
                                'nilai_prestasi'        => $nilaiprestasi,
                                'nilai_skp'             => $nilaiskp,
                                'nilai_kualifikasi'     => $nilaikualifikasi,
                                'nilai_riwayat_jabatan' => $nilaijab,
                                'nilai_indisipliner'    => $nilaiindisipliner,
                                'nilai_kompetensi'      => $nilaijpm,
                                'nilai_riwayat_diklat'  => $nilaidiklat,
                                'nilai_kecerdasan'      => $nilaicer,
                                'nilai_x'               => $nilaix,
                                'nilai_y'               => $nilaiy,
                                'nilai_tb'              => $nilaitb,
                                'uraian_tb'             => $uraianna,
                                
                            
                            
                            ]);
                        }
                    }else{
                        $indikatorBox = IndikatorBox::where('nip', $ib->nip)->first();
                        $indikatorBox->update([
                            'id_jenis_jabatan'      => $id_jenisjabatan,
                            'jenis_jabatan'         => $jenisjabatan,
                            'eselon'                => $eselon,
                            'jabatan'               => $namajabatan,
                            'nilai_inovasi'         => $nilaiinovasi,
                            'nilai_prestasi'        => $nilaiprestasi,
                            'nilai_skp'             => $nilaiskp,
                            'nilai_kualifikasi'     => $nilaikualifikasi,
                            'nilai_riwayat_jabatan' => $nilaijab,
                            'nilai_indisipliner'    => $nilaiindisipliner,
                            'nilai_kompetensi'      => $nilaijpm,
                            'nilai_riwayat_diklat'  => $nilaidiklat,
                            'nilai_kecerdasan'      => $nilaicer,
                            'nilai_x'               => $nilaix,
                            'nilai_y'               => $nilaiy,
                            'nilai_tb'              => $nilaitb,
                            'uraian_tb'             => $uraianna,
                        
                            
                        ]);
                    }
                }
            
            }
       }


        return response()->json(
            [
                'data'      =>$idpd,
                'success'   =>true,
                'message'   => 'JmlPD '.$jmlpd.' TotPeg '.$totpeg,
            ]
        );

       //pegawai-api
    //    $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinstansi");
    //    $pegna = $respeg->json();
    //    $jmlpeg=collect($pegna)->count();  
    //     //clear IB per PD
    //    $delIB = IndikatorBox::where('id_instansi', $idinstansi)->delete();

    //    foreach($pegna as $pegs){
    //     $peg =  (object) $pegs;
    //     //nilai inov pres
    //     $ins = IndikatorBox::create([ 
    //                 'id_instansi'           => $peg->id_instansi,
    //                 'nama_instansi'         => $nminsta->nama,
    //                 'nip'                   => $peg->nip,
    //                 'nama'                  => $peg->nama,
    //                 'id_jabatan'            => $peg->id_jabatan,
    //                 'nilai_skp'             => 0,
    //                 'nilai_inovasi'         => 0,
    //                 'nilai_prestasi'        => 0,
    //                 'nilai_indisipliner'    => 0,
    //                 'nilai_kompetensi'      => 0,
    //                 'nilai_kualifikasi'     => 0,
    //                 'nilai_riwayat_jabatan' => 0,
    //                 'nilai_riwayat_diklat'  => 0,
    //                 'nilai_kecerdasan'      => 0,
                    
                
    //             ]);
        
    //     } 

        
     
         
       
       
         
    }

    public function detailindikatorninebox ($idinstansi){
        //dd($arr);
        
        $indbox= IndikatorBox::where('id_instansi',$idinstansi)->get();
        foreach($indbox as $ib){

            $np = NilaiPotensi::where('nip',$ib->nip)->first();
            if ($np) {
                // Find and update the record in the IndikatorBox table
                $indikatorBox = IndikatorBox::where('nip', $np->nip)->first();
        
                if ($indikatorBox) {
                    $indikatorBox->update([
                        'nilai_inovasi' => $np->nilai_inovasi,
                        'nilai_prestasi' => $np->nilai_prestasi,
                    ]);
                }
            }


         
        }
        //load new IB
        $indbox2= IndikatorBox::where('id_instansi',$idinstansi)->get();
        
        return view('admin/detail_indikatorninebox' , [
            
            'layout'        =>  $this->layout,
            'idinstansi'    =>  $idinstansi,
            'indbox'        => $indbox2,
             
        ]);

     

    }
    //ninebox
    //19okt2023
    public function ninebox(Request $request){

        if(Auth::guard('admin')->check()){  
            $resallinsta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi");
            $allpd = $resallinsta->json();
            
            //default id insta
            $idinsta=1;

            $insta = collect($allpd)->where(
            'id_instansi_jenis',1)->where('status_aktif',1);

            $resinsta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi&id=$idinsta");
            $rinsta = $resinsta->json();
            
            $skpd = $rinsta[0];
            $selpd=collect($rinsta)->where('id',$idinsta);


            $params = $request->query();
            if(!empty($params)){
                if(!empty($params['nama'])){$nama=$params['nama'];}else{$nama="";}
                if(!empty($params['nip'])){$nip=$params['nip'];}else{$nip="";}
                if(!empty($params['id_jenjab'])){$id_jenjab=$params['id_jenjab'];}else{$id_jenjab="";}
                if(!empty($params['idpd'])){$idpd=$params['idpd'];}else{$idpd="";}
                

                $arrpar="?nama=".$nama."&nip=".$nip."&id_jenjab=".$id_jenjab."&idpd=".$idpd;
            
            }else{
                $arrpar="";
            }

            $queryIB = IndikatorBox::query($params);

            

            $queryIB->latest();
            $allIB = $queryIB->paginate(10);

            
            return view('admin/ninebox', [
                'layout'        =>  $this->layout,
                'model'         => $allIB->appends($params),
                'params'        => $params,
                'allpd'         => $allpd,
                'insta'         => $insta,
                'pd'            => (object) $skpd,
                'selpd'         => (object) $selpd[0],
                'rinsta'        => $rinsta,
                'arr_param'     => $arrpar,
            
                

            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function exportninebox(Request $request) 
    {
        $params = $request->query();
          
           // dd($params);

        $now=date('Ymdhis');
        $namafile="fileNineBox_".$now.".xlsx";
        //return Excel::download(new NineBoxExport, $namafile);
        return Excel::download(new NineBoxExport(
            "excel.ninebox", $params 
        ), $namafile);
    }

    public function printninebox(Request $request)
    {
        if(Auth::guard('admin')->check()){  
             
            $params = $request->query();
            if(!empty($params)){
                $arrpar="?nama=".$params['nama']."&nip=".$params['nip']."&id_jenjab=".$params['id_jenjab']."&idpd=".$params['idpd'];
            
            }else{
                $arrpar="";
            }

            $queryIB = IndikatorBox::query($params);

            

            $queryIB->latest();
            $allIB = $queryIB->get();

            //dd($allIB);
             
             
                return view('admin/print_ninebox' , [
                    'layout' => $this->layout,
                    'model'         => $allIB,
                    'params'        => $params,
                    'jmpeg'         => count($allIB),
                    'arr_params'        => $arrpar,
                    
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function editninebox($id)
    {
        $ib = IndikatorBox::where('id', $id)->first();
       
          return view('admin/editninebox',[
            'layout' => $this->layout,
            'ib' =>$ib    
             
        ]);

       // return view('register');
    }
    public function postEditninebox(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $idna               = $request->input('idna');
                $id_jenisjabatan    = $request->input('id_jenis_jabatan');
                $nilaiinovasi       = $request->input('nilai_inovasi');
                $nilaiprestasi      = $request->input('nilai_prestasi');
                $nilaiskp           = $request->input('nilai_skp');
                $nilaikualifikasi   = $request->input('nilai_kualifikasi');
                $nilaijab           = $request->input('nilai_riwayat_jabatan');
                $nilaiindisipliner  = $request->input('nilai_indisipliner');
                $nilaijpm           = $request->input('nilai_kompetensi');
                $nilaidiklat        = $request->input('nilai_riwayat_diklat');
                $nilaicer           = $request->input('nilai_kecerdasan');

                //sumbu x dn y
                $nilaiy=$nilaiskp+$nilaiinovasi+$nilaiprestasi+$nilaiindisipliner;
                $nilaix=$nilaijpm+$nilaikualifikasi+$nilaijab+$nilaidiklat+$nilaicer;

                if(($nilaiy <= 34) and ($nilaix < 51)){
                    $nilaitb="1";
                    $stylena="bg-danger";
                    $uraianna="Kinerja di bawah ekspektasi dan potensi rendah";
                }elseif(($nilaiy > 34 && $nilaiy < 67) and ($nilaix < 51)){
                    $nilaitb="2";
                    $stylena="bg-danger";
                    $uraianna="Kinerja sesuai ekspektasi dan potensi rendah";
                }elseif(($nilaiy <= 34) and ($nilaix >= 51 && $nilaix < 81)){
                    $nilaitb="3";
                    $stylena="bg-danger";
                    $uraianna="Kinerja di bawah ekspektasi dan potensi menengah";
                }elseif(($nilaiy >= 67) and ($nilaix < 51 )){
                    $nilaitb="4";
                    $stylena="bg-warning";
                    $uraianna="Kinerja di atas ekspektasi dan potensi rendah";
                }elseif(($nilaiy > 34 && $nilaiy < 67) and ($nilaix >= 51 && $nilaix < 81)){
                    $nilaitb="5";
                    $stylena="bg-warning";
                    $uraianna="Kinerja sesuai ekspektasi dan potensi menengah";
                }elseif(($nilaiy <= 34 ) and ($nilaix >= 81)){
                    $nilaitb="6";
                    $stylena="bg-warning";
                    $uraianna="Kinerja di bawah ekspektasi dan potensi tinggi";
                }elseif(($nilaiy >= 67 ) and ($nilaix >= 51 && $nilaix < 81)){
                    $nilaitb="7";
                    $stylena="bg-success";
                    $uraianna="Kinerja di atas ekspektasi dan potensi menengah";
                }elseif(($nilaiy > 34 && $nilaiy < 67 ) and ($nilaix >= 81 )){
                    $nilaitb="8";
                    $stylena="bg-success";
                    $uraianna="Kinerja sesuai ekspektasi dan potensi tinggi";
                }elseif(($nilaiy >= 67 ) and ($nilaix >= 81)){
                    $nilaitb="9";
                    $stylena="bg-primary";
                    $uraianna="Kinerja di atas ekspektasi dan potensi tinggi";
                }else{
                    $nilaitb="0";
                    $stylena="bg-danger";
                    $uraianna="";
                }
 
                


                IndikatorBox::where('id', $idna)
                ->update([
                    'nama'                  => $request['nama'],
                    'nip'                   => $request['nip'],
                    
                    'id_jenis_jabatan'      => $id_jenisjabatan,
                    'nilai_inovasi'         => $nilaiinovasi,
                    'nilai_prestasi'        => $nilaiprestasi,
                    'nilai_skp'             => $nilaiskp,
                    'nilai_kualifikasi'     => $nilaikualifikasi,
                    'nilai_riwayat_jabatan' => $nilaijab,
                    'nilai_indisipliner'    => $nilaiindisipliner,
                    'nilai_kompetensi'      => $nilaijpm,
                    'nilai_riwayat_diklat'  => $nilaidiklat,
                    'nilai_kecerdasan'      => $nilaicer,
                    'nilai_x'               => $nilaix,
                    'nilai_y'               => $nilaiy,
                    'nilai_tb'              => $nilaitb,
                    'uraian_tb'             => $uraianna,
                    
                
                
            ]);
        
                return Redirect::to("/admin/ninebox")->with('success',' Edit NineBox berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    //del ninebox
    public function delninebox($id)
    {
        if(Auth::guard('admin')->check()){      
            
                $dl = Refunitkerja::where('id', $id)->first();
                $dl->delete();
                return Redirect::to("/admin/unitkerja")->with('success',' Proses Delete Unit Kerja berhasil.');

        }else{
            return view('admin.login',[
                'layout' => $this->layout 
                ]);
        }
    }

    //peta sebaran ninebox
    public function sebaranninebox(Request $request){
        //default id insta
        $idinsta=1;
        
        // $resallinsta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi");
        // $allpd = $resallinsta->json();
        
        

        // $insta = collect($allpd)->where(
        // 'id_instansi_jenis',1)->where('status_aktif',1);

        // $resinsta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi&id=$idinsta");
        // $rinsta = $resinsta->json();
        
        // $skpd = $rinsta[0];
        // $selpd=collect($rinsta)->where('id',$idinsta);

        $allpd = Instansi::where('id_instansi_jenis',1)
                  ->where('status_aktif',1)
                  ->get();
        $insta = Instansi::where('id',$idinsta)->first();
             
        //dd($allpd);


        $params = $request->query();
        $queryIB = IndikatorBox::query($params);
        //jpt1
        $queJPT1 = IndikatorBox::jpt($params,1)->count();
         
       

        $queJF1 = IndikatorBox::jfung($params,1)->count();
         

         

        $queryIB->latest();
        //$cIB->latest();

        $allIB = $queryIB->paginate(10);
        $jmlIB = $queryIB->count();

        if(empty($params['idpd'])){
            $paramID='';
        }else{
            $paramID=$params['idpd'];
        }


        return view('admin/sebaran_ninebox', [
            'layout'        =>  $this->layout,
            'model'         => $queryIB,
            'jmlIB'         => $jmlIB,
            'params'        => $params,
            'allpd'         => $allpd,
            'insta'         => $allpd,
            'pd'            => $insta,
            'selpd'         => $insta,
            'idinsta'       => $paramID,
            'queJPT1'          => $queJPT1,
            'jf1'              => $queJF1,
            

            

        ]);

    }

    public function sebaranninebox2(Request $request){
        //default id insta
        $idinsta=1;
        
       
        $allpd = Instansi::where('id_instansi_jenis',1)
                  ->where('status_aktif',1)
                  ->get();
        $insta = Instansi::where('id',$idinsta)->first();
             
        //dd($allpd);


        $params = $request->query();
        $queryIB = IndikatorBox::query($params);
       

         

        $queryIB->latest();
        //$cIB->latest();

        $allIB = $queryIB->paginate(10);
        $jmlIB = $queryIB->count();

        if(empty($params['idpd'])){
            $paramID='';
        }else{
            $paramID=$params['idpd'];
        }


        return view('admin/sebaran_ninebox2', [
            'layout'        =>  $this->layout,
            'model'         => $queryIB,
            'jmlIB'         => $jmlIB,
            'params'        => $params,
            'allpd'         => $allpd,
            'insta'         => $allpd,
            'pd'            => $insta,
            'selpd'         => $insta,
            'idinsta'       => $paramID,
           
            

            

        ]);

    }
    //modul suksesor
    //5nov2023
    public function searchpegpotensi(Request $request)
    {
        if(Auth::guard('admin')->check()){  
            $bio  = Auth::guard('admin')->user();    
            $level=$bio->level;
            //$model = IndikatorBox::orderby('nilai_tb','desc')->paginate(10);
            $params = $request->query();
            // $queryIB = IndikatorBox::search($params);
            // $queryIB->latest();
            // $allIB = $queryIB->paginate(1000);  
            //dd($params);
            if(empty($params['key'])){
                $queryIB = IndikatorBox::search($params);
                $queryIB->latest();
                $allIB = $queryIB->paginate(10); 
                $model = $allIB->appends($params);
            }else{
               // $key=$params['key'];
                
                $allIB = IndikatorBox::orderby('nilai_tb','desc')->paginate(1000); 
                $model = $allIB->appends($params);
                // $model = IndikatorBox::orderby('nilai_tb','desc')
                //             ->paginate(100);
                            //->get();

             }
            
            if(empty($params['key'])){
                $key="";
            }else{
                $key=$params['key'];
            }
           
            
                
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.searchpegpotensi' , [
                    'layout'        => $this->layout,
                    //'model'         =>  $allIB->appends($params),
                    'model'         => $model,
                    'params'        => $params,
                    'key'           => $key
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    //searc suksesor v.2
    public function searchsuksesor(Request $request)
    {
        if(Auth::guard('admin')->check()){  
            $bio  = Auth::guard('admin')->user();    
            $level=$bio->level;
            //$model = IndikatorBox::orderby('nilai_tb','desc')->paginate(10);
            $params = $request->query();
            $queryIB = DataApiSimadig::search($params);
            $queryIB->latest();
           // $allIB = $queryIB->paginate(50); 
            //$model = $allIB->appends($params);
            $model = $queryIB->get();
             
           
                
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.searchsuksesor' , [
                    'layout'        => $this->layout,
                    //'model'         =>  $allIB->appends($params),
                    'model'         => $model,
                    'params'        => $params,
                    'queryna'       => $queryIB
                    
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    //getData SIMADIG API
    public function getdatasimadig(Request $request)
    {
        if(Auth::guard('admin')->check()){  
            $bio  = Auth::guard('admin')->user();    
            $level=$bio->level;
            $jmlpeg = IndikatorBox::orderby('nilai_tb','desc')->count();
            $params = $request->query();
            $models = DataApiSimadig::paginate(10);     
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.getdatasimadig' , [
                    'layout'        => $this->layout,
                    'jmlpeg'        => $jmlpeg,
                    'params'        => $params,
                    'model'        => $models,
                   // 'queryna'       =>$models->dd(),
                   
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }

    }
    public function postGetDataSimadig(Request $request)
    {  
      
        //clear table api simadig
        DataApiSimadig::truncate();
        $pegna = IndikatorBox::orderby('nilai_tb','desc')->get();
        // $pegna = IndikatorBox::where('id_instansi',1)    
        //         ->orderby('nilai_tb','desc')
        //         //->limit(20)
        //         ->get();
        $jmlpeg = IndikatorBox::orderby('nilai_tb','desc')->count();
        //dd($pegna);
        $pg="";
       foreach($pegna as $peg){
           
           $api_pend = collect($peg->detPeg->getRiwayatPendidikan);
            $api_jab = collect($peg->detPeg->getRiwayatJabatan);
            $api_dt = collect($peg->detPeg->getRiwayatDT);
            $api_df = collect($peg->detPeg->getRiwayatDF);
            $api_latih = $api_dt." ".$api_df;
            $api_sert = collect($peg->detPeg->getRiwayatSertifikasi);

            DataApiSimadig::create([ 
                'nip'                           => $peg->nip,
                'data_talentabox'               => $peg->nilai_tb,
                'data_api_pendidikan'           => $api_pend,
                'data_api_jabatan'              => $api_jab,
                'data_api_pelatihan'            => $api_latih,
                'data_api_diklat_teknis'        => $api_dt,
                'data_api_diklat_fungsional'    => $api_df,
                'data_api_sertifikasi'          => $api_sert,
            
            
            ]);
             
        } 
        
        return response()->json(
            [
                //'data'      =>$pegna,
                
                
                'success'   =>true,
                //'message'   => 'ID '.$pegna ,
                'message'   => 'Jmlpeg: '.$jmlpeg.' peg: '.$pegna,
            ]
        );
    }
    //tes load getdata
    public function getGetDataSimadig(Request $request)
    {  
      
        //clear table api simadig
        //DataApiSimadig::truncate();
        //$pegna = IndikatorBox::orderby('nilai_tb','desc')->get();
        $pegna = IndikatorBox::where('id_instansi',1)    
                ->orderby('nilai_tb','desc')
                //->limit(10)
                ->get();
        $jmlpeg = IndikatorBox::orderby('nilai_tb','desc')->count();
        //dd($pegna);
        
       foreach($pegna as $peg){
            // DataApiSimadig::create([ 
            //     'nip'                       => $peg->nip,
            //     'data_talentabox'           => $peg->nilai_tb,
            //     'data_api_pendidikan'       => 0,
            //     'data_api_jabatan'          => 0,
            //     'data_api_pelatihan'        => 0,
            //     'data_api_sertifikasi'      => 0,
            
            
            // ]);
            // $api_pend=IndikatorBox::getAllApiSimadig($peg->nip,"pendidikan");
            // $api_jab=IndikatorBox::getAllApiSimadig($peg->nip,"jabatan");
            // $api_latih=IndikatorBox::getAllApiSimadig($peg->nip,"pelatihan");
           
            // $api_sert=IndikatorBox::getAllApiSimadig($peg->nip,"sertifikasi");

            $api_pend = collect($peg->detPeg->getRiwayatPendidikan);
            $api_jab = collect($peg->detPeg->getRiwayatJabatan);
            $api_dt = collect($peg->detPeg->getRiwayatDT);
            $api_df = collect($peg->detPeg->getRiwayatDF);
            $api_latih = $api_dt."<hr>".$api_df;
            $api_sert = collect($peg->detPeg->getRiwayatSertifikasi);

           

            echo "NIP: ".$peg->nip."<br><hr>";
            echo "Pend: ".$api_pend."<br><hr>";
            echo "Jabatan : ".$api_jab."<br><hr>"; 
            echo "Pelatihan : ".$api_latih."<br><hr>"; 
            echo "Sertifikat : ".$api_sert."<br><hr>"; 
            
           
            
             
        } 
      
    }
    //18 nov 2023
    //grafik dan rekap kompetensi
    //tes load getdata
     //getData SIMADIG API
     public function getdatakompetensi(Request $request)
     {
         if(Auth::guard('admin')->check()){  
             $bio  = Auth::guard('admin')->user();    
             $level=$bio->level;
             $jmlpeg = IndikatorBox::orderby('nilai_tb','desc')->count();
             $params = $request->query();
             $models = DataKompetensi::paginate(10);     
             //return view('/pelamar/datatable', compact('pelamars'));
                 return view('admin.getdatakompetensi' , [
                     'layout'        => $this->layout,
                     'jmlpeg'        => $jmlpeg,
                     'params'        => $params,
                     'model'        => $models,
                    // 'queryna'       =>$models->dd(),
                    
                      
             ]);
         }else{
                 return view('admin.login',[
                     'layout' => $this->layout 
                   ]);
                 }
 
     }
     public function postGetDataKompetensi(Request $request)
     {  
       
         //clear table api simadig
         DataKompetensi::truncate();
         $pegna = IndikatorBox::orderby('nilai_tb','desc')->get();
         // $pegna = IndikatorBox::where('id_instansi',1)    
         //         ->orderby('nilai_tb','desc')
         //         //->limit(20)
         //         ->get();
         $jmlpeg = IndikatorBox::orderby('nilai_tb','desc')->count();
         //dd($pegna);
         $pg="";
        foreach($pegna as $peg){
            
            $nip=$peg->nip;
            $id_instansi=$peg->id_instansi;
            
            $alljpm         = $peg->getJPM;
            $jpmnama        = $peg->getJPM->nama;
            $jpmjabatan     = $peg->getJPM->jabatan;
            $jpminstansi    = $peg->getJPM->instansi;
            $jpmnilai_komp1 = $peg->getJPM->nilai_komp1;
            $jpmnilai_komp2 = $peg->getJPM->nilai_komp2;
            $jpmnilai_komp3 = $peg->getJPM->nilai_komp3;
            $jpmnilai_komp4 = $peg->getJPM->nilai_komp4;
            $jpmnilai_komp5 = $peg->getJPM->nilai_komp5;
            $jpmnilai_komp6 = $peg->getJPM->nilai_komp6;
            $jpmnilai_komp7 = $peg->getJPM->nilai_komp7;
            $jpmnilai_komp8 = $peg->getJPM->nilai_komp8;
            $jpmnilai_komp9 = $peg->getJPM->nilai_komp9;
            $jpmskor        = $peg->getJPM->skor;
            $jpmlevelskj    = $peg->getJPM->levelskj;
            $jpmstandarskj  = $peg->getJPM->jpmstandarskj;
            $jpmnilai        = $peg->getJPM->jpm;
            $jpmkategori    = $peg->getJPM->kategori;
            $jpminputby     = $peg->getJPM->inputby;
            $jpmtglinput     = $peg->getJPM->tglinput;
 
             DataKompetensi::create([ 
                 'nip'                          => $peg->nip,
                 'nama'                         => $peg->nama,
                 'jabatan'                      => $peg->jabatan,
                 'id_jenis_jabatan'             => $peg->id_jenis_jabatan,
                 'jenis_jabatan'                => $peg->jenis_jabatan,
                 'id_instansi'                  => $peg->id_instansi,
                 'nama_instansi'                => $peg->nama_instansi,
                 'nilai_integritas'             => $jpmnilai_komp1,
                 'nilai_kerjasama'              => $jpmnilai_komp2,
                 'nilai_komunikasi'             => $jpmnilai_komp3,
                 'nilai_pelayanan'              => $jpmnilai_komp4,
                 'nilai_pengembangan'           => $jpmnilai_komp5,
                 'nilai_orientasi'              => $jpmnilai_komp6,
                 'nilai_perubahan'              => $jpmnilai_komp7,
                 'nilai_keputusan'              => $jpmnilai_komp8,
                 'nilai_perekat'                => $jpmnilai_komp9,
                 'skor'                         => $jpmskor,
                 'levelskj'                     => $jpmlevelskj,
                 'standarskj'                   => $jpmstandarskj,
                 'jpm'                          => $jpmnilai,
                 'kategori'                     => $jpmkategori,
                 'tglinput'                     => $jpmtglinput,
                 'inputby'                      => $jpminputby,
                 
             
             ]);
              
         } 
         
         return response()->json(
             [
                 //'data'      =>$pegna,
                 
                 
                 'success'   =>true,
                 //'message'   => 'ID '.$pegna ,
                 'message'   => 'Jmlpeg: '.$jmlpeg.' peg: '.$pegna,
             ]
         );
     }

    public function getGetDataJPM(Request $request)
    {  
      
        //clear table api simadig
        //DataApiSimadig::truncate();
        //$pegna = IndikatorBox::orderby('nilai_tb','desc')->get();
        $pegna = IndikatorBox::where('id_instansi',1)    
                ->orderby('nilai_tb','desc')
                //->limit(10)
                ->get();
        $jmlpeg = IndikatorBox::orderby('nilai_tb','desc')->count();
        //dd($pegna);
        
       foreach($pegna as $peg){
            
            // $api_pend=IndikatorBox::getAllApiSimadig($peg->nip,"pendidikan");
            // $api_jab=IndikatorBox::getAllApiSimadig($peg->nip,"jabatan");
            // $api_latih=IndikatorBox::getAllApiSimadig($peg->nip,"pelatihan");
           
            // $api_sert=IndikatorBox::getAllApiSimadig($peg->nip,"sertifikasi");
            $nip=$peg->nip;
            $id_instansi=$peg->id_instansi;
            
            $alljpm         = $peg->getJPM;
            $jpmnama        = $peg->getJPM->nama;
            $jpmjabatan     = $peg->getJPM->jabatan;
            $jpminstansi    = $peg->getJPM->instansi;
            $jpmnilai_komp1 = $peg->getJPM->nilai_komp1;
            $jpmnilai_komp2 = $peg->getJPM->nilai_komp2;
            $jpmnilai_komp3 = $peg->getJPM->nilai_komp3;
            $jpmnilai_komp4 = $peg->getJPM->nilai_komp4;
            $jpmnilai_komp5 = $peg->getJPM->nilai_komp5;
            $jpmnilai_komp6 = $peg->getJPM->nilai_komp6;
            $jpmnilai_komp7 = $peg->getJPM->nilai_komp7;
            $jpmnilai_komp8 = $peg->getJPM->nilai_komp8;
            $jpmnilai_komp9 = $peg->getJPM->nilai_komp9;
            $jpmskor        = $peg->getJPM->skor;
            $jpmlevelskj    = $peg->getJPM->levelskj;
            $jpmstandarskj  = $peg->getJPM->jpmstandarskj;
            $jpmkategori    = $peg->getJPM->kategori;
            $jpminputby     = $peg->getJPM->inputby;
            $jpmtglinput     = $peg->getJPM->tglinput;
            
         

            echo "NIP: ".$peg->nip."<br><hr>";
            echo "All: ".$alljpm."<br><hr>";
            // echo "Jabatan : ".$api_jab."<br><hr>"; 
            // echo "Pelatihan : ".$api_latih."<br><hr>"; 
            // echo "Sertifikat : ".$api_sert."<br><hr>"; 
            
           
            
             
        } 
      
    }
    public function grafikkompetensi(Request $request){
        if(Auth::guard('admin')->check()){  
         
        $idinsta=1;
        $allpd = Instansi::where('id_instansi_jenis',1)
                  ->where('status_aktif',1)
                  ->get();
        $insta = Instansi::where('id',$idinsta)->first();
             
        //dd($allpd);


        $params = $request->query();
        $queryIB = DataKompetensi::query($params);
        $queryIB->latest();
        //$cIB->latest();

        $allIB = $queryIB->paginate(10);
        $jmlIB = $queryIB->count();

        if(empty($params['idpd'])){
            $paramID='';
        }else{
            $paramID=$params['idpd'];
        }


        $kategori1 = DataKompetensi::kat1($params)->count();
        $kategori2 = DataKompetensi::kat2($params)->count();
        $kategori3 = DataKompetensi::kat3($params)->count();
        $kategori4 = DataKompetensi::katnull($params)->count();
         
        $integritas1 = DataKompetensi::integritas1($params)->count();
        $integritas2 = DataKompetensi::integritas2($params)->count();
        $integritas3 = DataKompetensi::integritas3($params)->count();
        $kerjasama1 = DataKompetensi::kerjasama1($params)->count();
        $kerjasama2 = DataKompetensi::kerjasama2($params)->count();
        $kerjasama3 = DataKompetensi::kerjasama3($params)->count();
        $komunikasi1 = DataKompetensi::komunikasi1($params)->count();
        $komunikasi2 = DataKompetensi::komunikasi2($params)->count();
        $komunikasi3 = DataKompetensi::komunikasi3($params)->count();
        $orientasi1 = DataKompetensi::orientasi1($params)->count();
        $orientasi2 = DataKompetensi::orientasi2($params)->count();
        $orientasi3 = DataKompetensi::orientasi3($params)->count();
        $pelayanan1 = DataKompetensi::pelayanan1($params)->count();
        $pelayanan2 = DataKompetensi::pelayanan2($params)->count();
        $pelayanan3 = DataKompetensi::pelayanan3($params)->count();
        $pengembangan1 = DataKompetensi::pengembangan1($params)->count();
        $pengembangan2 = DataKompetensi::pengembangan2($params)->count();
        $pengembangan3 = DataKompetensi::pengembangan3($params)->count();
        $perubahan1 = DataKompetensi::perubahan1($params)->count();
        $perubahan2 = DataKompetensi::perubahan2($params)->count();
        $perubahan3 = DataKompetensi::perubahan3($params)->count();
        $keputusan1 = DataKompetensi::keputusan1($params)->count();
        $keputusan2 = DataKompetensi::keputusan2($params)->count();
        $keputusan3 = DataKompetensi::keputusan3($params)->count();
        $perekat1 = DataKompetensi::perekat1($params)->count();
        $perekat2 = DataKompetensi::perekat2($params)->count();
        $perekat3 = DataKompetensi::perekat3($params)->count();
        
        //dd($queryIB);
        return view('admin/grafik_kompetensi', [
            'layout'        =>  $this->layout,
            'model'         => $allIB->append($params),
            'jmlIB'         => $jmlIB,
            'params'        => $params,
            'allpd'         => $allpd,
            'insta'         => $allpd,
            'pd'            => $insta,
            'selpd'         => $insta,
            'idinsta'       => $paramID,
            'kategori1'     => $kategori1,
            'kategori2'     => $kategori2,
            'kategori3'     => $kategori3,
            'kategori4'     => $kategori4,
            'integritas1'     => $integritas1,
            'integritas2'     => $integritas2,
            'integritas3'     => $integritas3,
            'kerjasama1'     => $kerjasama1,
            'kerjasama2'     => $kerjasama2,
            'kerjasama3'     => $kerjasama3,
            'komunikasi1'     => $komunikasi1,
            'komunikasi2'     => $komunikasi2,
            'komunikasi3'     => $komunikasi3,
            'orientasi1'     => $orientasi1,
            'orientasi2'     => $orientasi2,
            'orientasi3'     => $orientasi3,
            'pelayanan1'     => $pelayanan1,
            'pelayanan2'     => $pelayanan2,
            'pelayanan3'     => $pelayanan3,
            'pengembangan1'     => $pengembangan1,
            'pengembangan2'     => $pengembangan2,
            'pengembangan3'     => $pengembangan3,
            'perubahan1'     => $perubahan1,
            'perubahan2'     => $perubahan2,
            'perubahan3'     => $perubahan3,
            'keputusan1'     => $keputusan1,
            'keputusan2'     => $keputusan2,
            'keputusan3'     => $keputusan3,
            'perekat1'     => $perekat1,
            'perekat2'     => $perekat2,
            'perekat3'     => $perekat3,
            
            
            
            
            

            

        ]);
        
        }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function rekapkompetensitalenta(Request $request){
        if(Auth::guard('admin')->check()){  
         
            $idinsta=1;
            $semuapd = Instansi::where('status_aktif',1)
                      ->get();
            $allpd = Instansi::where('id_instansi_jenis',1)
                      ->where('status_aktif',1)
                      ->get();
            $insta = Instansi::where('id',$idinsta)->first();
                 
            //dd($allpd);
    
    
            $params = $request->query();
            // $queryIB = IndikatorBox::queryinsta($params);
            // $queryIB->latest();
            // $allIB = $queryIB->paginate(10);
            // $model = $allIB->append($params);
            // //$allIB = $queryIB->get();
            if(!empty($params)){
               
                if(!empty($params['idpd'])){$idpd=$params['idpd'];}else{$idpd="";}
                

                $arrpar="?idpd=".$idpd;
            
            }else{
                $arrpar="";
            }

            $queryIB = IndikatorBox::queryinsta($params);

            

            $queryIB->latest();
            $allIB = $queryIB->paginate(10);
            $jmlIB = $queryIB->count();
    
            if(empty($params['idpd'])){
                $paramID='';
            }else{
                $paramID=$params['idpd'];
            }
            $model=IndikatorBox::queryinsta($params)->latest()->paginate(10);
            //dd($queryIB);
            return view('admin/rekap_kompetensitalenta', [
                'layout'        => $this->layout,
               // 'model'         => $allIB->append($params),
                'model'         => $model,
                'jmlIB'         => $jmlIB,
                'params'        => $params,
                'allpd'         => $semuapd,
                'insta'         => $allpd,
                'pd'            => $insta,
                'selpd'         => $insta,
                'idinsta'       => $paramID,
                'arr_param'        => $arrpar,
               
    
            ]);
            
            }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }
    }
    public function exportrekapkomptalenta(Request $request) 
    {
        $params = $request->query();
          
           // dd($params);

        $now=date('Ymdhis');
        $namafile="fileRekapKompTalenta_".$now.".xlsx";
        //return Excel::download(new NineBoxExport, $namafile);
        return Excel::download(new RekapKompTalentaExport(
            "excel.rekapkomptalenta", $params 
        ), $namafile);
    }

    public function printrekapkomptalenta(Request $request)
    {
        if(Auth::guard('admin')->check()){  
             
            $params = $request->query();
            if(!empty($params)){
                $arrpar="?idpd=".$params['idpd'];
            
            }else{
                $arrpar="";
            }

            $queryIB = IndikatorBox::query($params);

            

            $queryIB->latest();
            $allIB = $queryIB->get();

            //dd($allIB);
             
             
                return view('admin/print_rekapkomptalenta' , [
                    'layout' => $this->layout,
                    'model'         => $allIB,
                    'params'        => $params,
                    'jmpeg'         => count($allIB),
                    'arr_params'        => $arrpar,
                    
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    //new upgrade
    //getdata indikatorbox per batch
    //22.11.2024
    public function getdataindikatorbox(Request $request)
    {
         if(Auth::guard('admin')->check()){  
             $bio  = Auth::guard('admin')->user();    
             $level=$bio->level;
             
            

             $api_insta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi");
             $instana = $api_insta->json();
             $rsinsta = collect($instana);
             $jmlpd=collect($instana)->count();

             $chunk1 = $rsinsta->splice(0,32);
             $chunk2 = $rsinsta->splice(0,40);
             $chunk3 = $rsinsta->splice(0,30);
             $chunk4 = $rsinsta->splice(0,38);
             $chunk5 = $rsinsta->splice(0,60);
             $chunk6 = $rsinsta->splice(0,40);
            
            //  //deklarasi totpegawai per que
            //  $tp1=0;
            //  $tp2=0;
            //  $tp3=0;
            //  $tp4=0;
            //  $tp5=0;
            //  $tp6=0;
            //  $tp7=0;
             
            //  foreach($chunk6 as $skpd1){
            //     $pd = (object) $skpd1;
            //     $idinsta=$pd->id;
            //     $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinsta");
            //     $pegna = $respeg->json();
            //     $jmlpeg=collect($pegna)->count();
            //     $tp1=$tp1+$jmlpeg;
               
                
            //  }
            //  dd($tp1);
            //  foreach($chunk2 as $skpd2){
            //     $pd = (object) $skpd2;
            //     $idinsta=$pd->id;
            //     $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinsta");
            //     $pegna = $respeg->json();
            //     $jmlpeg=collect($pegna)->count();
            //     $tp2=$tp2+$jmlpeg;
               
                
            //  }
            //  foreach($chunk3 as $skpd3){
            //     $pd = (object) $skpd3;
            //     $idinsta=$pd->id;
            //     $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinsta");
            //     $pegna = $respeg->json();
            //     $jmlpeg=collect($pegna)->count();
            //     $tp3=$tp3+$jmlpeg;
               
                
            //  }
            //  foreach($chunk4 as $skpd4){
            //     $pd = (object) $skpd4;
            //     $idinsta=$pd->id;
            //     $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinsta");
            //     $pegna = $respeg->json();
            //     $jmlpeg=collect($pegna)->count();
            //     $tp4=$tp4+$jmlpeg;
               
                
            //  }
            //  foreach($chunk5 as $skpd5){
            //     $pd = (object) $skpd5;
            //     $idinsta=$pd->id;
            //     $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinsta");
            //     $pegna = $respeg->json();
            //     $jmlpeg=collect($pegna)->count();
            //     $tp5=$tp5+$jmlpeg;
               
                
            //  }
            //  foreach($chunk6 as $skpd6){
            //     $pd = (object) $skpd6;
            //     $idinsta=$pd->id;
            //     $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinsta");
            //     $pegna = $respeg->json();
            //     $jmlpeg=collect($pegna)->count();
            //     $tp6=$tp6+$jmlpeg;
               
                
            //  }
            //  foreach($chunk7 as $skpd7){
            //     $pd = (object) $skpd7;
            //     $idinsta=$pd->id;
            //     $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinsta");
            //     $pegna = $respeg->json();
            //     $jmlpeg=collect($pegna)->count();
            //     $tp7=$tp7+$jmlpeg;
               
                
            //  }
            //  dd($tp1);
            //  dd($tp2);
            //  $respeg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$id");
            //  $pegna = $respeg->json();
            //  $jmlpeg=collect($pegna)->count();  


             //$jmlpeg = IndikatorBox::orderby('nilai_tb','desc')->count();
             $params = $request->query();
            //  $models = DataKompetensi::paginate(10);   
            $models = IndikatorBox::paginate(10); 
            
             //return view('/pelamar/datatable', compact('pelamars'));
                 return view('admin.getdataindikatorbox' , [
                     'layout'        => $this->layout,
                      
                     'params'        => $params,
                     'model'        => $models,
                     'allpd'        => $rsinsta,    
                     'jmlpd'        => $jmlpd,
                     'chunk1'        => $chunk1,
                     'chunk2'        => $chunk2,
                     'chunk3'        => $chunk3,
                     'chunk4'        => $chunk4,
                     'chunk5'        => $chunk5,
                     'chunk6'        => $chunk6,
                     
                    // 'queryna'       =>$models->dd(),
                    
                      
             ]);
         }else{
                 return view('admin.login',[
                     'layout' => $this->layout 
                   ]);
                 }
 
    }
    public function postGetdataIndikatorBox(Request $request)
    {  
        // dd($request);
        // $api_insta = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/instansi");
        // $instana = $api_insta->json();
        // $jmlpd=collect($instana)->count();  
        // $rsinsta = collect($instana);
        //$rsinsta = collect($instana)->slice(0, 10);
        
       // dd($rsinsta);
       //clear table indikator
       //IndikatorBox::truncate();
        //clear IB per PD
       
        $idpd= 1; 
        $rsinsta=$request['que'];
        $jmlpd=collect($rsinsta)->count();  

        $idbatch=$request['idbatch'];

         //clear IB per batch
          $delIB = IndikatorBox::whereNull('ket')
                                ->orwhere('ket',$idbatch)
                                ->delete();
        //$delIB = IndikatorBox::where('id_ques', $idbatch)->delete();

         //loop PD
       $jmlpeg=0;
       $totpeg=0;
       foreach($rsinsta as $skpd){
            $pd = (object) $skpd;
           //pegawai api
           //$idinstansi= $request['idinstansi']; 
            $idinstansi=$pd->id;       
            $nminsta=Instansi::where('id', $idinstansi)->first();
    
            $api_peg = Http::get("https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai&id_instansi=$idinstansi");
            $pegna = $api_peg->json();
            $rspeg = collect($pegna);
            $jmlpeg=collect($pegna)->count();  
            $totpeg=$totpeg+$jmlpeg;
           
            
            //insert table indikator
            
            foreach($pegna as $pegs){
                $peg =  (object) $pegs;
                //nilai inov pres
                $ins = IndikatorBox::create([ 
                        'id_instansi'           => $peg->id_instansi,
                        'nama_instansi'         => $nminsta->nama,
                        'nip'                   => $peg->nip,
                        'nama'                  => $peg->nama,
                        'id_jabatan'            => $peg->id_jabatan,
                        'nilai_skp'             => 0,
                        'nilai_inovasi'         => 0,
                        'nilai_prestasi'        => 0,
                        'nilai_indisipliner'    => 0,
                        'nilai_kompetensi'      => 0,
                        'nilai_kualifikasi'     => 0,
                        'nilai_riwayat_jabatan' => 0,
                        'nilai_riwayat_diklat'  => 0,
                        'nilai_kecerdasan'      => 0,
                        'ket'                   => $idbatch
                        
                    
                    ]);
            
            } 
            //edit data indikator
            $indbox= IndikatorBox::where('id_instansi',$idinstansi)->get();
            if(!empty(count($indbox))){
                foreach($indbox as $ib){
                    $np = NilaiPotensi::where('nip',$ib->nip)->first();
                    //SKP
                    if($ib->detPeg->getSKP->kuadranKinerja == "SANGAT BAIK"){
                        $nilaiskp=80;
                    }elseif($ib->detPeg->getSKP->kuadranKinerja == "BAIK"){
                        $nilaiskp=66;
                    }elseif($ib->detPeg->getSKP->kuadranKinerja == "BUTUH PERBAIKAN"){
                        $nilaiskp=33;
                    }else{
                        $nilaiskp=0;
                    }
                    //KUALIFIKASI
                    $tkpend_terakhir=str_replace(['.','-'],'',$ib->detPeg->getKualifikasi->Pend_trakhir_Terakhir);
                    if($tkpend_terakhir == "S3" ){
                        $nilaikualifikasi=20;
                    }elseif($tkpend_terakhir == "S2"){
                        $nilaikualifikasi=15;
                    }elseif(($tkpend_terakhir == "S1") or ($tkpend_terakhir == "DIV")  or ($tkpend_terakhir == "D4") or ($tkpend_terakhir == "SPG")){
                        $nilaikualifikasi=10;
                    }elseif(($tkpend_terakhir == "D3") or  ($tkpend_terakhir == "DIII")  or ($tkpend_terakhir == "SPK") ){
                        $nilaikualifikasi=7.5;
                    }else{
                        $nilaikualifikasi=5;
                    }

                    //Riwayat Jabatan
                    $thnayena=date('Y');
                    $thncpns=substr($ib->nip, 8, 4);
                    $thnjab=$thnayena-$thncpns;
                    //$nilaijab=$thnjab;
                    if($thnjab >= 20){
                        $nilaijab=10;
                    }elseif(($thnjab <= 19) && ($thnjab >= 10)){
                        $nilaijab=6.6;
                    }elseif(($thnjab <= 9) && ($thnjab >= 5)){
                        $nilaijab=3.3;
                    }elseif(($thnjab <= 4) && ($thnjab >= 1)){
                        $nilaijab=1;
                    }else{
                        $nilaijab=0;
                    }
                    //riwayat Diklat
                    $ds=sizeof($ib->detPeg->getDiklatStruktural);
                    $df=sizeof($ib->detPeg->getDiklatFungsional);
                    $dt=sizeof($ib->detPeg->getDiklatTeknis);

                    if($ds == 0){$jds=0;}else{$jds=1;}
                    if($df == 0){$jdf=0;}else{$jdf=1;}
                    if($dt == 0){$jdt=0;}else{$jdt=1;}
                    
                    $totdik = $jds+$jdf+$jdt;
                    if($totdik == 0){
                        $nilaidiklat=0;
                    }elseif($totdik == 1){
                        $nilaidiklat=3.3;
                    }elseif($totdik == 2){
                        $nilaidiklat=6.6;
                    }elseif($totdik == 3){
                        $nilaidiklat=10;
                    }

                    //indisipliner
                    $dis=sizeof($ib->detPeg->getIndispliner);
                    $tkhukuman= $ib->detPeg->getIndispliner;
                    
                    $nilaiindisipliner=0;
                    $idtkhukum="";
                    if(!empty($ib->detPeg->getIndispliner)){
                        //$idtkhukum=$tkhukuman->first() ;
                        foreach($tkhukuman as $tkhuk){
                        $idtkhukum=$tkhuk->id_tingkat_hukuman;

                            if($tkhuk->id_tingkat_hukuman=="3"){
                                $nilaiindisipliner = "-50";
                            }elseif($tkhuk->id_tingkat_hukuman=="2"){
                                $nilaiindisipliner = "-30";
                            }elseif($tkhuk->id_tingkat_hukuman=="1"){
                                $nilaiindisipliner = "-10";
                            }else{
                                $nilaiindisipliner="";
                            }
                        }
                    


                    } 
                    //JPM
                    $njpm=$ib->getJPM->kategori;
                    if($njpm=="Memenuhi Syarat"){
                        $nilaijpm=50;
                    }elseif($njpm=="Masih Memenuhi Syarat"){
                        $nilaijpm=30;
                    }elseif($njpm=="Kurang Memenuhi Syarat"){
                        $nilaijpm=10;
                    }else{
                        $nilaijpm=0;
                    }
                    //KecerdasanUmum
                    $ncer=$ib->getCerdas->predikat;
                    if($ncer=="Very Superior"){
                        $nilaicer=10;
                    }elseif($ncer=="Superior"){
                        $nilaicer=7.5;
                    }elseif($ncer=="High Average"){
                        $nilaicer=5;
                    }elseif($ncer=="Average"){
                        $nilaicer=2.5;
                    }elseif($ncer=="Low Average"){
                        $nilaicer=1;
                    }elseif($ncer=="Low"){
                        $nilaicer=0.5;
                    }else{
                        $nilaicer=0;
                    }
                    //nilai import
                    if(empty($np->nilai_inovasi)){
                        $nilaiinovasi=0;
                    }else{
                        $nilaiinovasi=$np->nilai_inovasi;
                    }
                    if(empty($np->nilai_prestasi)){
                        $nilaiprestasi=0;
                    }else{
                        $nilaiprestasi=$np->nilai_prestasi;
                    }
                    //sumbu x y
                    $nilaiy=$nilaiskp+$nilaiinovasi+$nilaiprestasi+$nilaiindisipliner;
                    
                    $nilaix=$nilaijpm+$nilaikualifikasi+$nilaijab+$nilaidiklat+$nilaicer;
    
                    if(($nilaiy <= 34) and ($nilaix < 51)){
                        $nilaitb="1";
                        $stylena="bg-danger";
                        $uraianna="Kinerja di bawah ekspektasi dan potensi rendah";
                    }elseif(($nilaiy > 34 && $nilaiy < 67) and ($nilaix < 51)){
                        $nilaitb="2";
                        $stylena="bg-danger";
                        $uraianna="Kinerja sesuai ekspektasi dan potensi rendah";
                    }elseif(($nilaiy <= 34) and ($nilaix >= 51 && $nilaix < 81)){
                        $nilaitb="3";
                        $stylena="bg-danger";
                        $uraianna="Kinerja di bawah ekspektasi dan potensi menengah";
                    }elseif(($nilaiy >= 67) and ($nilaix < 51 )){
                        $nilaitb="4";
                        $stylena="bg-warning";
                        $uraianna="Kinerja di atas ekspektasi dan potensi rendah";
                    }elseif(($nilaiy > 34 && $nilaiy < 67) and ($nilaix >= 51 && $nilaix < 81)){
                        $nilaitb="5";
                        $stylena="bg-warning";
                        $uraianna="Kinerja sesuai ekspektasi dan potensi menengah";
                    }elseif(($nilaiy <= 34 ) and ($nilaix >= 81)){
                        $nilaitb="6";
                        $stylena="bg-warning";
                        $uraianna="Kinerja di bawah ekspektasi dan potensi tinggi";
                    }elseif(($nilaiy >= 67 ) and ($nilaix >= 51 && $nilaix < 81)){
                        $nilaitb="7";
                        $stylena="bg-success";
                        $uraianna="Kinerja di atas ekspektasi dan potensi menengah";
                    }elseif(($nilaiy > 34 && $nilaiy < 67 ) and ($nilaix >= 81 )){
                        $nilaitb="8";
                        $stylena="bg-success";
                        $uraianna="Kinerja sesuai ekspektasi dan potensi tinggi";
                    }elseif(($nilaiy >= 67 ) and ($nilaix >= 81)){
                        $nilaitb="9";
                        $stylena="bg-primary";
                        $uraianna="Kinerja di atas ekspektasi dan potensi tinggi";
                    }else{
                        $nilaitb="0";
                        $stylena="bg-danger";
                        $uraianna="";
                    }

                    //cek jabatan
                    $namajabatan    = strtoupper($ib->detPeg->JABATAN);
                    $eselon         = strtoupper($ib->detPeg->ESELON);
                    $jenisjabatan   = strtoupper($ib->detPeg->Jns_Jbtan);

                    if(($eselon=="II-A") and  ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="1";
                    }elseif(($eselon=="II-B") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="1";
                    }elseif(($eselon=="III-A") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="2";
                    }elseif(($eselon=="III-B") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="2";
                    }elseif(($eselon=="IV-A") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="3";
                    }elseif(($eselon=="IV-B") and ($jenisjabatan=="STRUKTURAL")){
                        $id_jenisjabatan="3";
                    }elseif(($eselon=="NON ESELON") and ($jenisjabatan=="PELAKSANA")){
                        $id_jenisjabatan="4";
                    }elseif(($eselon=="NON ESELON") and ($jenisjabatan=="FUNGSIONAL")){
                        $id_jenisjabatan="5";
                    }else{
                        $id_jenisjabatan="0";
                    } 

                    // //CEK Nilai Kinerja
                    if ($np) {
                        // Find and update the record in the IndikatorBox table
                        $indikatorBox = IndikatorBox::where('nip', $np->nip)->first();
                        
                        
                        
                        if ($indikatorBox) {
                            $indikatorBox->update([
                                'id_jenis_jabatan'      => $id_jenisjabatan,
                                'jenis_jabatan'         => $jenisjabatan,
                                'eselon'                => $eselon,
                                'jabatan'               => $namajabatan,
                                'nilai_inovasi'         => $nilaiinovasi,
                                'nilai_prestasi'        => $nilaiprestasi,
                                'nilai_skp'             => $nilaiskp,
                                'nilai_kualifikasi'     => $nilaikualifikasi,
                                'nilai_riwayat_jabatan' => $nilaijab,
                                'nilai_indisipliner'    => $nilaiindisipliner,
                                'nilai_kompetensi'      => $nilaijpm,
                                'nilai_riwayat_diklat'  => $nilaidiklat,
                                'nilai_kecerdasan'      => $nilaicer,
                                'nilai_x'               => $nilaix,
                                'nilai_y'               => $nilaiy,
                                'nilai_tb'              => $nilaitb,
                                'uraian_tb'             => $uraianna,
                            
                                
                            ]);
                        }else{
                            $indikatorBox->update([
                                'id_jenis_jabatan'      => $id_jenisjabatan,
                                'jenis_jabatan'         => $jenisjabatan,
                                'eselon'                => $eselon,
                                'jabatan'               => $namajabatan,
                                'nilai_inovasi'         => $nilaiinovasi,
                                'nilai_prestasi'        => $nilaiprestasi,
                                'nilai_skp'             => $nilaiskp,
                                'nilai_kualifikasi'     => $nilaikualifikasi,
                                'nilai_riwayat_jabatan' => $nilaijab,
                                'nilai_indisipliner'    => $nilaiindisipliner,
                                'nilai_kompetensi'      => $nilaijpm,
                                'nilai_riwayat_diklat'  => $nilaidiklat,
                                'nilai_kecerdasan'      => $nilaicer,
                                'nilai_x'               => $nilaix,
                                'nilai_y'               => $nilaiy,
                                'nilai_tb'              => $nilaitb,
                                'uraian_tb'             => $uraianna,
                                
                            
                            
                            ]);
                        }
                    }else{
                        $indikatorBox = IndikatorBox::where('nip', $ib->nip)->first();
                        $indikatorBox->update([
                            'id_jenis_jabatan'      => $id_jenisjabatan,
                            'jenis_jabatan'         => $jenisjabatan,
                            'eselon'                => $eselon,
                            'jabatan'               => $namajabatan,
                            'nilai_inovasi'         => $nilaiinovasi,
                            'nilai_prestasi'        => $nilaiprestasi,
                            'nilai_skp'             => $nilaiskp,
                            'nilai_kualifikasi'     => $nilaikualifikasi,
                            'nilai_riwayat_jabatan' => $nilaijab,
                            'nilai_indisipliner'    => $nilaiindisipliner,
                            'nilai_kompetensi'      => $nilaijpm,
                            'nilai_riwayat_diklat'  => $nilaidiklat,
                            'nilai_kecerdasan'      => $nilaicer,
                            'nilai_x'               => $nilaix,
                            'nilai_y'               => $nilaiy,
                            'nilai_tb'              => $nilaitb,
                            'uraian_tb'             => $uraianna,
                        
                            
                        ]);
                    }
                }
            
            }
       }


        return response()->json(
            [
                'data'      =>$idpd,
                'success'   =>true,
                'message'   => 'batch: '.$idbatch. ' JmlPD: '.$jmlpd.' TotPeg: '.$totpeg,
            ]
        );


    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (auth()->guard('admin')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            return redirect()->intended('/admin');
        } else {
            
            /*    
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
                */
                return back()->withErrors([
                    'email' => 'Username/Email tidak sesuai, silahkan ulangi.',
                    'password' => 'Password tidak sesuai.',
                ]);
        }
    }
    public function postLogout()
    {
        auth()->guard('admin')->logout();
        session()->flush();

        return redirect()->route('admin.login');
    }
    //data user
    //user
    public function useradmin(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                $users = Admin::Where('level',1)->get();
            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.useradmin' , [
                    'layout' => $this->layout,
                    'pelamars' =>$users,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function adduseradmin()
    {
        if(Auth::guard('admin')->check()){  
       
            return view('admin/adduseradmin',[
            'layout' => $this->layout,
             
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAdduseradmin(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:admins',
         
        'password' => 'required|min:6',
        ]);
         
        
        Admin::create([
            'name' => $request['name'],
            'nip' => $request['nip'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password'])
          ]);
       
        return Redirect::to("/admin/useradmin")->with('success','Selamat, Anda berhasil untuk melakukan Registrasi');
    }
    
    public function edituseradmin($id)
    {
        $us = Admin::where('id', $id)->first();
       
          return view('admin/edituseradmin',[
            'layout' => $this->layout,
            'user' =>$us    
             
        ]);

       // return view('register');
    }
    public function postEdituseradmin(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $email=$request->input('email');
                Admin::where('email', $email)
                ->update([
                    'name' => $request['name'],
                    'nip' => $request['nip'],
                    'level' => $request['level'],
                    'password' => Hash::make($request['password'])
                
                
            ]);
        
                return Redirect::to("/admin/useradmin")->with('success',' Edit User berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    //changepass
    public function changepass()
    {
        if(Auth::guard('admin')->check()){ 

            $bio  = Auth::guard('admin')->user();
             return view('admin/changepass',[
                'layout' => $this->layout,
                'user' =>$bio    
                
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
    }

       // return view('register');
    }
    public function postChangepass(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $email=$request->input('email');
                Admin::where('email', $email)
                ->update([
                    'password' => Hash::make($request['password'])
                
                ]);
                
        
                return Redirect::to("/admin")->with('success',' Reset Password berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    //operator
    public function userop(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                $users = Admin::Where('level','=',2)->orderBy('id','desc')->get();
                
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.userop' , [
                    'layout' => $this->layout,
                    'pelamars' =>$users,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function adduserop()
    {
        if(Auth::guard('admin')->check()){  
            $allpd = Instansi::all();
            return view('admin/adduserop',[
            'layout' => $this->layout,
            'allpd'     =>$allpd,
             
             
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAdduserop(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:admins',
         
        'password' => 'required|min:6',
        ]);
         
        
        Admin::create([
            'name' => $request['name'],
            'username' => $request['email'], 
            'email' => $request['email'],
            'level' => $request['level'],
            'id_instansi' => $request['instansi'],
            'password' => Hash::make($request['password'])
          ]);
       
        return Redirect::to("/admin/operator")->with('success','Selamat, Anda berhasil untuk melakukan User Operator');
    }
    
    public function edituserop($id)
    {
        $us = Admin::where('id', $id)->first();
        $allpd = Instansi::all(); 
          return view('admin/edituserop',[
            'layout' => $this->layout,
            'user' =>$us,
            'allpd'     =>$allpd,
            
        ]);

       // return view('register');
    }
    public function postEdituserop(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $email=$request->input('email');
                Admin::where('email', $email)
                ->update([
                    'name' => $request['name'],
                    'id_instansi' => $request['instansi'],
                    'level' => $request['level'],
                
                
            ]);
        
                return Redirect::to("/admin/operator")->with('success',' Edit User Operator berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    //viewer
     
    public function userviewer(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                $users = Admin::Where('level','=',3)->orderBy('id','desc')->get();
                
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.userviewer' , [
                    'layout' => $this->layout,
                    'pelamars' =>$users,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function adduserviewer()
    {
        if(Auth::guard('admin')->check()){  
            $allpd = Instansi::all();
            return view('admin/adduserviewer',[
            'layout' => $this->layout,
            'allpd'     =>$allpd,
             
             
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAdduserviewer(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:admins',
         
        'password' => 'required|min:6',
        ]);
         
        
        Admin::create([
            'name' => $request['name'],
            'username' => $request['email'], 
            'email' => $request['email'],
            'level' => $request['level'],
            'id_instansi' => $request['instansi'],
            'password' => Hash::make($request['password'])
          ]);
       
        return Redirect::to("/admin/viewer")->with('success','Selamat, Anda berhasil untuk melakukan User Viewer');
    }
    
    public function edituserviewer($id)
    {
        $us = Admin::where('id', $id)->first();
        $allpd = Instansi::all(); 
          return view('admin/edituserviewer',[
            'layout' => $this->layout,
            'user' =>$us,
            'allpd'     =>$allpd,
            
        ]);

       // return view('register');
    }
    public function postEdituserviewer (Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $email=$request->input('email');
                Admin::where('email', $email)
                ->update([
                    'name' => $request['name'],
                    'id_instansi' => $request['instansi'],
                    'level' => $request['level'],
                
                
            ]);
        
                return Redirect::to("/admin/viewer")->with('success',' Edit User Viewer berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    public function deluser($id)
    {
        if(Auth::guard('admin')->check()){      
             
            $user = Admin::where('id', $id)->first();
            $levuser=$user->level;

            $user->delete();
            if($levuser==1){
                return Redirect::to("/admin/useradmin")->with('success',' Proses Delete berhasil.');
            }elseif($levuser==2){
                return Redirect::to("/admin/operator")->with('success',' Proses Delete berhasil.');
            }else{
                return Redirect::to("/admin/viewer")->with('success',' Proses Delete berhasil.');
            }
            
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
        
        
       
    }
    
    //navpeg
    //01 des 2024
    public function navpeg(){
        if(Auth::guard('admin')->check()){  
            $sess = Sesi::all();
            $navpeg = Navpeg::all();
          
             
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/navpeg' , [
                    'layout'        => $this->layout,
                    'allsesi'       => $sess,
                    'navs'          => $navpeg,
                    
                    
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function navpeg_proses( request $request){
       
        $idna = $request->get('idna');
        $sp = $request->get('statuspage');
        if ($sp == "true") {
            Navpeg::where('id', $idna)
                ->update([
                    'status' => 1,
                ]);
        } else {
            Navpeg::where('id', $idna)
                ->update([
                    'status' => 2,
                ]);
        }

        return response()->json(['success' => 'Halaman Pegawai Berhasil diedit']);


    }

      
    //Utilitas 
    //19 September 2022
    //unitkerja
    public function unitkerja(Request $request)
    {
        if(Auth::guard('admin')->check()){  
            
            $allpd = Instansi::all();
            $uk = Refunitkerja::all();
                
            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.unitkerja' , [
                    'layout' => $this->layout,
                    'uk'     => $uk,
                    'allpd'   => $allpd,
                   
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
 
    public function addunitkerja(Request $request)
    {
        $bio  = Auth::guard('admin')->user();
        $uniqid=hexdec(uniqid());
        //$bio  = Auth::user();
       

        
        $allpd = Instansi::all();

          return view('admin/addunitkerja',[
            'layout'    => $this->layout,
            'skpd'       =>$allpd,
            'uniqid'    => $uniqid,
                
             
        ]);

       // return view('register');
    }
           
    public function postAddunitkerja(Request $request)
    {  
         
        
        Refunitkerja::create([
            'id_instansi'     => $request['instansi'],
            'nama_unitkerja'      => $request['nama'],
            'eselon'                      => $request['eselon'],
            
             
          ]);
       
        return Redirect::to("/admin/unitkerja")->with('success','Selamat,Unit Kerja berhasil disimpan');
    }
    public function editunitkerja($id)
    {
        if(Auth::guard('admin')->check()){  
        
            $bio  = Auth::guard('admin')->user();
            $allpd = Instansi::all();
            $alluk = Refunitkerja::all();
            //$bio  = Auth::user();
            
            $kg = Refunitkerja::Where('id',$id)->first();
            if(empty($kg->alias)){
                $uniqid=hexdec(uniqid());
            }else{
                $uniqid=$kg->alias;
            }
            

            return view('admin/editunitkerja',[
                'layout'    => $this->layout,
                'kg'       =>$kg,
                'skpd'      =>$allpd,
                'unit'      =>$alluk,
                'bio'      =>$bio,
                'uniqid'    =>$uniqid    
                
            ]);

        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function postEditunitkerja(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $id=$request->input('idna');
                Refunitkerja::where('id', $id)
                ->update([
                    'alias'             => $request['idunit'],
                    'id_instansi'       => $request['instansi'],
                    'nama_unitkerja'    => $request['namaunitkerja'],
                    'eselon'                      => $request['eselon'],
                
            ]);
        
                return Redirect::to("/admin/unitkerja")->with('success',' Edit unitkerja  berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    function delunitkerja($id)
   {
       if(Auth::guard('admin')->check()){      
         
            $dl = Refunitkerja::where('id', $id)->first();
            $dl->delete();
            return Redirect::to("/admin/unitkerja")->with('success',' Proses Delete Unit Kerja berhasil.');

       }else{
           return view('admin.login',[
               'layout' => $this->layout 
             ]);
       }
   }
      


}

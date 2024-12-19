<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
//use Symfony\Component\HttpFoundation\Session\Session;
 
use App\Models\User;
use App\Models\PegawaiSimadig;
use App\Models\JabatanSimadig;
use App\Models\SkpSimadig;
use App\Models\Refstandkom;
use App\Models\Sesi;
use App\Models\CatNavigasi;

use App\Models\IndikatorBox;
use App\Models\DataKompetensi;
use App\Models\RefSKJ;
use App\Models\Reflevelkom;
//use Session;
use File;
use Carbon;


 

class SiteController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth');

      //NOTE: Sesi Auth tidak berjalan jika didalam subdomain, harus diatas:: stackoverflow=> In the end it turns out the config was set to save cookies in a subdomain which this server was no longer under, therefore it was never reused, and a new session is generated on every request.

  }
  public $layout = 'layouts.frontend.index';

    public function index(Request $request)
    {
     
        if(Auth::check()){
          

          $sesi = Session::getId();
          $bio  = Auth::user();
          $nip = $bio->nip;

            $now=date('Y-m-d h:i:s'); 
            $noreg=date('is');
           
            return view('site.home',[
                'now'          => $now,
                'bio'          => $bio,
                'sesi'         => $sesi,
                
            
            ]);
        }else{
          return Redirect::to("login")->withSuccess('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
        }
       
    }  
    public function biodata(Request $request)
    {
      
      
      //dd($sesi);
      if(Auth::check()){
        $sesi =  Session::getId();
        $bio  = Auth::user();
        $nip = $bio->nip;
          return view('site/biodata',[
            'bio'   => $bio,
            'sesi'  => $sesi
            
        ]);
      } else{
        return Redirect::to("login")->with('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
      }

       // return view('register');
    } 
    public function nilai(Request $request)
    {
       
         //dd($sesi);
          if(Auth::check()){
            $sesi =  Session::getId();
            $refso = Refstandkom::Orderby('id','asc')->get();
            $bio  = Auth::user();
            
            $nip = $bio->nip;
            $indi = IndikatorBox::where('nip',$bio->nip)->first();
            $datakomp = DataKompetensi::where('nip',$bio->nip)->first();
            //leveljab
            $reflevkom = Reflevelkom::where('leveljab',$datakomp->levelskj)->first();
            $desk1 = RefSKJ::where('no_komp',1)->where('level',$datakomp->nilai_integritas)->first(); 
            $desk2 = RefSKJ::where('no_komp',2)->where('level',$datakomp->nilai_kerjasama)->first(); 
            $desk3 = RefSKJ::where('no_komp',3)->where('level',$datakomp->nilai_komunikasi)->first(); 
            $desk4 = RefSKJ::where('no_komp',4)->where('level',$datakomp->nilai_orientasi)->first(); 
            $desk5 = RefSKJ::where('no_komp',5)->where('level',$datakomp->nilai_pelayanan)->first(); 
            $desk6 = RefSKJ::where('no_komp',6)->where('level',$datakomp->nilai_pengembangan)->first(); 
            $desk7 = RefSKJ::where('no_komp',7)->where('level',$datakomp->nilai_perubahan)->first(); 
            $desk8 = RefSKJ::where('no_komp',8)->where('level',$datakomp->nilai_keputusan)->first(); 
            $desk9 = RefSKJ::where('no_komp',9)->where('level',$datakomp->nilai_perekat)->first(); 


              return view('site/nilai_asn',[
                'bio'   => $bio,
                'sesi'  => $sesi,
                'refso' => $refso,
                'indi'  => $indi,
                'datak'       => $datakomp,
                'stk'         => $reflevkom,
                'desk1'       => $desk1,
                'desk2'       => $desk2,
                'desk3'       => $desk3,
                'desk4'       => $desk4,
                'desk5'       => $desk5,
                'desk6'       => $desk6,
                'desk7'       => $desk7,
                'desk8'       => $desk8,
                'desk9'       => $desk9,

                
            ]);
          } else{
            return Redirect::to("login")->with('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
          }

       
      
      

       // return view('register');
    }
    //16052024
    public function indikator(Request $request)
    {
      
      
      //dd($sesi);
      if(Auth::check()){
        $sesi =  Session::getId();
        $refso = Refstandkom::Orderby('id','asc')->get();
        $bio  = Auth::user();
        $nip = $bio->nip;
        $indi = IndikatorBox::where('nip',$bio->nip)->first();

          return view('site/indikator_asn',[
            'bio'   => $bio,
            'sesi'  => $sesi,
            'refso' => $refso,
            'indi'  => $indi
            
        ]);
      } else{
        return Redirect::to("login")->with('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
      }

       // return view('register');
    }

    public function boxtalenta(Request $request)
    {
      //dd($sesi);
      if(Auth::check()){
        $sesi =  Session::getId();
        $refso = Refstandkom::Orderby('id','asc')->get();
        $bio  = Auth::user();
        $nip = $bio->nip;
        $indi = IndikatorBox::where('nip',$bio->nip)->first();

          return view('site/boxtalenta_asn',[
            'bio'   => $bio,
            'sesi'  => $sesi,
            'refso' => $refso,
            'indi'  => $indi
            
        ]);
      } else{
        return Redirect::to("login")->with('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
      }

       // return view('register');
    }
    public function webkomp(Request $request)
    {
      //dd($sesi);
      if(Auth::check()){
        $sesi =  Session::getId();
        $refso = Refstandkom::Orderby('id','asc')->get();
        $bio  = Auth::user();
        $nip = $bio->nip;
        $indi = IndikatorBox::where('nip',$bio->nip)->first();
        $datakomp = DataKompetensi::where('nip',$bio->nip)->first();
        //skj
        $skj = Reflevelkom::where('leveljab',$datakomp->levelskj)->first();
         

          return view('site/spiderweb_asn',[
            'bio'         => $bio,
            'sesi'        => $sesi,
            'refso'       => $refso,
            'indi'        => $indi,
            'datak'       => $datakomp,
            'stk'         => $skj,
            
            
        ]);
      } else{
        return Redirect::to("login")->with('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
      }

       // return view('register');
    }
    public function deskkomp(Request $request)
    {
      //dd($sesi);
      if(Auth::check()){
        $sesi =  Session::getId();
        $refso = Refstandkom::Orderby('id','asc')->get();
        $bio  = Auth::user();
        $nip = $bio->nip;
        $indi = IndikatorBox::where('nip',$bio->nip)->first();
        $datakomp = DataKompetensi::where('nip',$bio->nip)->first();
        //leveljab
        $reflevkom = Reflevelkom::where('leveljab',$datakomp->levelskj)->first();
        $desk1 = RefSKJ::where('no_komp',1)->where('level',$datakomp->nilai_integritas)->first(); 
        $desk2 = RefSKJ::where('no_komp',2)->where('level',$datakomp->nilai_kerjasama)->first(); 
        $desk3 = RefSKJ::where('no_komp',3)->where('level',$datakomp->nilai_komunikasi)->first(); 
        $desk4 = RefSKJ::where('no_komp',4)->where('level',$datakomp->nilai_orientasi)->first(); 
        $desk5 = RefSKJ::where('no_komp',5)->where('level',$datakomp->nilai_pelayanan)->first(); 
        $desk6 = RefSKJ::where('no_komp',6)->where('level',$datakomp->nilai_pengembangan)->first(); 
        $desk7 = RefSKJ::where('no_komp',7)->where('level',$datakomp->nilai_perubahan)->first(); 
        $desk8 = RefSKJ::where('no_komp',8)->where('level',$datakomp->nilai_keputusan)->first(); 
        $desk9 = RefSKJ::where('no_komp',9)->where('level',$datakomp->nilai_perekat)->first(); 

          return view('site/deskkomp_asn',[
            'bio'         => $bio,
            'sesi'        => $sesi,
            'refso'       => $refso,
            'indi'        => $indi,
            'datak'       => $datakomp,
            'stk'         => $reflevkom,
            'desk1'       => $desk1,
            'desk2'       => $desk2,
            'desk3'       => $desk3,
            'desk4'       => $desk4,
            'desk5'       => $desk5,
            'desk6'       => $desk6,
            'desk7'       => $desk7,
            'desk8'       => $desk8,
            'desk9'       => $desk9,
            
            
            
        ]);
      } else{
        return Redirect::to("login")->with('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
      }

       // return view('register');
    }
    public function sarankembang(Request $request)
    {
      //dd($sesi);
      if(Auth::check()){
        $sesi =  Session::getId();
        $refso = Refstandkom::Orderby('id','asc')->get();
        $bio  = Auth::user();
        $nip = $bio->nip;
        $indi = IndikatorBox::where('nip',$bio->nip)->first();
        $datakomp = DataKompetensi::where('nip',$bio->nip)->first();
        //skj
        $skj = Reflevelkom::where('leveljab',$datakomp->levelskj)->first();
        $datakomp = DataKompetensi::where('nip',$nip)->first();
        //leveljab
        $reflevkom = Reflevelkom::where('leveljab',$datakomp->levelskj)->first();
        $desk1 = RefSKJ::where('no_komp',1)->where('level',$datakomp->nilai_integritas)->first(); 
        $desk2 = RefSKJ::where('no_komp',2)->where('level',$datakomp->nilai_kerjasama)->first(); 
        $desk3 = RefSKJ::where('no_komp',3)->where('level',$datakomp->nilai_komunikasi)->first(); 
        $desk4 = RefSKJ::where('no_komp',4)->where('level',$datakomp->nilai_orientasi)->first(); 
        $desk5 = RefSKJ::where('no_komp',5)->where('level',$datakomp->nilai_pelayanan)->first(); 
        $desk6 = RefSKJ::where('no_komp',6)->where('level',$datakomp->nilai_pengembangan)->first(); 
        $desk7 = RefSKJ::where('no_komp',7)->where('level',$datakomp->nilai_perubahan)->first(); 
        $desk8 = RefSKJ::where('no_komp',8)->where('level',$datakomp->nilai_keputusan)->first(); 
        $desk9 = RefSKJ::where('no_komp',9)->where('level',$datakomp->nilai_perekat)->first();  

          return view('site/sarankembang_asn',[
            'bio'         => $bio,
            'sesi'        => $sesi,
            'refso'       => $refso,
            'indi'        => $indi,
            'datak'       => $datakomp,
            'stk'         => $skj,
            'desk1'       => $desk1,
            'desk2'       => $desk2,
            'desk3'       => $desk3,
            'desk4'       => $desk4,
            'desk5'       => $desk5,
            'desk6'       => $desk6,
            'desk7'       => $desk7,
            'desk8'       => $desk8,
            'desk9'       => $desk9,
            
            
        ]);
      } else{
        return Redirect::to("login")->with('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
      }

       // return view('register');
    }
    public function acanlogin()
    {
        $now=date('Ymd h:i:s'); 

          return view('site/login',[
            'now'          => $now,
        ]);

       // return view('register');
    } 
    public function loginsso()
    {
      $request = request();
      $token = $request->token;
      $res =  Http::get('https://satamasn.babelprov.go.id/web/api/auth/verify-token?token='.$token);
      $jsonData = $res->json();
      //dd($jsonData);

     // $valid= $jsonData["valid"];
      if(!empty($jsonData["username"])){
        $userna= $jsonData["username"];
        $cekuser= User::where('username','=',$userna)->first();
        
        //cek mun di tabel user kosong
        if($cekuser === null){
          $response = Http::get('https://satamasn.babelprov.go.id/web/api/pegawai/'.$userna);
          $jd = $response->json();
          //dd($jd);
          // if($jd["status"]=="fail"){
          if(empty($jd["nip"])){
            $response = Http::get('https://e-kinerja.babelprov.go.id/v1/index.php?r=api/pegawai/view&nip='.$userna);
            $jd = $response->json();

              User::create([
                'nama'      => $jd["nama"],
                'nip'       => $jd["nip"],
                'username'  => $jd["nip"],
                'jabatan'   => $jd["jabatan"],
                'gol'       => $jd["golongan"],
                'tgllahir'  => $jd["tanggal_lahir"],
                //'tempatlahir'  => $jsonData["pegawai"]["tempat_lahir"],
                //'unitkerja'  => $jsonData["pegawai"]["unitkerja"],
                //'nohp'  => $jsonData["pegawai"]["nohp"],
                //'email'  => $jsonData["pegawai"]["email"],
                'id_instansi'  => $jd["id_instansi"],
                
                'unitkerja'  => $jd["nama_instansi"],
                
                
                
                
                'id_user_role' => '1',
                'status_aktif' => '1',
                'id_unit'     => '1',
                  
                'password' => Hash::make($jd["nip"])
              ]);
          }else{
            $response = Http::get('https://satamasn.babelprov.go.id/web/api/pegawai/'.$userna);
            $jd = $response->json();

              User::create([
                'nama'      => $jd["nama"],
                'nip'       => $jd["nip"],
                'username'  => $jd["nip"],
                'jabatan'   => $jd["jabatan"],
                'gol'       => $jd["golongan"],
                'tgllahir'  => $jd["tanggal_lahir"],
                //'tempatlahir'  => $jsonData["pegawai"]["tempat_lahir"],
                //'unitkerja'  => $jsonData["pegawai"]["unitkerja"],
                //'nohp'  => $jsonData["pegawai"]["nohp"],
                //'email'  => $jsonData["pegawai"]["email"],
                'id_instansi'  => $jd["id_instansi"],
                
                'unitkerja'  => $jd["nama_instansi"],
                
                
                
                
                'id_user_role' => '1',
                'status_aktif' => '1',
                'id_unit'     => '1',
                  
                'password' => Hash::make($jd["nip"])
              ]);
          }
          
    
        }

        
        //grant user
    
        $user= User::query()->where('username',$userna)->first();
        Auth::login($user);
        //request()->session()->regenerate();
        $request->session()->regenerate();
      //   $response = Http::get('https://satamasn.babelprov.go.id/public/api/pegawai/'.$userna);
      //   $jd = $response->json();
      //   //$jd = json_decode($response, true);
      //   // dd($jd);
        
      //   if(empty($jd["nip"])){
      //     $response = Http::get('https://satamasn.babelprov.go.id/public/api/pegawai/'.$userna);
      //     $jd = $response->json();
          
      //     $nippeg= $jd["nip"];
      //     $namapeg= $jd["nama"];
      //     $golpeg= $jd["golongan"];
      //     $jabpeg= $jd["jabatan"];
      //   }else{
      //     $nippeg= $jd["nip"];
      //     $namapeg= $jd["nama"];
      //     $golpeg= $jd["golongan"];
      //     $jabpeg= $jd["jabatan"];
      //   }

        
  
      //  // $bio=Auth::user();
          return redirect()->intended('dashboard');
        //return Redirect::to('dashboard');
      }else{
        $message=$jsonData["message"];
       // print_r($response->json());
        // echo "<br/>"; echo "<br/>";
        return Redirect::to("login")->withError('Opps! Maaf Anda tidak memiliki akses, '.$message);
      } 
       
 
    } 

    
   
    public function dashboard(Request $request)
    {
      if(Auth::check()){
        $sesi = Session::getId();
        $bio  = Auth::user();
        $nip = $bio->nip;

          $now=date('Y-m-d h:i:s'); 
          $noreg=date('is');
         
          return view('site.home',[
              'now'          => $now,
              'bio'          => $bio,
              'sesi'       => $sesi,
          
          ]);
      }else{
        return Redirect::to("acanlogin")->withSuccess('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
      }
        
    } 
    //loginpeserta
    //24-03-2024
    public function loginpeserta(){
      return view('site.loginpeserta',[
        'layout' => $this->layout
        
      ]);
    }
    public function postLoginpeserta(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:5'
        ]);
        //sesi
        $ss = Sesi::where('status', 1)->first();
        $idtoken=$ss->token;
        $passhash=Hash::make($request->password);
        $credentials = $request->only('username', 'password');
        $user = User::where([
            'username' => $request->username, 
           

        ])->first();

       

        //dd($user);

        if($user)
        {
            Auth::login($user);
            return redirect()->intended('dashboard');
        }

       
        return Redirect::to("/loginpeserta")->with('error',' Username atau Password Peserta salah, silahkan ulangi');
    } 
    //nilai all asesment
    //27 september 2024
    public function talentabox_asn($nip_asn = null)
    {
      if(empty($nip_asn)){
         //dd($sesi);
          
            return Redirect::to("login")->with('Opps! Silahkan login menggunakan satamasn.babelprov.go.id');
         

      }else{
        $nip = $nip_asn;
        $bio  = User::where('nip',$nip)->first();
        if(empty($bio->nip)){
          $message="NIP tidak ditemukan";
          
           return Redirect::to("notif")->withError('Opps!!, '.$message);
        }else{
          $sesi =  Session::getId();
          $refso = Refstandkom::Orderby('id','asc')->get();
          
          $indi = IndikatorBox::where('nip',$nip)->first();
          $datakomp = DataKompetensi::where('nip',$nip)->first();
          //leveljab
          $reflevkom = Reflevelkom::where('leveljab',$datakomp->levelskj)->first();
          $desk1 = RefSKJ::where('no_komp',1)->where('level',$datakomp->nilai_integritas)->first(); 
          $desk2 = RefSKJ::where('no_komp',2)->where('level',$datakomp->nilai_kerjasama)->first(); 
          $desk3 = RefSKJ::where('no_komp',3)->where('level',$datakomp->nilai_komunikasi)->first(); 
          $desk4 = RefSKJ::where('no_komp',4)->where('level',$datakomp->nilai_orientasi)->first(); 
          $desk5 = RefSKJ::where('no_komp',5)->where('level',$datakomp->nilai_pelayanan)->first(); 
          $desk6 = RefSKJ::where('no_komp',6)->where('level',$datakomp->nilai_pengembangan)->first(); 
          $desk7 = RefSKJ::where('no_komp',7)->where('level',$datakomp->nilai_perubahan)->first(); 
          $desk8 = RefSKJ::where('no_komp',8)->where('level',$datakomp->nilai_keputusan)->first(); 
          $desk9 = RefSKJ::where('no_komp',9)->where('level',$datakomp->nilai_perekat)->first(); 
  
  
                return view('site/talentabox_asn_admin',[
                  'bio'   => $bio,
                  'sesi'  => $sesi,
                  'refso' => $refso,
                  'indi'  => $indi,
                  'datak'       => $datakomp,
                  'stk'         => $reflevkom,
                  'desk1'       => $desk1,
                  'desk2'       => $desk2,
                  'desk3'       => $desk3,
                  'desk4'       => $desk4,
                  'desk5'       => $desk5,
                  'desk6'       => $desk6,
                  'desk7'       => $desk7,
                  'desk8'       => $desk8,
                  'desk9'       => $desk9,
                  
              ]);
        }
        
      }
      
      

       // return view('register');
    }
    public function notif(Request $request)
    {
       
        
            return view('site.notif',[
               
            
            ]);
        
        
    } 
    public function bantuan(Request $request)
    {
        $id = 2;
        $web = Profil::where('id',$id)->first();
        
        
            return view('site.profil',[
                'pro'             => $web,
                
            
            ]);
        
        
    } 
    public function restapi(Request $request)
    {
        $id = 3;
        $web = Profil::where('id',$id)->first();
        
        
            return view('site.profil',[
                'pro'             => $web,
                
            
            ]);
        
        
    } 
    public function docapi(Request $request)
    {
        if(Auth::check()){ 
            $id = 3;
        $web = Profil::where('id',$id)->first();
        
        
            return view('site.doc_api',[
                'pro'             => $web,
                
            
            ]);
        }else{
            return view('site.logindev',[
                //'layout' => $this->layout 
              ]);
        }
        
    } 
    
    public function logout()
    {
      Session::flush();
      Auth::logout();
      return redirect()->route('site.login');
    }
     
}

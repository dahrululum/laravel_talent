<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController; 
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
 
//Dashboard
 Route::get('/', [SiteController::class,'index']);
 Route::get('/login', [SiteController::class,'acanlogin'])->name('login');
 Route::get('/login-sso',[SiteController::class,'loginsso'])->name('loginsso');
 Route::get('/dashboard', [SiteController::class,'index'])->name('dashboard');
 Route::get('/biodata', [SiteController::class,'biodata']);
 Route::get('/nilai', [SiteController::class,'nilai']);
 Route::get('/indikator', [SiteController::class,'indikator']);
 Route::get('/boxtalenta', [SiteController::class,'boxtalenta']);
 Route::get('/webkomp', [SiteController::class,'webkomp']);
 Route::get('/deskkomp', [SiteController::class,'deskkomp']);
 Route::get('/saran', [SiteController::class,'sarankembang']);
 Route::get('/logout',[SiteController::class,'logout'] );

//alternatif login
Route::get('/loginpeserta', [SiteController::class,'loginpeserta'])->name('loginpeserta');
Route::post('/postloginpeserta', [SiteController::class,'postLoginpeserta'])->name('postloginpeserta');
// Route::get('/login-sso',[SiteController::class,'loginsso'])->name('loginsso');
// Route::get('/login', [SiteController::class,'acanlogin'])->name('login');
// Route::get('/biodata', [SiteController::class,'biodata']);
// Route::middleware(['auth'])->group(function () {
//     Route::get('/', [SiteController::class,'index']);
//     Route::get('/dashboard', [SiteController::class,'index'])->name('dashboard');
   
//     Route::get('/logout',[SiteController::class,'logout'] );
// });

//Backend
Route::get('admin', [AdminController::class,'index'])->name('admin.index');
Route::get('admin/login', [AdminController::class,'index'])->name('admin.login');
Route::post('admin/postlogin', [AdminController::class,'postLogin']);
Route::post('admin/logout',[AdminController::class,'postLogout'] );

//useradmin
Route::get('admin/useradmin', [AdminController::class,'useradmin'])->name('admin.useradmin');
Route::get('/admin/adduseradmin', [AdminController::class,'adduseradmin'])->name('admin.adduseradmin');
Route::post('/admin/post-adduseradmin', [AdminController::class,'postAdduseradmin']); 
Route::get('/admin/edituseradmin/{id}',  [AdminController::class,'edituseradmin'])->name('admin.edituser');
Route::post('/admin/post-edituseradmin', [AdminController::class,'postEdituseradmin']); 

//operator
Route::get('admin/operator', [AdminController::class,'userop'])->name('admin.userop');
Route::get('/admin/addoperator', [AdminController::class,'adduserop'])->name('admin.adduserop');
Route::post('/admin/post-addoperator', [AdminController::class,'postAdduserop']); 
Route::get('/admin/editoperator/{id}',  [AdminController::class,'edituserop'])->name('admin.editop');
Route::post('/admin/post-editoperator', [AdminController::class,'postEdituserop']); 

//pegawai
//rev 13 des 2023
Route::get('admin/pegawai', [AdminController::class,'pegawai'])->name('admin.pegawai');
Route::get('admin/dialog-profilpegawai/{nip}', [AdminController::class,'dialogprofilpegawai'])->name('admin.dialogprofilpegawai');


//Master Nilai Potensi
Route::get('admin/nipotinpres', [AdminController::class,'nipotinpres'])->name('admin.nipotinpres');
//export nilaipotensi
Route::get('/admin/exportnipotinpres', [AdminController::class,'exportnipotinpres'])->name('admin.exportnipotinpres');
Route::post('/admin/post-importnipotinpres', [AdminController::class,'postImportNilaipotensi']); 

Route::get('/admin/addnipotinpres', [AdminController::class,'addnipotinpres'])->name('admin.addnipotinpres');
Route::post('/admin/post-addnipotinpres', [AdminController::class,'postAddnipotinpres']); 
Route::get('/admin/editnipotinpres/{id}', [AdminController::class,'editnipotinpres'])->name('admin.editnipotinpres');
Route::post('/admin/post-editnipotinpres', [AdminController::class,'postEditnipotinpres']);
Route::get('/admin/delnipotinpres/{id}',  [AdminController::class,'delnipotinpres']);

Route::get('admin/indikatorninebox/{id?}', [AdminController::class,'indikatorninebox'])->name('admin.indikatorninebox');
Route::post('/admin/post-indikatorninebox', [AdminController::class,'postIndikatorninebox']); 
Route::post('/admin/post-indikatornineboxAll', [AdminController::class,'postIndikatornineboxAll']); 

Route::get('admin/detail_indikatorninebox/{id}', [AdminController::class,'detailindikatorninebox'])->name('admin.detail_indikatorninebox');
Route::get('admin/ninebox', [AdminController::class,'ninebox'])->name('admin.ninebox');
Route::get('/admin/export_ninebox', [AdminController::class,'exportninebox'])->name('admin.exportninebox');
Route::get('admin/print_ninebox', [AdminController::class,'printninebox'])->name('admin.printninebox');
Route::get('/admin/editninebox/{id}', [AdminController::class,'editninebox'])->name('admin.editninebox');
Route::post('/admin/post-editninebox', [AdminController::class,'postEditninebox']);
Route::get('/admin/delninebox/{id}',  [AdminController::class,'delninebox']);
Route::get('admin/sebaran_ninebox', [AdminController::class,'sebaranninebox'])->name('admin.sebaranninebox');
Route::get('admin/sebaran_ninebox2', [AdminController::class,'sebaranninebox2'])->name('admin.sebaranninebox2');

//Modul Suksesor
Route::get('admin/searchpegpotensi', [AdminController::class,'searchpegpotensi'])->name('admin.searchpegpotensi');
Route::get('admin/searchsuksesor', [AdminController::class,'searchsuksesor'])->name('admin.searchsuksesor');
Route::get('admin/getdatasimadig', [AdminController::class,'getdatasimadig'])->name('admin.getdatasimadig');
Route::post('/admin/post-getdatasimadig', [AdminController::class,'postGetDataSimadig']); 
Route::get('/admin/get-getdatasimadig', [AdminController::class,'getGetDataSimadig']); 
//Modul Report
Route::get('/admin/get-getdatajpm', [AdminController::class,'getGetDataJPM']); 
Route::get('admin/getdatakompetensi', [AdminController::class,'getdatakompetensi'])->name('admin.getdatakompetensi');
Route::post('/admin/post-getdatakompetensi', [AdminController::class,'postGetDataKompetensi']); 
Route::get('admin/grafikkompetensi', [AdminController::class,'grafikkompetensi'])->name('admin.grafikkompetensi');
Route::get('admin/rekapkompetensitalenta', [AdminController::class,'rekapkompetensitalenta'])->name('admin.rekapkompetensitalenta');
Route::get('/admin/export_rekapkomptalenta', [AdminController::class,'exportrekapkomptalenta'])->name('admin.exportrekapkomptalenta');
Route::get('admin/print_rekapkomptalenta', [AdminController::class,'printrekapkomptalenta'])->name('admin.printrekapkomptalenta');
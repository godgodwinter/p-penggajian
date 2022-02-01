<?php

use App\Http\Controllers\adminapicontroller;
use App\Http\Controllers\admincetakcontroller;
use App\Http\Controllers\admindashboardcontroller;
use App\Http\Controllers\admindivisicontroller;
use App\Http\Controllers\admingrafikcontroller;
use App\Http\Controllers\adminkategoricontroller;
use App\Http\Controllers\adminkriteriacontroller;
use App\Http\Controllers\adminkriteriadetailcontroller;
use App\Http\Controllers\adminnotifcontroller;
use App\Http\Controllers\adminpelatihcontroller;
use App\Http\Controllers\adminpemaincontroller;
use App\Http\Controllers\adminpemainseleksicontroller;
use App\Http\Controllers\adminpenilaiancontroller;
use App\Http\Controllers\adminpenilaiandetailcontroller;
use App\Http\Controllers\adminposisipemaincontroller;
use App\Http\Controllers\adminposisiseleksicontroller;
use App\Http\Controllers\adminprosesperhitungancontroller;
use App\Http\Controllers\adminseedercontroller;
use App\Http\Controllers\adminseederthcontroller;
use App\Http\Controllers\adminsettingscontroller;
use App\Http\Controllers\adminsuratkeluarcontroller;
use App\Http\Controllers\adminsuratmasukcontroller;
use App\Http\Controllers\admintahunpenilaiancontroller;
use App\Http\Controllers\admintahunpenilaiandetailcontroller;
use App\Http\Controllers\adminuserscontroller;
use App\Http\Controllers\direksisuratkeluarcontroller;
use App\Http\Controllers\direksisuratmasukcontroller;
use App\Http\Controllers\divisisuratkeluarcontroller;
use App\Http\Controllers\divisisuratmasukcontroller;
use App\Http\Controllers\landingcontroller;
use App\Http\Controllers\pelatihtahunpenilaiancontroller;
use App\Http\Controllers\pemaintahunpenilaiancontroller;
use App\Http\Controllers\profilecontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use Facades\Yugo\SMSGateway\Interfaces\SMS;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


Route::get('/', [landingcontroller::class, 'index']);


//halaman admin fixed
Route::group(['middleware' => ['auth:web', 'verified']], function() {

    //DASHBOARD-MENU
    Route::get('/dashboard', [admindashboardcontroller::class, 'index'])->name('dashboard');
    //settings
    Route::get('/admin/settings', [adminsettingscontroller::class, 'index'])->name('settings');
    Route::put('/admin/settings/{id}', [adminsettingscontroller::class, 'update'])->name('settings.update');


    Route::get('/admin/profile', [adminsettingscontroller::class, 'profile'])->name('profile');
    Route::put('/admin/profile/admin/update', [adminsettingscontroller::class, 'profileupdate'])->name('profileupdate');


    //MASTERING
    //USER
    Route::get('/admin/users', [adminuserscontroller::class, 'index'])->name('users');
    Route::get('/admin/users/{id}', [adminuserscontroller::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [adminuserscontroller::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [adminuserscontroller::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/datausers/create', [adminuserscontroller::class, 'create'])->name('users.create');
    Route::post('/admin/datausers', [adminuserscontroller::class, 'store'])->name('users.store');


    //kategori
    Route::get('/admin/kategori', [adminkategoricontroller::class, 'index'])->name('kategori');
    Route::get('/admin/kategori/{id}', [adminkategoricontroller::class, 'edit'])->name('kategori.edit');
    Route::put('/admin/kategori/{id}', [adminkategoricontroller::class, 'update'])->name('kategori.update');
    Route::delete('/admin/kategori/{id}', [adminkategoricontroller::class, 'destroy'])->name('kategori.destroy');
    Route::get('/admin/datakategori/create', [adminkategoricontroller::class, 'create'])->name('kategori.create');
    Route::post('/admin/datakategori', [adminkategoricontroller::class, 'store'])->name('kategori.store');


    //API
    Route::get('/admin/api/kriteriadetail/{tahunpenilaian}', [admintahunpenilaiandetailcontroller::class, 'apikriteriadetail'])->name('api.kriteriadetail');
    Route::get('/admin/api/periksaminimum/{tahunpenilaian}', [admintahunpenilaiandetailcontroller::class, 'apiperiksaminimum'])->name('api.periksaminimum');
    Route::get('/admin/api/pemainseleksi/inputnilai/{tahunpenilaian}', [adminapicontroller::class, 'pemainseleksi_inputnilai'])->name('api.pemainseleksi.inputnilai');

    Route::get('/admin/api/nilaipersiswa/{prosespenilaian}/{pemainseleksi}/{kriteriadetail}', [adminapicontroller::class, 'nilaipersiswa'])->name('api.nilaipersiswa');


    Route::post('admin/cleartemp', 'App\Http\Controllers\prosescontroller@cleartemp')->name('cleartemp');


    //seeder
    Route::post('/admin/seeder/pemain', [adminseedercontroller::class, 'pemain'])->name('seeder.pemain');
    Route::post('/admin/seeder/tahunpenilaian', [adminseedercontroller::class, 'tahunpenilaian'])->name('seeder.tahunpenilaian');
    Route::post('/admin/seeder/pelatih', [adminseedercontroller::class, 'pelatih'])->name('seeder.pelatih');
    Route::post('/admin/seeder/kriteria', [adminseedercontroller::class, 'kriteria'])->name('seeder.kriteria');
    Route::post('/admin/seeder/kriteriadetail', [adminseedercontroller::class, 'kriteriadetail'])->name('seeder.kriteriadetail');
    Route::post('/admin/seeder/posisi', [adminseedercontroller::class, 'posisi'])->name('seeder.posisi');
    Route::post('/admin/seeder/hard', [adminseedercontroller::class, 'hard'])->name('seeder.hard');


});




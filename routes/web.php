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


    //divisi
    Route::get('/admin/divisi', [admindivisicontroller::class, 'index'])->name('divisi');
    Route::get('/admin/divisi/{id}', [admindivisicontroller::class, 'edit'])->name('divisi.edit');
    Route::put('/admin/divisi/{id}', [admindivisicontroller::class, 'update'])->name('divisi.update');
    Route::delete('/admin/divisi/{id}', [admindivisicontroller::class, 'destroy'])->name('divisi.destroy');
    Route::get('/admin/datadivisi/create', [admindivisicontroller::class, 'create'])->name('divisi.create');
    Route::post('/admin/datadivisi', [admindivisicontroller::class, 'store'])->name('divisi.store');


    //kategori
    Route::get('/admin/kategori', [adminkategoricontroller::class, 'index'])->name('kategori');
    Route::get('/admin/kategori/{id}', [adminkategoricontroller::class, 'edit'])->name('kategori.edit');
    Route::put('/admin/kategori/{id}', [adminkategoricontroller::class, 'update'])->name('kategori.update');
    Route::delete('/admin/kategori/{id}', [adminkategoricontroller::class, 'destroy'])->name('kategori.destroy');
    Route::get('/admin/datakategori/create', [adminkategoricontroller::class, 'create'])->name('kategori.create');
    Route::post('/admin/datakategori', [adminkategoricontroller::class, 'store'])->name('kategori.store');


    //suratmasuk
    Route::get('/admin/suratmasuk', [adminsuratmasukcontroller::class, 'index'])->name('suratmasuk');
    Route::get('/admin/suratmasuk/{id}', [adminsuratmasukcontroller::class, 'edit'])->name('suratmasuk.edit');
    Route::put('/admin/suratmasuk/{id}', [adminsuratmasukcontroller::class, 'update'])->name('suratmasuk.update');
    Route::delete('/admin/suratmasuk/{id}', [adminsuratmasukcontroller::class, 'destroy'])->name('suratmasuk.destroy');
    Route::get('/admin/datasuratmasuk/create', [adminsuratmasukcontroller::class, 'create'])->name('suratmasuk.create');
    Route::post('/admin/datasuratmasuk', [adminsuratmasukcontroller::class, 'store'])->name('suratmasuk.store');


    //suratkeluar
    Route::get('/admin/suratkeluar', [adminsuratkeluarcontroller::class, 'index'])->name('suratkeluar');
    Route::get('/admin/suratkeluar/{id}', [adminsuratkeluarcontroller::class, 'edit'])->name('suratkeluar.edit');
    Route::put('/admin/suratkeluar/{id}', [adminsuratkeluarcontroller::class, 'update'])->name('suratkeluar.update');
    Route::delete('/admin/suratkeluar/{id}', [adminsuratkeluarcontroller::class, 'destroy'])->name('suratkeluar.destroy');
    Route::get('/admin/datasuratkeluar/create', [adminsuratkeluarcontroller::class, 'create'])->name('suratkeluar.create');
    Route::post('/admin/datasuratkeluar', [adminsuratkeluarcontroller::class, 'store'])->name('suratkeluar.store');
    Route::get('/admin/datasuratkeluar/cetak/{id}', [adminsuratkeluarcontroller::class, 'cetak'])->name('suratkeluar.cetak');
    Route::get('/admin/datasuratkeluar/cetakperdivisi/{id}/{divisi}', [adminsuratkeluarcontroller::class, 'cetakperdivisi'])->name('suratkeluar.cetakperdivisi');


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


    //divisimenu
    Route::get('/divisi/suratmasuk', [divisisuratmasukcontroller::class, 'index'])->name('divisi.suratmasuk');
    Route::get('/divisi/datasuratmasuk/create', [divisisuratmasukcontroller::class, 'create'])->name('divisi.suratmasuk.create');
    Route::post('/divisi/datasuratmasuk', [divisisuratmasukcontroller::class, 'store'])->name('divisi.suratmasuk.store');

    Route::get('/divisi/suratkeluar', [divisisuratkeluarcontroller::class, 'index'])->name('divisi.suratkeluar');
    Route::get('/divisi/datasuratkeluar/create', [divisisuratkeluarcontroller::class, 'create'])->name('divisi.suratkeluar.create');
    Route::post('/divisi/datasuratkeluar', [divisisuratkeluarcontroller::class, 'store'])->name('divisi.suratkeluar.store');


    //direksimenu
    Route::get('/direksi/suratmasuk', [direksisuratmasukcontroller::class, 'index'])->name('direksi.suratmasuk');
    Route::get('/direksi/suratmasuk/acc/{id}', [direksisuratmasukcontroller::class, 'acc'])->name('direksi.suratmasuk.acc');
    Route::get('/direksi/suratmasuk/dec/{id}', [direksisuratmasukcontroller::class, 'dec'])->name('direksi.suratmasuk.dec');

    Route::get('/direksi/suratkeluar', [direksisuratkeluarcontroller::class, 'index'])->name('direksi.suratkeluar');
    Route::get('/direksi/suratkeluar/acc/{id}', [direksisuratkeluarcontroller::class, 'acc'])->name('direksi.suratkeluar.acc');
    Route::get('/direksi/suratkeluar/dec/{id}', [direksisuratkeluarcontroller::class, 'dec'])->name('direksi.suratkeluar.dec');


});




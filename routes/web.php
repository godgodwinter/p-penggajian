<?php

use App\Http\Controllers\adminapicontroller;
use App\Http\Controllers\admincetakcontroller;
use App\Http\Controllers\admindashboardcontroller;
use App\Http\Controllers\admindivisicontroller;
use App\Http\Controllers\admingajigurucontroller;
use App\Http\Controllers\admingajipegawaicontroller;
use App\Http\Controllers\admingrafikcontroller;
use App\Http\Controllers\admingurucontroller;
use App\Http\Controllers\adminjabatancontroller;
use App\Http\Controllers\adminkategoricontroller;
use App\Http\Controllers\adminkriteriacontroller;
use App\Http\Controllers\adminkriteriadetailcontroller;
use App\Http\Controllers\adminnotifcontroller;
use App\Http\Controllers\adminpegawaicontroller;
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
use App\Http\Controllers\adminsettingsgajicontroller;
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



    //settingsgaji
    Route::get('/admin/settingsgaji', [adminsettingsgajicontroller::class, 'index'])->name('settingsgaji');
    Route::post('/admin/datasettingsgaji', [adminsettingsgajicontroller::class, 'store'])->name('settingsgaji.store');


    //jabatan
    Route::get('/admin/jabatan', [adminjabatancontroller::class, 'index'])->name('jabatan');
    Route::get('/admin/jabatan/{id}', [adminjabatancontroller::class, 'edit'])->name('jabatan.edit');
    Route::put('/admin/jabatan/{id}', [adminjabatancontroller::class, 'update'])->name('jabatan.update');
    Route::delete('/admin/jabatan/{id}', [adminjabatancontroller::class, 'destroy'])->name('jabatan.destroy');
    Route::get('/admin/datajabatan/cari', [adminjabatancontroller::class, 'cari'])->name('jabatan.cari');
    Route::get('/admin/datajabatan/create', [adminjabatancontroller::class, 'create'])->name('jabatan.create');
    Route::post('/admin/datajabatan', [adminjabatancontroller::class, 'store'])->name('jabatan.store');



    //pegawai
    Route::get('/admin/pegawai', [adminpegawaicontroller::class, 'index'])->name('pegawai');
    Route::get('/admin/pegawai/{id}', [adminpegawaicontroller::class, 'edit'])->name('pegawai.edit');
    Route::put('/admin/pegawai/{id}', [adminpegawaicontroller::class, 'update'])->name('pegawai.update');
    Route::delete('/admin/pegawai/{id}', [adminpegawaicontroller::class, 'destroy'])->name('pegawai.destroy');
    Route::get('/admin/datapegawai/cari', [adminpegawaicontroller::class, 'cari'])->name('pegawai.cari');
    Route::get('/admin/datapegawai/create', [adminpegawaicontroller::class, 'create'])->name('pegawai.create');
    Route::post('/admin/datapegawai', [adminpegawaicontroller::class, 'store'])->name('pegawai.store');


    //gajipegawai
    Route::get('/admin/gajipegawai', [admingajipegawaicontroller::class, 'index'])->name('gajipegawai');
    Route::get('/admin/gajipegawai/{id}', [admingajipegawaicontroller::class, 'edit'])->name('gajipegawai.edit');
    Route::put('/admin/gajipegawai/{id}', [admingajipegawaicontroller::class, 'update'])->name('gajipegawai.update');
    Route::delete('/admin/gajipegawai/{id}', [admingajipegawaicontroller::class, 'destroy'])->name('gajipegawai.destroy');
    Route::get('/admin/datagajipegawai/cari', [admingajipegawaicontroller::class, 'cari'])->name('gajipegawai.cari');
    Route::get('/admin/datagajipegawai/create', [admingajipegawaicontroller::class, 'create'])->name('gajipegawai.create');
    Route::post('/admin/datagajipegawai', [admingajipegawaicontroller::class, 'store'])->name('gajipegawai.store');
    Route::post('/admin/datagajipegawai/generate', [admingajipegawaicontroller::class, 'generate'])->name('gajipegawai.generate');
    Route::get('/admin/datagajipegawai/cetak', [admingajipegawaicontroller::class, 'cetak'])->name('gajipegawai.cetak');

    //guru
    Route::get('/admin/guru', [admingurucontroller::class, 'index'])->name('guru');
    Route::get('/admin/guru/{id}', [admingurucontroller::class, 'edit'])->name('guru.edit');
    Route::put('/admin/guru/{id}', [admingurucontroller::class, 'update'])->name('guru.update');
    Route::delete('/admin/guru/{id}', [admingurucontroller::class, 'destroy'])->name('guru.destroy');
    Route::get('/admin/dataguru/cari', [admingurucontroller::class, 'cari'])->name('guru.cari');
    Route::get('/admin/dataguru/create', [admingurucontroller::class, 'create'])->name('guru.create');
    Route::post('/admin/dataguru', [admingurucontroller::class, 'store'])->name('guru.store');

    //gajiguru
    Route::get('/admin/gajiguru', [admingajigurucontroller::class, 'index'])->name('gajiguru');
    Route::get('/admin/gajiguru/{id}', [admingajigurucontroller::class, 'edit'])->name('gajiguru.edit');
    Route::put('/admin/gajiguru/{id}', [admingajigurucontroller::class, 'update'])->name('gajiguru.update');
    Route::delete('/admin/gajiguru/{id}', [admingajigurucontroller::class, 'destroy'])->name('gajiguru.destroy');
    Route::get('/admin/datagajiguru/cari', [admingajigurucontroller::class, 'cari'])->name('gajiguru.cari');
    Route::get('/admin/datagajiguru/create', [admingajigurucontroller::class, 'create'])->name('gajiguru.create');
    Route::post('/admin/datagajiguru', [admingajigurucontroller::class, 'store'])->name('gajiguru.store');

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




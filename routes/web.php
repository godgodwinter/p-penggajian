<?php

use App\Http\Controllers\admin\adminBendaharaController;
use App\Http\Controllers\admin\adminKepsekController;
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
use App\Http\Controllers\bendahara\bendaharaGajiGuruController;
use App\Http\Controllers\bendahara\bendaharaGajiPegawaiController;
use App\Http\Controllers\bendahara\bendaharaLandingController;
use App\Http\Controllers\bendahara\bendaharaGuruController;
use App\Http\Controllers\bendahara\bendaharaPegawaiController;
use App\Http\Controllers\direksisuratkeluarcontroller;
use App\Http\Controllers\direksisuratmasukcontroller;
use App\Http\Controllers\divisisuratkeluarcontroller;
use App\Http\Controllers\divisisuratmasukcontroller;
use App\Http\Controllers\kepsek\kepsekLandingController;
use App\Http\Controllers\kepsek\kepsekLaporanController;
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
Route::group(['middleware' => ['auth:web', 'verified']], function () {

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

    // bendahara
    Route::get('/admin/bendahara', [adminBendaharaController::class, 'index'])->name('bendahara');
    Route::get('/admin/bendahara/{id}', [adminBendaharaController::class, 'edit'])->name('bendahara.edit');
    Route::put('/admin/bendahara/{id}', [adminBendaharaController::class, 'update'])->name('bendahara.update');
    Route::delete('/admin/bendahara/{id}', [adminBendaharaController::class, 'destroy'])->name('bendahara.destroy');
    Route::get('/admin/databendahara/create', [adminBendaharaController::class, 'create'])->name('bendahara.create');
    Route::post('/admin/databendahara', [adminBendaharaController::class, 'store'])->name('bendahara.store');



    // bendahara
    Route::get('/admin/kepsek', [adminKepsekController::class, 'index'])->name('kepsek');
    Route::get('/admin/kepsek/{id}', [adminKepsekController::class, 'edit'])->name('kepsek.edit');
    Route::put('/admin/kepsek/{id}', [adminKepsekController::class, 'update'])->name('kepsek.update');
    Route::delete('/admin/kepsek/{id}', [adminKepsekController::class, 'destroy'])->name('kepsek.destroy');
    Route::get('/admin/datakepsek/create', [adminKepsekController::class, 'create'])->name('kepsek.create');
    Route::post('/admin/datakepsek', [adminKepsekController::class, 'store'])->name('kepsek.store');


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
    Route::post('/admin/datagajipegawai/generate', [admingajipegawaicontroller::class, 'generate'])->name('gajipegawai.generate');
    Route::get('/admin/datagajipegawai/cetak', [admingajipegawaicontroller::class, 'cetak'])->name('gajipegawai.cetak');
    Route::get('/admin/datagajipegawai/cetakperid/{id}/{cari?}', [admingajipegawaicontroller::class, 'cetakperid'])->name('gajipegawai.cetakperid');
    Route::get('/admin/datagajipegawaicetakperid/cetakperid_all/{cari?}', [admingajipegawaicontroller::class, 'cetakperid_all'])->name('gajipegawai.cetakperid.all');

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
    Route::post('/admin/datagajiguru/generate', [admingajigurucontroller::class, 'generate'])->name('gajiguru.generate');
    Route::get('/admin/datagajiguru/cetak', [admingajigurucontroller::class, 'cetak'])->name('gajiguru.cetak');
    Route::get('/admin/datagajiguru/cetakperid/{id}/{cari?}', [admingajigurucontroller::class, 'cetakperid'])->name('gajiguru.cetakperid');
    Route::get('/admin/datagajiguru/cetakperid_all/{cari?}', [admingajigurucontroller::class, 'cetakperid_all'])->name('gajiguru.cetakperid.all');


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



Route::get('/bendahara/login', [bendaharaLandingController::class, 'index'])->name('bendahara.login');
Route::post('/bendahara/login', [bendaharaLandingController::class, 'do_login'])->name('bendahara.login.do');
// !menu bendahara
Route::group(['middleware' => ['auth:bendahara', 'verified']], function () {
    // Route::get('/tes/gajiguru', [admingajigurucontroller::class, 'index']);
    // Route::get('/tes/gajiguru', [admingajigurucontroller::class, 'index'])->name('bendahara.test');
    // Route::get('/tes/guru', [admingurucontroller::class, 'index'])->name('bendahara.testing');
    // Route::get('/bendahara/gajiguru', [admingajigurucontroller::class, 'index'])->name('bendahara.gajiguru');
    //* menu fixed
    // Route::get('/bendahara/settingsgaji', [bendaharaGajiGuruController::class, 'settinggaji'])->name('bendahara.settingsgaji');
    Route::get('/bendahara/dashboard', [adminBendaharaController::class, 'dashboard'])->name('bendahara.dashboard');
    Route::get('/bendahara/settingsgaji', [bendaharaGajiGuruController::class, 'settingsgaji'])->name('bendahara.settingsgaji');
    Route::post('/bendahara/datasettingsgaji', [bendaharaGajiGuruController::class, 'settingsgaji_store'])->name('bendahara.settingsgaji.store');


    Route::get('/bendahara/guru', [bendaharaGuruController::class, 'index'])->name('bendahara.guru');
    Route::get('/bendahara/guru/{id}', [bendaharaGuruController::class, 'edit'])->name('bendahara.guru.edit');
    Route::put('/bendahara/guru/{id}', [bendaharaGuruController::class, 'update'])->name('bendahara.guru.update');
    Route::delete('/bendahara/guru/{id}', [bendaharaGuruController::class, 'destroy'])->name('bendahara.guru.destroy');
    Route::get('/bendahara/dataguru/cari', [bendaharaGuruController::class, 'cari'])->name('bendahara.guru.cari');
    Route::get('/bendahara/dataguru/create', [bendaharaGuruController::class, 'create'])->name('bendahara.guru.create');
    Route::post('/bendahara/dataguru', [bendaharaGuruController::class, 'store'])->name('bendahara.guru.store');


    Route::get('/bendahara/gajiguru', [bendaharaGajiGuruController::class, 'index'])->name('bendahara.gajiguru');
    Route::post('/bendahara/datagajiguru/generate', [bendaharaGajiGuruController::class, 'generate'])->name('bendahara.gajiguru.generate');
    Route::get('/bendahara/gajiguru/{id}', [bendaharaGajiGuruController::class, 'edit'])->name('bendahara.gajiguru.edit');
    Route::put('/bendahara/gajiguru/{id}', [bendaharaGajiGuruController::class, 'update'])->name('bendahara.gajiguru.update');
    Route::delete('/bendahara/gajiguru/{id}', [bendaharaGajiGuruController::class, 'destroy'])->name('bendahara.gajiguru.destroy');


    Route::get('/bendahara/pegawai', [bendaharaPegawaiController::class, 'index'])->name('bendahara.pegawai');
    Route::get('/bendahara/pegawai/{id}', [bendaharaPegawaiController::class, 'edit'])->name('bendahara.pegawai.edit');
    Route::put('/bendahara/pegawai/{id}', [bendaharaPegawaiController::class, 'update'])->name('bendahara.pegawai.update');
    Route::delete('/bendahara/pegawai/{id}', [bendaharaPegawaiController::class, 'destroy'])->name('bendahara.pegawai.destroy');
    Route::get('/bendahara/datapegawai/cari', [bendaharaPegawaiController::class, 'cari'])->name('bendahara.pegawai.cari');
    Route::get('/bendahara/datapegawai/create', [bendaharaPegawaiController::class, 'create'])->name('bendahara.pegawai.create');
    Route::post('/bendahara/datapegawai', [bendaharaPegawaiController::class, 'store'])->name('bendahara.pegawai.store');

    Route::get('/bendahara/gajipegawai', [bendaharaGajiPegawaiController::class, 'index'])->name('bendahara.gajipegawai');
    Route::get('/bendahara/gajipegawai/{id}', [bendaharaGajiPegawaiController::class, 'edit'])->name('bendahara.gajipegawai.edit');
    Route::put('/bendahara/gajipegawai/{id}', [bendaharaGajiPegawaiController::class, 'update'])->name('bendahara.gajipegawai.update');
    Route::delete('/bendahara/gajipegawai/{id}', [bendaharaGajiPegawaiController::class, 'destroy'])->name('bendahara.gajipegawai.destroy');
    Route::post('/bendahara/datagajipegawai/generate', [bendaharaGajiPegawaiController::class, 'generate'])->name('bendahara.gajipegawai.generate');
});


Route::get('/bendahara/datagajiguru/cetak', [bendaharaGajiGuruController::class, 'cetak'])->name('bendahara.gajiguru.cetak');
// Route::get('/bendahara/datagajiguru/cetakperid_all', [bendaharaGajiGuruController::class, 'cetakperid_all'])->name('bendahara.gajiguru.cetakperid.all');
Route::get('/bendahara/datagajiguru/cetakperid_all/{cari?}', [bendaharaGajiGuruController::class, 'cetakperid_all'])->name('bendahara.gajiguru.cetakperid.all');
Route::get('/bendahara/datagajiguru/cetakperid/{id}/{cari?}', [bendaharaGajiGuruController::class, 'cetakperid'])->name('bendahara.gajiguru.cetakperid');
Route::get('/bendahara/datagajipegawai/cetak', [bendaharaGajiPegawaiController::class, 'cetak'])->name('bendahara.gajipegawai.cetak');
Route::get('/bendahara/datagajipegawaicetakperid/cetakperid_all/{cari?}', [bendaharaGajiPegawaiController::class, 'cetakperid_all'])->name('bendahara.gajipegawai.cetakperid.all');
Route::get('/bendahara/datagajipegawaicetakperid/{id}/{cari?}', [bendaharaGajiPegawaiController::class, 'cetakperid'])->name('bendahara.gajipegawai.cetakperid');

Route::get('/kepsek/login', [kepsekLandingController::class, 'index'])->name('kepsek.login');
Route::post('/kepsek/login', [kepsekLandingController::class, 'do_login'])->name('kepsek.login.do');
// !menu kepsek
Route::group(['middleware' => ['auth:kepsek', 'verified']], function () {
    // Route::get('/tes/gajiguru', [admingajigurucontroller::class, 'index']);
    // Route::get('/tes/gajiguru', [admingajigurucontroller::class, 'index']);
    Route::get('/kepsek/dashboard', [adminKepsekController::class, 'dashboard'])->name('kepsek.dashboard');
    //* menu fixed
    Route::get('/kepsek/laporan', [kepsekLaporanController::class, 'index'])->name('kepsek.laporan');
    Route::get('/kepsek/laporan/guru', [kepsekLaporanController::class, 'index'])->name('kepsek.laporan.guru');
    Route::get('/kepsek/laporan/pegawai', [kepsekLaporanController::class, 'index'])->name('kepsek.laporan.pegawai');
});

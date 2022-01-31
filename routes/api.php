<?php

use App\Http\Controllers\API\apiprodukcontroller;
use App\Http\Controllers\siakadadmininputnilaicontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/data/produk', [apiprodukcontroller::class, 'produk'])->name('api.produk.index');
Route::get('/data/treatment', [apiprodukcontroller::class, 'treatment'])->name('api.treatment.index');
Route::get('/data/dokter', [apiprodukcontroller::class, 'dokter'])->name('api.dokter.index');
Route::get('/data/testimoni', [apiprodukcontroller::class, 'testimoni'])->name('api.testimoni.index');
// Route::resource('/post', siakadadmininputnilaicontroller::class);

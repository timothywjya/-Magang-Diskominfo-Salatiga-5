<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', function () {
    return view('Auth/login');
});

//Route User
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth'); 
Route::get('index', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::post('userstore', [App\Http\Controllers\UserController::class, 'userstore'])->name('userstore');
Route::resource('/users', \App\Http\Controllers\UserController::class)->middleware('auth');

//Route Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Auth::routes();
Route::get('auth/{provider}', 'App\Http\Controllers\UserController@redirectToProvider');
Route::get('auth/{provider}/callback', 'App\Http\Controllers\UserController@handleProviderCallback');

//Route Ruangan
Route::get('/ruang', [App\Http\Controllers\RuangController::class, 'ruang'])->name('ruang');
Route::get('/ruangan/{id}', [App\Http\Controllers\RuangController::class, 'ruangan'])->name('ruangan');
Route::get('/detail/{id}', [App\Http\Controllers\RuangController::class, 'detail'])->name('detail');
Route::get('/tambahruangan/{id}', [App\Http\Controllers\RuangController::class, 'tambahruangan'])->name('tambahruangan');
Route::post('/ruangancreate', [App\Http\Controllers\RuangController::class, 'ruangancreate'])->name('ruangancreate');
Route::get('/ruang1', [App\Http\Controllers\RuangController::class, 'ruang1'])->name('ruang1');
Route::resource('/ruang', App\Http\Controllers\RuangController::class)->middleware('auth');
Route::get('/create2', [App\Http\Controllers\RuangController::class, 'create2'])->name('create2');

//Route Dinas
Route::group(['middleware' => ['auth','CekLevel:admin']], function(){
Route::get('/tambahdinas', [App\Http\Controllers\DinasController::class, 'tambahdinas'])->name('tambahdinas');
Route::post('/dinascreate', [App\Http\Controllers\DinasController::class, 'dinascreate'])->name('dinascreate');
Route::get('/lihatdinas', [App\Http\Controllers\DinasController::class, 'lihatdinas'])->name('lihatdinas');
Route::resource('/dinas', App\Http\Controllers\DinasController::class)->middleware('auth');
});

//Route Pinjaman
Route::get('/pinjam', [App\Http\Controllers\PeminjamanController::class, 'pinjam'])->name('pinjam');
Route::post('/simpanpinjaman', [App\Http\Controllers\PeminjamanController::class, 'simpanpinjaman'])->name('simpanpinjaman');
Route::get('/lihatrequest', [App\Http\Controllers\PeminjamanController::class, 'lihatrequest'])->name('lihatrequest');
Route::get('/KonfirmasiPinjaman/{id}', [App\Http\Controllers\PeminjamanController::class, 'KonfirmasiPinjaman'])->name('KonfirmasiPinjaman');
Route::post('/KonfirmasiStore/{id}', [App\Http\Controllers\PeminjamanController::class, 'KonfirmasiStore'])->name('KonfirmasiStore');
Route::get('/reqsaya', [App\Http\Controllers\PeminjamanController::class, 'reqsaya'])->name('reqsaya');
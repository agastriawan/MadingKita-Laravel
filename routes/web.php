<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\SekolahController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\ViewSekolahController;
use App\Http\Controllers\ViewOrganisasiController;
use App\Http\Controllers\ViewEkskulController;
use App\Http\Controllers\ViewSiswaController;


use App\Models\Sekolah;
use App\Models\Organisasi;
use App\Models\Ekskul;
use App\Models\Artikel;
use App\Models\Siswa;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|  v
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', [
        'sekolahs' => Sekolah::latest()->first(),
        'organisasis' => Organisasi::latest()->first(),
        'ekskuls' => Ekskul::latest()->first(),
        'siswas' => Siswa::latest()->first(),
    ]);
});

Route::get('/mading', function () {
    return view('sekolah.mading', [
        'active' => 'mading',
        'sekolahs' => Sekolah::first(),
    ]);
});

Route::get('/organisasi', function () {
    return view('organisasi.mading', [
        'organisasis' => Organisasi::first(),
    ]);
});

Route::get('/ekskul', function () {
    return view('ekskul.mading', [
        'ekskuls' => Ekskul::first(),
    ]);
});

Route::get('/siswa', function () {
    return view('siswa.mading', [
        'siswas' => Siswa::first(),
    ]);
});

Route::get('/mading-detail', function () {
    return view('sekolah.mading-detail');
});


Route::get('/contact', function () {
    return view('contact', [
        'active' => 'contact'
    ]);
});




Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //middleware('guest') => ini hanya bisa diakses oleh user yang belum ter-authenticate // name => buat ngasih tau kalau itu halaman login
Route::post('/login', [LoginController::class, 'authenticate']);

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); // store => biasa digunakan untuk menyimpan

Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth');



Route::resource('/admin/sekolah', SekolahController::class)->middleware('auth');
Route::resource('/admin/organisasi', OrganisasiController::class)->middleware('auth');
Route::resource('/admin/ekskul', EkskulController::class)->middleware('auth');
Route::resource('/admin/siswa', SiswaController::class)->middleware('auth');

Route::resource('/admin/artikel', ArtikelController::class)->middleware('auth');
Route::get('/artikel', [ArtikelController::class, 'create'])->middleware('guest');
Route::post('/artikel', [ArtikelController::class, 'store']);

Route::resource('/mading', ViewSekolahController::class);
Route::resource('/organisasi', ViewOrganisasiController::class);
Route::resource('/ekskul', ViewEkskulController::class);
Route::resource('/siswa', ViewSiswaController::class);


// Route::get('/contact','App\Http\Controllers\MailController@index');


Route::get('contact', [ContactController::class, 'index']);
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');


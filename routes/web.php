<?php
use App\Models\Industri;
use App\Models\artikel;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     $industri = Industri::all();
//     return view('welcome', compact('industri'));

Route::get('/', function () {
    $artikel = artikel::all();
    return view('welcome', compact('artikel'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// tambah dibawah ini
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');
Route::resource('fasilitas', App\Http\Controllers\FasilitasController::class)->middleware('auth');
Route::resource('eskul', App\Http\Controllers\EskulController::class)->middleware('auth');
Route::resource('artikel', App\Http\Controllers\ArtikelController::class)->middleware('auth');
Route::resource('jurusan', App\Http\Controllers\JurusanController::class)->middleware('auth');
Route::resource('industri', App\Http\Controllers\IndustriController::class)->middleware('auth');
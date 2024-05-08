<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return '<h1>Halo, Gamelab Indonesia</h1>';
});

Route::get('/user/{id}', function ($id) {
    return '<h1>Ini adalah halaman User : '.$id.'</h1>';
});

Route::get('user/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::resource('/artikel', ArtikelController::class);
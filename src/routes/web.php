<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageSettings;
use App\Http\Controllers\Ro1Normalisation;
use App\Http\Controllers\RO1CIP;
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
    return view('home');
});

Route::get('/home', function () {return view('home');})->name('home');
Route::get('/ro1norm', function () {return view('ro1_normalisation');});
Route::get('/ro1_cip', [PageSettings::class, 'settings']);
Route::get('/uf_north_south', function () {return view('ultrafiltration');});

Route::POST('/ro1_cip', [RO1CIP::class, 'cipRoList'])->name('cip.list');
Route::POST('/ro1norm', [RO1Normalisation::class, 'firstPassNorms'])->name('ro1.norms');

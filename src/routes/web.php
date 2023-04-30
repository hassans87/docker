<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageSettings;
use App\Http\Controllers\Ro1Normalisation;
use App\Http\Controllers\RO2Normalisation;
use App\Http\Controllers\RO1CIP;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswardController;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
Route::get('/', function () {return view('home');});
|
*/


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/', [UserController::class, 'login']);
Route::get('/home', function () {return view('home');})->name('home')->middleware('auth');
Route::get('/ro1norm', function () {return view('ro1_normalisation');})->middleware('auth');
Route::get('/ro2norm', function () {return view('ro2_normalisation');})->middleware('auth');
Route::get('/ro1_cip', [PageSettings::class, 'settings'])->middleware('auth');
Route::get('/uf_north_south', function () {return view('ultrafiltration');});
  
Route::get('forgot-password', [PasswardController::class, 'forgotPassword'])->name('forgot-password');
Route::get('forgot-password/{token}', [PasswardController::class, 'forgotPasswordValidate']);
Route::post('forgot-password', [PasswardController::class, 'resetPassword'])->name('forgot-password');
Route::put('reset-password', [PasswardController::class, 'updatePassword'])->name('reset-password');


//RO Block
Route::POST('/ro1norm', [RO1Normalisation::class, 'firstPassNorms'])->name('ro1.norms');
Route::POST('/ro2norm', [RO2Normalisation::class, 'secondPassNorms'])->name('ro2.norms');
Route::POST('/ro1_cip', [RO1CIP::class, 'cipRoList'])->name('cip.list');

//user login request
ROUTE::POST('/users/authenticate',[UserController::class, 'authenticate']);


Route::get('/register', [UserController::class, 'create'])->middleware('auth');

// Create New User
Route::POST('/users', [UserController::class, 'store'])->middleware('auth');
// Log User Out
Route::POST('/logout', [UserController::class, 'logout'])->middleware('auth');
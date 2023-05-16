<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageSettings;
use App\Http\Controllers\Ro1Normalisation;
use App\Http\Controllers\RO2Normalisation;
use App\Http\Controllers\RO1CIP;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswardController;
use App\Http\Controllers\SWIntake;
use App\Http\Controllers\DAFNorthSouth;
use App\Http\Controllers\UltraFiltration;
use App\Http\Controllers\PostTreatment;
use App\Http\Controllers\ROFeedQuality;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
Route::get('/', function () {return view('home');});

*/

//GET request handler
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/', [UserController::class, 'login']);
Route::get('/home', function () {return view('home');})->name('home')->middleware('auth');
Route::get('/swintake', function () {return view('sw_intake');})->middleware('auth');
Route::get('/dafnorth', function () {return view('daf_north');})->middleware('auth');
Route::get('/dafsouth', function () {return view('daf_south');})->middleware('auth');
Route::get('/scf', function () {return view('self_cleaning_filters');})->middleware('auth');
Route::get('/uf_north', function () {return view('uf_north_line');})->middleware('auth');
Route::get('/uf_south', function () {return view('uf_south_line');})->middleware('auth');
Route::get('/ROfeed', function () {return view('ro_feed');})->middleware('auth');
Route::get('/ro1norm', function () {return view('ro1_normalisation');})->middleware('auth');
Route::get('/ro2norm', function () {return view('ro2_normalisation');})->middleware('auth');
Route::get('/ro1_cip', [PageSettings::class, 'settings'])->middleware('auth');
Route::get('/importExport', function () {return view('import_export');})->middleware('auth');
Route::get('/brine', function () {return view('brine_break');})->middleware('auth');
Route::get('/PostCO2', function () {return view('post_co2');})->middleware('auth');
Route::get('/PostCl2', function () {return view('post_cl2');})->middleware('auth');
Route::get('/PostLime', function () {return view('post_lime');})->middleware('auth');

//Lab Routes
Route::get('/labCoolingWaterExport', function () {return view('lab_export_cw');})->middleware('auth');
Route::get('/labDeminWaterExport', function () {return view('lab_export_dw');})->middleware('auth');
Route::get('/labRoFeed', function () {return view('lab_rofeed');})->middleware('auth');

//Maintenance Routes
Route::get('/DefectsMain', function () {return view('defects_menu');})->middleware('auth');


// forgot passward handler
Route::get('forgot-password', [PasswardController::class, 'forgotPassword'])->name('forgot-password');
Route::get('forgot-password/{token}', [PasswardController::class, 'forgotPasswordValidate']);
Route::post('forgot-password', [PasswardController::class, 'resetPassword'])->name('forgot-password');
Route::put('reset-password', [PasswardController::class, 'updatePassword'])->name('reset-password');

//Post Requests handler
Route::POST('/swintake', [SWIntake::class, 'seawaterIntake'])->name('seawater.intake')->middleware('auth');
Route::POST('/dafnorth', [DAFNorthSouth::class, 'dafNorthLine'])->name('dafnorth')->middleware('auth');
Route::POST('/dafsouth', [DAFNorthSouth::class, 'dafSouthLine'])->name('dafsorth')->middleware('auth');
Route::POST('/scf', [DAFNorthSouth::class, 'selfCleaningFilters'])->name('dafsorth')->middleware('auth');
Route::POST('/uf_north', [UltraFiltration::class, 'ufNorthSkids'])->name('ufnorth')->middleware('auth');
Route::POST('/uf_south', [UltraFiltration::class, 'ufSouthSkids'])->name('ufsouth')->middleware('auth');
Route::POST('/ROfeed', [ROFeedQuality::class, 'roFeedQc'])->name('ro.feed')->middleware('auth');
Route::POST('/ro1norm', [RO1Normalisation::class, 'firstPassNorms'])->name('ro1.norms')->middleware('auth');
Route::POST('/ro2norm', [RO2Normalisation::class, 'secondPassNorms'])->name('ro2.norms')->middleware('auth');
Route::POST('/ro1_cip', [RO1CIP::class, 'cipRoList'])->name('cip.list')->middleware('auth');
Route::POST('/importExport', [PostTreatment::class, 'importExport'])->middleware('auth');
Route::POST('/brine', [PostTreatment::class, 'brineBreakTnk'])->middleware('auth');
Route::POST('/PostCO2', [PostTreatment::class, 'postCO2'])->middleware('auth');
Route::POST('/PostCl2', [PostTreatment::class, 'postCl2'])->middleware('auth');
Route::POST('/PostLime', [PostTreatment::class, 'postLime'])->middleware('auth');
Route::POST('/labCoolingWaterExport', [PostTreatment::class, 'labCoolingWaterExport'])->middleware('auth');
Route::POST('/labDeminWaterExport', [PostTreatment::class, 'labDeminWaterExport'])->middleware('auth');
Route::POST('/labRoFeed', [PostTreatment::class, 'labDeminWaterExport'])->middleware('auth');
//user login/loutout, new user request
ROUTE::POST('/users/authenticate',[UserController::class, 'authenticate']);
Route::get('/register', [UserController::class, 'create'])->middleware('auth');
Route::POST('/users', [UserController::class, 'store'])->middleware('auth');
Route::POST('/logout', [UserController::class, 'logout'])->middleware('auth');

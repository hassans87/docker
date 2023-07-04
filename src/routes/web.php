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
use App\Http\Controllers\OperationDCS;
use App\Http\Controllers\DataExport;
use App\Http\Controllers\Defects;
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

Route::get('/ro1norm', [RO1Normalisation::class, 'viewRO1Normalization'])->middleware('auth');
Route::PUT('/ro1norm', [PageSettings::class, 'savePref']);
Route::GET('/ro1dataExport', [RO1Normalisation::class, 'ro1DataExpView'])->middleware('auth');
Route::POST('/ro1dataExport', [RO1Normalisation::class, 'ro1DataExportTable'])->middleware('auth');
Route::get('/ro2norm', function () {return view('ro2_normalisation');})->middleware('auth');
Route::get('/ro1_cip', [RO1Normalisation::class, 'ro1CIP'])->middleware('auth');
Route::get('/importExport', function () {return view('import_export');})->middleware('auth');
Route::get('/brine', function () {return view('brine_break');})->middleware('auth');
Route::get('/PostCO2', function () {return view('post_co2');})->middleware('auth');
Route::get('/PostCl2', function () {return view('post_cl2');})->middleware('auth');
Route::get('/PostLime', function () {return view('post_lime');})->middleware('auth');

// data download GET requests
Route::GET('/dataExportVeolinkCare', [DataExport::class, 'dataMainpage'])->middleware('auth');

// data download PUT request
Route::GET('/dataExportVeolinkCare', [DataExport::class, 'ro1DataTableView'])->middleware('auth');
Route::PUT('/dataExportVeolinkCare', [DataExport::class, 'roFirstDataEp'])->middleware('auth');
//Lab Routes
Route::get('/labCoolingWaterExport', function () {return view('lab_export_cw');})->middleware('auth');
Route::get('/labDeminWaterExport', function () {return view('lab_export_dw');})->middleware('auth');
Route::get('/labRoFeed', function () {return view('lab_rofeed');})->middleware('auth');
//Operations Routes
Route::get('/RO1Conductvity', function () {return view('ro1dcs_ec');})->middleware('auth');
Route::POST('/RO1Conductvity', [OperationDCS::class, 'ro1ECfromDCS'])->middleware('auth');
Route::get('/RO2Conductvity', function () {return view('ro2dcs_ec');})->middleware('auth');
Route::POST('/RO2Conductvity', [OperationDCS::class, 'ro2ECfromDCS'])->middleware('auth');
Route::get('/RO1DPI', function () {return view('ro1dcs_dpi');})->middleware('auth');
Route::POST('/RO1DPI', [OperationDCS::class, 'ro1DPIfromDCS'])->middleware('auth');
Route::get('/BlendingTank', function () {return view('blending_tnk');})->middleware('auth');
Route::POST('/BlendingTank', [PostTreatment::class, 'permeateBlendingTank'])->middleware('auth');
Route::get('/onlineDBNPA', function () {return view('dbnpa_onlinetest');})->middleware('auth');
Route::POST('/onlineDBNPA', [OperationDCS::class, 'onlineDBNPAtest'])->middleware('auth');
//Maintenance Routes
ROUTE::GET('/DefectsMain',[Defects::class, 'defectMainView'])->middleware('auth');
ROUTE::GET('/addnewDefect',[Defects::class, 'newDefectView'])->middleware('auth');
ROUTE::GET('/defectReview/{id}',[Defects::class, 'defectReviewLoading'])->middleware('auth');
ROUTE::POST('/newDefectSubmission',[Defects::class, 'addNewDefectData'])->middleware('auth');
ROUTE::GET('/raw_defects_list',[Defects::class, 'rawDefectsList'])->middleware('auth');
ROUTE::GET('/mdrf_defects_list',[Defects::class, 'mdrfDefectsList'])->middleware('auth');
ROUTE::GET('/mdrfReview/{id}',[Defects::class, 'ReviewMDRFLoading'])->middleware('auth');
//Route::GET('/raw_defects_list', function () {return view('raw_defects_list');})->middleware('auth');
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

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




// data analytics get request
Route::get('/swintake', [SWIntake::class, 'swintakeView'])->middleware('auth');
Route::get('/ro1norm', [RO1Normalisation::class, 'viewRO1Normalization'])->middleware('auth');
Route::get('/dafnorth', [DAFNorthSouth::class, 'dafNorthView'])->middleware('auth');
Route::get('/dafsouth',[DAFNorthSouth::class, 'dafSouthView'])->middleware('auth'); 
Route::get('/scf',[DAFNorthSouth::class, 'scfView'])->middleware('auth'); 
Route::get('/uf_north', [UltraFiltration::class, 'ufNorthView'])->middleware('auth');
Route::get('/uf_south', [UltraFiltration::class, 'ufSouthView'])->middleware('auth');

Route::get('/ro2norm', [RO2Normalisation::class, 'viewRO2Normalization'])->middleware('auth');

Route::get('/ROfeed', function () {return view('ro_feed');})->middleware('auth');

Route::get('/ro1_cip', [RO1Normalisation::class, 'ro1CIP'])->middleware('auth');
Route::get('/importExport', function () {return view('import_export');})->middleware('auth');
Route::get('/brine', function () {return view('brine_break');})->middleware('auth');
Route::get('/PostCO2', function () {return view('post_co2');})->middleware('auth');
Route::get('/PostCl2', function () {return view('post_cl2');})->middleware('auth');
Route::get('/PostLime', function () {return view('post_lime');})->middleware('auth');
Route::get('/labCoolingWaterExport', function () {return view('lab_export_cw');})->middleware('auth');
Route::get('/labDeminWaterExport', function () {return view('lab_export_dw');})->middleware('auth');
Route::get('/labRoFeed', function () {return view('lab_rofeed');})->middleware('auth');
Route::get('/RO1Conductvity', function () {return view('ro1dcs_ec');})->middleware('auth');
Route::get('/RO2Conductvity', function () {return view('ro2dcs_ec');})->middleware('auth');
Route::get('/RO1DPI', function () {return view('ro1dcs_dpi');})->middleware('auth');
Route::get('/BlendingTank', function () {return view('blending_tnk');})->middleware('auth');
Route::get('/onlineDBNPA', function () {return view('dbnpa_onlinetest');})->middleware('auth');
Route::get('/normscomparison', function () {return view('ro_firstpass_comp');})->middleware('auth');
Route::get('/DataCleansing', function () {return view('db_data_cleansing');})->middleware('auth');
Route::get('/DataCleansing/RO1DataCleansing', function () {return view('ro1_data_cleansing');})->middleware('auth');
// data export GET requests
Route::GET('/ro1dataExport', [RO1Normalisation::class, 'ro1DataExpView'])->middleware('auth');

// data export POST requests
Route::POST('/ro1dataExport', [RO1Normalisation::class, 'ro1DataExportTable'])->middleware('auth');


// PUT Request for User pref saving
Route::PUT('/swintake', [PageSettings::class, 'savePref']);
Route::PUT('/dafnorth', [PageSettings::class, 'savePref']);
Route::PUT('/dafsouth', [PageSettings::class, 'savePref']);
Route::PUT('/scf', [PageSettings::class, 'savePref']);
Route::PUT('/uf_north', [PageSettings::class, 'savePref']);
Route::PUT('/uf_south', [PageSettings::class, 'savePref']);
Route::PUT('/ROfeed', [PageSettings::class, 'savePref']);
Route::PUT('/ro1norm', [PageSettings::class, 'savePref']);
Route::PUT('/ro2norm', [PageSettings::class, 'savePref']);
Route::PUT('/ro1_cip', [PageSettings::class, 'savePref']);
Route::PUT('/importExport', [PageSettings::class, 'savePref']);
Route::PUT('/brine', [PageSettings::class, 'savePref']);
Route::PUT('/PostCO2', [PageSettings::class, 'savePref']);
Route::PUT('/PostCl2', [PageSettings::class, 'savePref']);
Route::PUT('/PostLime', [PageSettings::class, 'savePref']);
Route::PUT('/BlendingTank', [PageSettings::class, 'savePref']);
Route::PUT('/RO1Conductvity', [PageSettings::class, 'savePref']);
Route::PUT('/RO2Conductvity', [PageSettings::class, 'savePref']);
Route::PUT('/RO1DPI', [PageSettings::class, 'savePref']);







//Maintenance and defects Routes
ROUTE::GET('/DefectsMain',[Defects::class, 'defectMainView'])->middleware('auth');
ROUTE::GET('/addnewDefect',[Defects::class, 'newDefectView'])->middleware('auth');
ROUTE::GET('/defectReview/{id}',[Defects::class, 'defectReviewLoading'])->middleware('auth');
ROUTE::POST('/newDefectSubmission',[Defects::class, 'addNewDefectData'])->middleware('auth');
ROUTE::GET('/raw_defects_list',[Defects::class, 'rawDefectsList'])->middleware('auth');
ROUTE::GET('/mdrf_defects_list',[Defects::class, 'mdrfDefectsList'])->middleware('auth');
ROUTE::GET('/mdrfReview/{id}',[Defects::class, 'ReviewMDRFLoading'])->middleware('auth');
//Route::GET('/raw_defects_list', function () {return view('raw_defects_list');})->middleware('auth');
// forgot passward handler
//Route::get('forgot-password', [PasswardController::class, 'forgotPassword'])->name('forgot-password');
//Route::get('forgot-password/{token}', [PasswardController::class, 'forgotPasswordValidate']);
//Route::post('forgot-password', [PasswardController::class, 'resetPassword'])->name('forgot-password');
//Route::put('reset-password', [PasswardController::class, 'updatePassword'])->name('reset-password');

//Post Requests for data
Route::POST('/checkpoint',  [UserController::class, 'checkme'])->name('login.check');

Route::POST('/swintake', [SWIntake::class, 'seawaterIntake'])->name('seawater.intake')->middleware('auth');
Route::POST('/dafnorth', [DAFNorthSouth::class, 'dafNorthLine'])->name('dafnorth')->middleware('auth');
Route::POST('/dafsouth', [DAFNorthSouth::class, 'dafSouthLine'])->name('dafsorth')->middleware('auth');
Route::POST('/scf', [DAFNorthSouth::class, 'selfCleaningFilters'])->name('dafsorth')->middleware('auth');
Route::POST('/uf_north', [UltraFiltration::class, 'ufNorthSkids'])->name('ufnorth')->middleware('auth');
Route::POST('/uf_south', [UltraFiltration::class, 'ufSouthSkids'])->name('ufsouth')->middleware('auth');
Route::POST('/ROfeed', [ROFeedQuality::class, 'roFeedQc'])->name('ro.feed')->middleware('auth');
Route::POST('/ro1norm', [RO1Normalisation::class, 'firstPassNorms'])->name('ro1.norms')->middleware('auth');
Route::POST('/normscomparison', [RO1Normalisation::class, 'firstPassComp'])->name('ro1.com')->middleware('auth');
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
Route::POST('/RO2Conductvity', [OperationDCS::class, 'ro2ECfromDCS'])->middleware('auth');
Route::POST('/RO1Conductvity', [OperationDCS::class, 'ro1ECfromDCS'])->middleware('auth');
Route::POST('/RO1DPI', [OperationDCS::class, 'ro1DPIfromDCS'])->middleware('auth');
Route::POST('/BlendingTank', [PostTreatment::class, 'permeateBlendingTank'])->middleware('auth');
Route::POST('/onlineDBNPA', [OperationDCS::class, 'onlineDBNPAtest'])->middleware('auth');
// data cleansing requests handling
Route::POST('/DataCleansing/RO1DataCleansing', [RO1Normalisation::class, 'firstPassDataCleansing'])->middleware('auth');

//user login/loutout, new user request
Route::middleware(['throttle:3,1'])->group(function () {
ROUTE::POST('/users/authenticate',[UserController::class, 'authenticate']);
Route::get('/register', [UserController::class, 'create'])->middleware('auth');
Route::POST('/users', [UserController::class, 'store'])->middleware('auth');
});
Route::POST('/logout', [UserController::class, 'logout'])->middleware('auth');

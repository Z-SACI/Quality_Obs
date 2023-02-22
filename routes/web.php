<?php

use App\Http\Controllers\EprouvettesController;
use App\Http\Controllers\groupeController;
use App\Http\Controllers\InfoAffairesController;
use App\Http\Controllers\PrelevementsController;
use App\Http\Controllers\statsController;
use App\Http\Controllers\TaffaireController;
use App\Http\Controllers\TblocController;
use App\Http\Controllers\TSitesController;
use App\Http\Controllers\sitesController;
use App\Models\Tbloc;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OuvragesController;
use App\Http\Controllers\ElementsController;

use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
//     // return view('auth.login');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
// Main pages
    Route::get('dashboard',[statsController::class,'n_prj_drs'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::get('projets', [InfoAffairesController::class, 'index'])->name('admin.affaires');
    Route::get('projets/info/{prj_id}',[InfoAffairesController::class,'get_info'])->name('GetPrjInfo');
// Profile User OPS
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
// Ouvrages
    Route::get('ouvrages',[OuvragesController::class,'ouvrages'])->name('admin.ouvrages');
// Elements 
    Route::get('ouvrages/elements/{ouv_id}',[ElementsController::class,'elements'])->name('admin.elements');
    Route::post('ouvrages/elements', [ElementsController::class,'element_add'])->name('AddElement');
    Route::post('ouvrages/elements/', [ElementsController::class,'element_add'])->name('AddElement');
    Route::get('ouvrages/elements/delete/{elem_id}',[ElementsController::class,'element_delete'])->name('DeleteElement');
    Route::get('ouvrages/elements/update/{elem_id}', [ElementsController::class, 'element_upd'])->name('UpdateElement');
    Route::post('ouvrages/elements/save/{elem_id}', [ElementsController::class, 'element_upd_save'])->name('SaveUpdElement');
    Route::get('elements/{code_affaire}/{site}/{bloc}', [ElementsController::class, 'elem_ouv'])->name('getElemOuv');
// Prélèvements Ecrasements
    Route::get('ouvrages/elements{elem_id}/prelevements',[PrelevementsController::class,'prelevements'])->name('admin.prelevements');
    Route::get('prelevements/{elem_id}',[PrelevementsController::class,'index'])->name('prelevements');
    
    Route::post('ouvrages/elements/prelevement_add',[PrelevementsController::class,'prelevement_add'])->name('admin.prelevement_add');
    Route::get('ouvrages/prelevements/delete/{pe_id}',[PrelevementsController::class,'prelevement_delete'])->name('DeletePrelevement');
    Route::get('ouvrages/upd_prelevement/{pe_id}',[PrelevementsController::class,'prelevement_get'])->name('GetPrelevement');
    // page prlevements
    Route::get('prelevements/', [PrelevementsController::class, 'show'])->name('ShowPrelevements');
    Route::get('Essais/', [PrelevementsController::class, 'showpv'])->name('ShowEssais');
    // Route::get('prelevement', [PrelevementsController::class, 'showPrlv'])->name('ShowPrelevement');
    Route::get('getSite/{id}', [PrelevementsController::class,'getSite']);
    Route::get('getOuvrage/{id}', [PrelevementsController::class,'getOuvrage']);
    Route::get('getElement/{id}', [PrelevementsController::class,'getElem']);
    
    Route::post('ouvrages/save_prelevement', [PrelevementsController::class, 'prelevement_upd'])->name('UpdPrelevement');
//Eprouvettes
    Route::get('ouvrage/prelevements/eprouvettes/{pe_id}', [EprouvettesController::class, 'epr_all'])->name('GetEprouvettes'); //Used in 2pages .. leave in one page
    Route::get('eprouvettes/{epr_id}', [EprouvettesController::class, 'edit'])->name('GetEprouvetteById');
    Route::post('eprouvettes/update', [EprouvettesController::class, 'upd'])->name('EprouvetteUpd');
    Route::get('AjouterPrélèvement', [EprouvettesController::class,'Ajout'])->name('AddEprv');
    Route::get('AjouterPvEssais', [EprouvettesController::class,'new'])->name('AddPvEssais');
    Route::post('EnregistrerEprouv', [groupeController::class,'store'])->name('SaveEprouvette');
    Route::post('EnregistrerEprouvEntreprise', [groupeController::class,'storePvEssais'])->name('SavePvEssais');
    Route::get('AjoutEprouvette', [EprouvettesController::class,'Ajout'])->name('NewEprv');
    
    Route::post('EnregistrerMaj/{epr_id}', [EprouvettesController::class, 'eprv_upd'])->name('UpdEprouvette');
    // CRUD
    Route::get('eprouvettes/', [EprouvettesController::class, 'show'])->name('Eprouvettes');
    Route::get('eprouvettestest/', [EprouvettesController::class, 'showTest'])->name('EprouvettesTest');
    Route::get('eprouvette/', [EprouvettesController::class, 'showall'])->name('Eprouvette');
    Route::post('eprouvettes/Add', [EprouvettesController::class, 'create'])->name('AddEprouvettes');
    Route::post('eprouvettes/upd', [EprouvettesController::class, 'update'])->name('UpdEprouvettes');
    Route::get('eprouvettes/del/{epr_id}', [EprouvettesController::class, 'delete'])->name('DelEprouvettes');

    Route::get('getPrelevement/{id}', [EprouvettesController::class,'getprelev']);
    // RCTC
    Route::get('taffaires', [TaffaireController::class, 'index'])->name('TAffaires');
    Route::get('tsites/{code_affaire}', [TSitesController::class, 'index'])->name('TSites');
    Route::get('sites/{code_affaire}', [sitesController::class, 'index'])->name('Sites');
    Route::get('tblocs/{code_affaire}/{code_site}', [TblocController::class, 'index'])->name('TBlocs');
    Route::get('bloc/{code_affaire}/{code_site}', [OuvragesController::class, 'index'])->name('Blocs');
    Route::get('blocs/{code_affaire}/{code_site}', [ElementsController::class, 'elems'])->name('TBloc');
    // Route::get('tbloc/{code_affaire}/{code_site}/{code_bloc}', [TblocController::class, 'getOne'])->name('TBloc');

    
    Route::get('ouvrages/elements{elem_id}/prelevementsEntreprise',[PrelevementsController::class,'prelev_entreprise'])->name('admin.prelevementsEntreprise');
//Stats
    // Route::get('n_prj_drs', [statsController::class,'n_prj_drs'])->name('admin.nPrjDrs');
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');

    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('userChangePassword');
});
<?php

use App\Http\Controllers\CarteController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiteurController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dialogue', function () {
    return view('dialogue');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");

//route user
Route::resource('user', UserController::class)->middleware(['auth','admin']);
Route::get('/modifier/motdepasse',[UserController::class,'modifierMotDePasse'])->name("modifier.motdepasse")->middleware(['auth']);
Route::post('/update/password',[UserController::class,'updatePassword'])->name("user.password.update")->middleware(['auth']);//->middleware(["auth","checkMaxSessions"]);

//site
Route::resource('site', SiteController::class)->middleware(['auth','admin']);

//Service
Route::resource('service', ServiceController::class)->middleware(['auth','admin']);


//Employe
Route::resource('employe', EmployeController::class)->middleware(['auth','admin']);


Route::get('/teste', function () {
    return view('test');
});


//visiteur
Route::get('/visiteur_add', function () {
    return view('visiteur.add');
});
Route::resource('visiteur', VisiteurController::class)->middleware(['auth']);

//Entree
Route::resource('entree', EntreeController::class)->middleware(['auth']);
Route::get('/visiteur/by/site/{site}',[EntreeController::class,'getVisiteurBySite'])->name("visiteur.by.site")->middleware(['auth']);
Route::get('/save/sortie/{id}',[EntreeController::class,'saveSortir'])->name("save.sortie")->middleware(['auth']);



//employe
Route::get('/employe/by/service/{service}',[EmployeController::class,'getByService'])->name("employe.by.service")->middleware(['auth']);

Route::get('/nbemploye/by/service/{periode}',[HomeController::class,'serviceParVisiteur'])->name("nbvisiteur.par.service")->middleware(['auth']);


Route::get('/visiteur/par/service/{periode}/{service}',[HomeController::class,'visiteurParPeriode'])->name("visiteur.par.periode")->middleware(['auth']);

Route::get('/historique/{cni}',[VisiteurController::class,'historique'])->name("historique")->middleware(['auth']);


//Carte
Route::resource('carte', CarteController::class)->middleware(['auth']);
Route::get('/electeur/by/cni/{cni}',[CarteController::class,'getByCni'])->middleware(['auth']);

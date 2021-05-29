<?php

use Illuminate\Support\Facades\Route;
use App\Models\Demande;
use App\Models\Offre;

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

Route::get('/', function () {
	$dmds = Demande::all();
    $offs = Offre::all();
    return view('welcome',compact("dmds"),compact("offs"));
})->name('welcome');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('profiles','ProfileController')->middleware("auth");

Route::resource('offre','OffreController')->middleware("auth");

Route::resource('dmd','DemandeController')->middleware("auth");

Route::get('/offres/{id}', [App\Http\Controllers\OffreController::class, 'show'])->name('offre.show2');
Route::get('/dmds/{id}', [App\Http\Controllers\DemandeController::class, 'show'])->name('dmd.show2');




Route::get('/offre/{offre}/souscreate', [App\Http\Controllers\OffreController::class, 'souscreate'])->name('offre.souscreate')->middleware("auth");


Route::post('/offre/store', [App\Http\Controllers\OffreController::class, 'store'])->name('offre.store')->middleware("auth");
Route::post('/offre/{offre}/sousstore', [App\Http\Controllers\OffreController::class, 'sousstore'])->name('offre.sousstore')->middleware("auth");


Route::get('/sous/create', [App\Http\Controllers\SouscriptionController::class, 'create'])->name('sous.create')->middleware("auth");
Route::post('/sous/store', [App\Http\Controllers\SouscriptionController::class, 'store'])->name('sous.store')->middleware("auth");

Route::get('/sous/{id}/rdvcreate', [App\Http\Controllers\SouscriptionController::class, 'rdvcreate'])->name('rdv.create')->middleware("auth");
Route::post('/sous/{id}/rdvstore', [App\Http\Controllers\SouscriptionController::class, 'rdvstore'])->name('rdv.store')->middleware("auth");


Route::get('/retour', [App\Http\Controllers\OffreController::class, 'retour'])->name('retour');

Route::resource('image','ImageController')->middleware("auth");

Route::get('/search/get', [App\Http\Controllers\SearchController::class, 'get'])->name('search.get');
Route::post('/search/sch', [App\Http\Controllers\SearchController::class, 'search'])->name('search.search');

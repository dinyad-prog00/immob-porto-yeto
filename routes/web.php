<?php

use Illuminate\Support\Facades\Route;
use App\Models\Demande;
use App\Models\Offre;
use App\Mail\SousMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");;

Route::resource('profiles','ProfileController')->middleware("auth");

Route::resource('offre','OffreController')->middleware("auth");

Route::resource('dmd','DemandeController')->middleware("auth");

Route::resource('admin','AdminController')->middleware("admin");

Route::get('/offres/{id}', [App\Http\Controllers\OffreController::class, 'show'])->name('offre.show2');

Route::patch('/offre/{id}/active', [App\Http\Controllers\OffreController::class, 'activer'])->name('offre.active')->middleware("auth");
Route::patch('/offre/{id}/desactive', [App\Http\Controllers\OffreController::class, 'desactiver'])->name('offre.desactive')->middleware("auth");

Route::get('/dmds/{id}', [App\Http\Controllers\DemandeController::class, 'show'])->name('dmd.show2');

Route::patch('/dmd/{id}/active', [App\Http\Controllers\DemandeController::class, 'activer'])->name('dmd.active')->middleware("auth");
Route::patch('/dmd/{id}/desactive', [App\Http\Controllers\DemandeController::class, 'desactiver'])->name('dmd.desactive')->middleware("auth");

Route::get('/sous/{id}', [App\Http\Controllers\SouscriptionController::class, 'show'])->name('sous.show')->middleware("auth");



Route::patch('/sous/{idsous}/rdv/{id}/confirme', [App\Http\Controllers\RdvController::class, 'confirmer'])->name('rdv.confirme')->middleware("auth");

Route::patch('/sous/{idsous}/rdv/{id}/deconfirme', [App\Http\Controllers\RdvController::class, 'deconfirmer'])->name('rdv.deconfirme')->middleware("auth");

Route::patch('/sous/{idsous}/rdv/{id}/annule', [App\Http\Controllers\RdvController::class, 'annuler'])->name('rdv.annule')->middleware("auth");

Route::patch('/sous/{idsous}/rdv/{id}/active', [App\Http\Controllers\RdvController::class, 'activer'])->name('rdv.active')->middleware("auth");





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


Route::get('/send-mail', function () {

    Mail::to('donatien.yeto@gmail.com')->send(new SousMail("Dinyad","Jean","Les super mainsons")); 

    return view('/');

});
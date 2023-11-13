<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\SejourController;

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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

/* * *********************************************************************** */
/* * ******  Authentification ********************************************** */
/* * *********************************************************************** */


Route::get('/getLogin', function () {
    return view('authentification/formLogin');
});

Route::get('/getLogout', [UtilisateurController::class, 'signOut']);

Route::post('/login', [UtilisateurController::class, 'signIn']);

/* * *********************************************************************** */
/* * ******  Sejour ********************************************** */
/* * *********************************************************************** */


Route::get('/getListeSejour', [SejourController::class, 'listeSejours']);

/*
 * Ajout Séjour
 */

//get ajout
Route::get('/ajoutSejour', [SejourController::class, 'ajoutSejour']);

// post ajout
Route::post('/ajoutSejour', [
    'as' => 'postajoutSejour',
    'uses' => 'App\Http\Controllers\SejourController@postajoutSejour'
]);

Route::get('/modifierSejour/{id}', [SejourController::class, 'modification']);

//post modif
Route::post('/postmodifierSejour/{id}',
    [
        'as' => 'postmodifierSejour',
        'uses' => 'App\Http\Controllers\SejourController@postmodifierSejour'
    ]);

// suppression
Route::get('/supprimerSejour/{id}', [SejourController::class, 'suppression']);


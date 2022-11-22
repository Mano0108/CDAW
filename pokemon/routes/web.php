<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/pokemon', function () {
    return view('template');
});

Route::get('/pokemon/titre', function () {
    echo "<!doctype html><html lang='fr'><head><meta charset='UTF-8'><title>Mauvaise façon</title></head> <body><p>Le fichier risque d'être longggggg</p></body></html>";
});


Route::get('/pokemon/prenom/{prenom}/nom/{nom}', function ($prenom, $nom) {
    return 'User: '.$prenom . ' ' . $nom;
});

Route::get('/pokemon/{title}', function ($title) {
    return $title ;
});

Route::get('/pokemon', function () {
    echo "<h1> Hello World</h1>";
});

Route::get('/pokemon', function () {
    echo "<h1> Hello World</h1>";
});


Route::get('/pokemon', 'App\Http\controllers\listePokemonsController@getTable');

Route::get('/route/{mot}', 'App\Http\controllers\listePokemonsController@getHello') ;

/*Route::get('/pokemon', function () {
    return view('listepokemons');
});*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

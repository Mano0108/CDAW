<?php

use App\Models\PokemonEnergy;
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

//redirect to login form
Route::get('', function () {
    return view('form',[
        'email' => '',
        'password' => '',
        'state' => 'none'
    ]);
});

//login form posts identifiants on this url
Route::post('/menu', 'App\Http\controllers\authController@handleForm');

//Main project route, return the pokedex
Route::get('/pokemon', 'App\Http\controllers\listePokemonsController@getTable');

    

//Useless routes but helpful syntax tool
/*
Route::get('/pokemon/titre', function () {
    echo "<!doctype html><html lang='fr'><head><meta charset='UTF-8'><title>Mauvaise façon</title></head> <body><p>Le fichier risque d'être longggggg</p></body></html>";
});


Route::get('/pokemon/prenom/{prenom}/nom/{nom}', function ($prenom, $nom) {
    return 'User: '.$prenom . ' ' . $nom;
});

Route::get('/pokemon', function () {
    echo "<h1> Hello World</h1>";
});

Route::get('/pokemon', function () {
    echo "<h1> Hello World</h1>";
});



Route::get('/route/{mot}', 'App\Http\controllers\listePokemonsController@getHello') ;

Route::get('/energy/{FK_pokemon}', function ($FK_pokemon) {
    $a = PokemonEnergy::where('FK_pokemon', $FK_pokemon)->get();
    foreach ($a as $energy){
        echo $energy->FK_energy . "\n";
    }
});

/*Route::get('/pokemon', function () {
    return view('listepokemons');
});*/





<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Pokemon;
use App\Http\Resources\PokemonResource;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/pokemon/id/{id}', 'App\Http\controllers\apiController@getPokemonDetails') ;

Route::get('/pokemon/test/{pokemon_id}', function (Pokemon $pokemon_id) {
    return new Illuminate\Http\JsonResponse([
        'data' => "$pokemon_id",
    ]);
});

Route::get('/pokemon/test', function (Request $request) {
    dump($request);
    return new Illuminate\Http\JsonResponse([
        'data' => "uwu",
    ]);
});

//Route::get('/pokemon/test', function (Request $request) {
//    return new PokemonResource(Pokemon::findOrFail());
//});

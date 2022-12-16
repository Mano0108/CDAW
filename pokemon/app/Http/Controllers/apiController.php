<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonEnergy;
use App\Models\Energy;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class apiController extends Controller
{
    public function getPokemonDetails($id){
        $pokemon = Pokemon::where('pokemon_id', $id)->first();
        $pokemonEnergies = PokemonEnergy::where('FK_pokemon', $id)->get();
        $energies = [];
        foreach($pokemonEnergies as $pokemonEnergy){
            $energy = Energy::where('energy_id', $pokemonEnergy->FK_energy)->first();
            array_push($energies, $energy->Serialize());
        }
        $json = $pokemon->Serialize();
        array_push($json, ['energies' => $energies]);
        return new JsonResponse($json);
    }

    public function test(){
        return Tour::getDraftPokemons(200);
    }
}

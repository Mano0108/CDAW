<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class listePokemonsController extends Controller
{
    /**
     * Every pokemons of pokemon table with their energy.
     * return a collection of pokemon
     *
     * @param null
     * @return \Illuminate\Contracts\View\View
     */
    public function getTable(){
        $pokemon = Pokemon::getAll();
        //return $pokemon;
        return view('menus.pokedex', ['pkmn' => $pokemon, 'user'=>auth()->user()]);
    }



    public function getHello($mot){
        return view('hello', ['mot' => $mot]);
    }
}

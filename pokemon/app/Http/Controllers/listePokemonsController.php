<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class listePokemonsController extends Controller
{
    public function getTable(){
        $pokemon = Pokemon::GetAll();
        return view('datatables_pokemons', ['pkmn' => $pokemon]);
    }

    public function getHello($mot){
        return view('hello', ['mot' => $mot]);
    }
}

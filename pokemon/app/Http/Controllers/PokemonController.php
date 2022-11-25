<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Http\Resources\PokemonResource;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display the specified Pokemon from id.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $pokemon = Pokemon::getByID($id);
        return new PokemonResource($pokemon);
    }
}

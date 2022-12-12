<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\URL;

class MenuInfo extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function invoke(Request $request)
    {
        $user = auth()->user();
        $user_energy = User::getUserEnergies($user->id);
        $favorite_pokemon = User::getFavoritePokemon($user->id);

        if($favorite_pokemon == null){
            $favorite_pokemon =  URL::asset('/images/blocked_energy.png');
        }
        else{
            $favorite_pokemon = $favorite_pokemon->path;
        }

        $stats = [
            'favorite_pokemon' => $favorite_pokemon
        ];

        return view('menus.info', [
            'user' => $user_energy[0],
            'stats' => $stats
        ]);

        if($favorite_pokemon == null){
            $favorite_pokemon =  URL::asset('/images/blocked_energy.png');
        }
        else{
            $favorite_pokemon = $favorite_pokemon->path;
        }
    }
}

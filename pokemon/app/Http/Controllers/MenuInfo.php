<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Models\User;

class MenuInfo extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $user_energy = User::getUserEnergies($user->id);
        $favorite_pokemon = User::getFavoritePokemon($user->id);

        $stats = [
            'favorite_pokemon' => $favorite_pokemon->path
        ];

        return view('menus.info', [
            'user' => $user_energy[0],
            'stats' => $stats
        ]);
    }
}

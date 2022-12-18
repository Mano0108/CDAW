<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pokemon;
use App\Models\Combat;
use App\Models\Tour;
use Illuminate\Support\Facades\URL;

class menuController extends Controller
{
    private $current_menu = [
        'info' => "",
        'fight' => "",
        'team' => "",
        'pokedex' => "",
        'replays' => "",
        'shop' => ""
    ];
    public function redirect($menu)
    {
        $this->current_menu[$menu] .= ' current-menu';
        switch ($menu) {
            case 'shop' : 
                //return User::getUserEnergies(auth()->user()->id);
                return view('menus.shop', [
                    'user' => auth()->user(),
                    'energies' => User::getUsersUnlockable(auth()->user()->id),
                    'menu' => $this->current_menu

                ]);
            case 'fight':
                return view('menus.fight', [
                    'user' => auth()->user(),
                    'menu' => $this->current_menu
                ]);
            case 'team':
                $user = auth()->user();
                $pokemons_user = User::getUsersPokemons($user->id);
                return view('menus.team', [
                    'pkmn' => $pokemons_user,
                    'user' => auth()->user(),
                    'menu' => $this->current_menu
                ]);
            case 'pokedex':
                $pokemon = Pokemon::getAll();
                return view('menus.pokedex', [
                    'pkmn' => $pokemon,
                    'user'=>auth()->user(),
                    'menu' => $this->current_menu
            ]);
            case 'replays':
                $n = 20;
                $combats = Combat::lastNFights(20);
                $data = ['combats' => $combats,
                         'drafts' => Tour::getLastNDrafts($combats[$n-1]['combat_id'])
            ];
                return $data;
                return view('menus.replays', [
                    'user' => auth()->user(),
                    'menu' => $this->current_menu
                ]);
            default:
                return $this->menuInfo($menu);
        }

    }

    public function menuInfo($menu)
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
            'stats' => $stats,
            'menu' => $this->current_menu
        ]);
    }
}
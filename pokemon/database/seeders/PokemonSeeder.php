<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i < 200; $i++) {
            $file = file_get_contents("https://pokeapi.co/api/v2/pokemon/$i");
            $pkmn = json_decode($file, true);
            $name = $pkmn['name'];
            $image = $pkmn['sprites']['front_default'];
            $energy = $pkmn['types']['0']['type']['name'];
            $pvmax = $pkmn['stats']['0']['base_stat'];
            $attack = $pkmn['stats']['1']['base_stat'];
            $specialAttack = $pkmn['stats']['3']['base_stat'];
            $specialDefense = $pkmn['stats']['4']['base_stat'];
            $level = $pkmn['base_experience'];

            DB::table('pokemon')->insert([
                'name' => $name,
                'energy' => $energy,
                'pv_max' => $pvmax,
                'attack' => $attack,
                'special_attack' => $specialAttack,
                'special_defense' => $specialDefense,
                'level' => $level,
                'path' => $image
               ]);
        }
    }
}
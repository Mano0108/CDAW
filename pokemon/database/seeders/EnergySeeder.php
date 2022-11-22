<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etape 1
        DB::table('energy')->insert([
            'energy_id' => 1,
            'name' => "normal",
            'path' => "https://www.pokepedia.fr/images/2/24/Miniature_Type_Normal_HOME.png",
            'icon' => "https://www.pokepedia.fr/images/0/05/Icône_Type_Normal_HOME.png"
            ]);
        
        DB::table('energy')->insert([
            'energy_id' => 2,
            'name' => "fighting",
            'path' => "https://www.pokepedia.fr/images/d/d1/Miniature_Type_Combat_HOME.png",
            'icon' => "https://www.pokepedia.fr/images/2/25/Icône_Type_Combat_HOME.png"
            ]);

        DB::table('energy')->insert([
            'energy_id' => 3,
            'name' => "flying",
            'path' => "https://www.pokepedia.fr/images/1/19/Miniature_Type_Vol_HOME.png",
            'icon' => "https://www.pokepedia.fr/images/8/84/Icône_Type_Vol_HOME.png"
            ]);

        DB::table('energy')->insert([
               'energy_id' => 4,
               'name' => "poison",
               'path' => "https://www.pokepedia.fr/images/5/58/Miniature_Type_Poison_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/4/45/Icône_Type_Poison_HOME.png"
               ]);
               
        DB::table('energy')->insert([
               'energy_id' => 5,
               'name' => "ground",
               'path' => "https://www.pokepedia.fr/images/a/a9/Miniature_Type_Sol_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/3/37/Icône_Type_Sol_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 6,
               'name' => "rock",
               'path' => "https://www.pokepedia.fr/images/a/ab/Miniature_Type_Roche_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/2/27/Icône_Type_Roche_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 7,
               'name' => "bug",
               'path' => "https://www.pokepedia.fr/images/5/5e/Miniature_Type_Insecte_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/6/62/Icône_Type_Insecte_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 8,
               'name' => "ghost",
               'path' => "https://www.pokepedia.fr/images/0/0c/Miniature_Type_Spectre_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/e/e2/Icône_Type_Spectre_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 9,
               'name' => "steel",
               'path' => "https://www.pokepedia.fr/images/e/e8/Miniature_Type_Acier_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/0/0e/Icône_Type_Acier_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 10,
               'name' => "fire",
               'path' => "https://www.pokepedia.fr/images/f/f7/Miniature_Type_Feu_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/2/23/Icône_Type_Feu_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 11,
               'name' => "water",
               'path' => "https://www.pokepedia.fr/images/0/08/Miniature_Type_Eau_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/3/30/Icône_Type_Eau_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 12,
               'name' => "grass",
               'path' => "https://www.pokepedia.fr/images/d/d3/Miniature_Type_Plante_HOME.png",
               'icon' => "https://www.pokepedia.fr/Fichier:Icône_Type_Plante_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 13,
               'name' => "electric",
               'path' => "https://www.pokepedia.fr/images/5/5f/Miniature_Type_Électrik_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/c/c5/Icône_Type_Électrik_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 14,
               'name' => "psychic",
               'path' => "https://www.pokepedia.fr/images/a/a1/Miniature_Type_Psy_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/4/42/Icône_Type_Psy_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 15,
               'name' => "ice",
               'path' => "https://www.pokepedia.fr/images/e/e2/Miniature_Type_Glace_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/1/19/Icône_Type_Glace_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 16,
               'name' => "dragon",
               'path' => "https://www.pokepedia.fr/images/0/00/Miniature_Type_Dragon_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/5/5c/Icône_Type_Dragon_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 17,
               'name' => "dark",
               'path' => "https://www.pokepedia.fr/images/2/20/Miniature_Type_Ténèbres_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/d/d2/Icône_Type_Ténèbres_HOME.png"
               ]);

        DB::table('energy')->insert([
               'energy_id' => 18,
               'name' => "fairy",
               'path' => "https://www.pokepedia.fr/images/1/1a/Miniature_Type_Fée_HOME.png",
               'icon' => "https://www.pokepedia.fr/images/6/62/Icône_Type_Fée_HOME.png"
               ]);
    }
}
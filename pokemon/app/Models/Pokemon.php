<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pokemon';

    protected $primaryKey = 'pokemon_id';

    public function energies()
    {
        return $this->belongsToMany(Energy::class, 'pokemon_energy', 'FK_pokemon', 'FK_energy', 'pokemon_id', 'energy_id');
    }


/**
     * Every pokemon with their energies info 
     *(fills the pokedex)
     * @param  
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll(){
        return Pokemon::with('energies')->get();
    }

    /*
    public static function getUserPokemon($user_id){
        $user = User::with('energies')->find($user_id);
        return Pokemon::where('level', "<=", $user->level )->get();
    }*/

    /**
     * The pokemon associated with the id.
     * return a Pokemon
     *
     * @param integer
     * @return \App\Models\Pokemon
     */
    public static function getByID($id){
        return Pokemon::where('pokemon_id', $id);
    }
    use HasFactory;

}

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


    public static function getAll(){
        return Pokemon::with('energies')->get();
    }

    public static function getUserPokemon($user_id){
        $user = User::with('energies')->find($user_id);
        return Pokemon::where('level', "<=", $user->level )->get();
    }

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

    public function Serialize()
    {
        return 
        [
            'id'   => $this->pokemon_id,
            'name' => $this->name,
            'pv_max' => $this->pv_max,
            'attack' => $this->attack,
            'special_attack' => $this->special_attack,
            'special_defense' => $this->special_defense,
            'level' => $this->level,
            'path' => $this->path,
        ];
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energy extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'energy';
    protected $primaryKey = 'energy_id';

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_energy', 'FK_energy', 'FK_pokemon', 'energy_id', 'pokemon_id' );
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_energy', 'FK_energy', 'FK_user', 'energy_id', 'id' );
    }

    public function Serialize()
    {
        return 
        [
            'energy_id'   => $this->energy_id,
            'name' => $this->name,
            'path' => $this->path,
            'icon' => $this->icon
        ];
    }
}

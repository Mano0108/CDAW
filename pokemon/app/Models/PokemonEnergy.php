<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonEnergy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pokemon_energy';

    public function Serialize()
    {
        return
            [
                'energy_id' => $this->FK_energy,
                'pokemon_id' => $this->FK_pokemon,
            ];
    }

    use HasFactory;
}
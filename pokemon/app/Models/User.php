<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $table = 'users';
    protected $primaryKey = 'id';

    public function energies()
    {
        return $this->belongsToMany(Energy::class, 'user_energy', 'FK_user', 'FK_energy', 'id', 'energy_id');
    }

    public static function getUserEnergies($user_id)
    {
        return User::with('energies')->where('id', "=", $user_id)->get();
    }

    /**
     * Return the most drafted pokemon of a user 
     *
     * @param int 
     * @return string
     */
    public static function getFavoritePokemon($user_id)
    {
        return  DB::table('tour')
            ->select('pokemon.path')
            ->join('pokemon', 'tour.FK_pokemon_id', '=', 'pokemon.pokemon_id', '')
            ->where('tour.FK_user_id', '=', $user_id, 'AND')
            ->where('tour.action', '=', 0)
            ->groupBy('pokemon.path')
            ->orderBy( DB::raw('count(pokemon.pokemon_id)'), 'DESC')
            ->first();
    }

    /**
     * Every pokemon a player has unlocked 
     *(fills the pokedex)
     * @param  
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getUsersPokemons($user_id)
    {
        $user_level = User::find($user_id)->level;

        $pokemons = DB::select("SELECT pokemon.pokemon_id, COUNT(pokemon_energy.FK_pokemon) AS nb_user, A.nb_energy_pokemon 
        FROM pokemon
            JOIN user_energy ON user_energy.FK_user = '$user_id' 
            JOIN energy ON user_energy.FK_energy = energy.energy_id 
            JOIN pokemon_energy ON pokemon_energy.FK_energy = energy.energy_id 
            INNER JOIN
                (SELECT pokemon_energy.FK_pokemon, COUNT(pokemon_energy.FK_pokemon) AS nb_energy_pokemon  FROM pokemon_energy 
                 GROUP BY pokemon_energy.FK_pokemon) AS A
                 ON A.FK_pokemon = pokemon_energy.FK_pokemon
            WHERE pokemon.pokemon_id = pokemon_energy.FK_pokemon AND pokemon.level <= $user_level
            GROUP BY pokemon_energy.FK_pokemon");

        $pokemon_list = [];

        foreach ($pokemons as $pokemon) {
            if ($pokemon->nb_user == $pokemon->nb_energy_pokemon) {
                array_push($pokemon_list, $pokemon->pokemon_id);
            }
        }

        $pokemon_user = Pokemon::with('energies')->whereIn('pokemon_id', $pokemon_list)->get();
        return $pokemon_user;
    }
    
    /**
     * Return the energy that a player hasn't unlocked yet
     *
     * @param int 
     * @return string
     */
    public static function getUsersUnlockable($user_id)
    {

        $unlockable_energies = DB::select("SELECT energy.*  FROM energy 
        LEFT JOIN user_energy ON user_energy.FK_energy = energy.energy_id AND user_energy.FK_user = 1
        WHERE user_energy.FK_energy IS NULL");

        return $unlockable_energies;
    }
}
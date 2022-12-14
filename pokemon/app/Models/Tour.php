<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tour';
    public $timestamps = true;
    public $primaryKey = 'id';
    protected $fillable = [
        'FK_combat_id',
        'FK_user_id',
        'FK_pokemon_id',
        'action'
    ];

    /**
     * Every Tour of a specific combat where action = 0 (represents a pokemon draft) 
     *
     * @param int 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getDraft($combat_id){
        return Tour::where('FK_combat_id', '=', $combat_id, "AND")->where('action', '=', 0)->get();
    }

    /**
     * Every Pokemons with their energies drafted in a specific fight 
     *
     * @param int 
     * @return array
     */
    public static function getDraftPokemons(int $combat_id){
        $tours = Tour::getDraft($combat_id);
        $draft = [];
        foreach($tours as $tour){
            array_push($draft, Pokemon::with('energies')->find($tour->FK_pokemon_id));
        }
        return $draft;
    }

    /**
     * Last two turn inserted in the DB 
     *
     * @param int 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLastTurn($combat_id){
        return Tour::select('action')->where('FK_combat_id', '=', $combat_id,)->orderBy('created_at', 'desc')->take(2)->get();
    }

    /**
     * Return every pokemons (with the combat_id they are assossiated with) that was 
     * selected during the last n fights. N is defined in the MenuController. 
     * The parameter is the combat_id of the last combat minus n.
     *
     * @param int
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLastNDrafts($combats_id){
        $data = Tour::select('FK_pokemon_id', 'FK_combat_id')->where('action', '=', 0, 'AND')->where('FK_combat_id',">=", $combats_id)->orderBy('created_at', 'desc')->get();
        foreach($data as $pokemon){
            $pokemon['FK_pokemon_id'] = Pokemon::find($pokemon['FK_pokemon_id']);
        }
        return $data;
    }
}

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
     * Last two turn inserted in the DB 
     *
     * @param int 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLastTurn($combat_id){
        return Tour::select('action')->where('FK_combat_id', '=', $combat_id,)->orderBy('created_at', 'desc')->take(2)->get();
    }
}

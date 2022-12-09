<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combat extends Model
{
    use HasFactory;

    protected $table = 'combat';
    protected $primaryKey = 'combat_id';
    public $timestamps = false;
    protected $fillable = [
        'user1_id',
        'user2_id'
    ];

    /**
     * Random matchmaking function
     *
     * @param int 
     * @return User
     */
    public static function findOpponent($user_id){
        $opponents = User::where("id", '!=', $user_id)->get();
        $nb_opponents = count($opponents);
        $opponent_index = rand(0, $nb_opponents -1);
        return $opponents[$opponent_index];
    }
}

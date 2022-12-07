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

    public static function getDraft($combat_id){
        return Tour::where('FK_combat_id', '=', $combat_id, "AND")->where('action', '=', 0)->get();
    }
}

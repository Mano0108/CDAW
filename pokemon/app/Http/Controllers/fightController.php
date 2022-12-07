<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Combat;
use App\Models\User;
use App\Models\Tour;

class fightController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function createLobby(Request $request)
    {
        $tmp[0] = auth()->user()->id;
        $tmp[1] = Combat::findOpponent(auth()->user()->id)->id;
        shuffle($tmp); //Set starting player random
        Combat::create(['user1_id' => $tmp[0], 'user2_id' => $tmp[1]]);

        $lastValue = DB::table('combat')->orderBy('combat_id', 'desc')->first()->combat_id;
        if($request->mode == "skirmish"){
            return view("combat.draft", [
                'pkmn' => User::getUsersPokemons($tmp[0]),
                'lobby_id' => $lastValue,
                'current_user_id' => $tmp[0],
                'opponent_id' => $tmp[1]]);
        }
        return view("combat.lobby", [
            'mode' => $request->mode,
            'lobby_id' => $lastValue]);
    }

    public function handleFight(Request $request)
    {
        return view("combat.action", [
            'object' => $request]);
    }

    public function handleDraft(Request $request)
    {
        Tour::create([
            'FK_combat_id' => $request->lobby,
            'FK_user_id' => $request->user,
            'FK_pokemon_id' => $request->pokemon,
            'action' => 0]);
        
            //A remplacer par une requete avec un count dans l'ideal
        $draft = Tour::getDraft($request->lobby);
        if(false/*count($draft)<6*/){

            return view("combat.draft", [
                'pkmn' => User::getUsersPokemons($request->opponent),
                'lobby_id' => $request->lobby,
                'current_user_id' => $request->opponent,
                'opponent_id' => $request->user]);
        }
        return view("combat.action", [
            'object' => $request]);
    }

    public function handleCombat(Request $request){
        return view('combat.action');
    }

}

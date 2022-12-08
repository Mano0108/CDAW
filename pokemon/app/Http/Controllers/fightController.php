<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Combat;
use App\Models\User;
use App\Models\Tour;
use App\Models\Pokemon;

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

    public function createCombatData($combat_id){
        $data = Combat::find($combat_id);
        $data->draft = Tour::getDraft($combat_id);
        $data->users = User::whereIn('id', [$data->user1_id, $data->user2_id])->get();
        $data->pokemon_user_1 = Pokemon::find($data->draft['0']['FK_pokemon_id']);
        $data->pokemon_user_2 = Pokemon::find($data->draft['1']['FK_pokemon_id']);
        $data->current_turn = 0;
        return $data;
    }

    public function handleFight(Request $request)
    {
        $data = json_decode($request->data, true);
        //return $data;
        return view("combat.action", [
            'data' => $data]);
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
        if(count($draft)<6){

            return view("combat.draft", [
                'pkmn' => User::getUsersPokemons($request->opponent),
                'lobby_id' => $request->lobby,
                'current_user_id' => $request->opponent,
                'opponent_id' => $request->user]);
        }
        $data = $this->createCombatData($request->lobby);
        $data->lobby = $request->lobby;
        return view("combat.action", [
            'data' => $data]);
    }

    public function handleCombat(Request $request){
        return view('combat.action');
    }

}

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
     * When a user start a game in menu/fight, this method handles matchmaking and redirect to draft (if SKIRMISH or RANKED) or to combat (if BLIND)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function createLobby(Request $request)
    //TODO : Prendre en compte tous les modes et les amis

    {
        $tmp[0] = auth()->user()->id;
        $tmp[1] = Combat::findOpponent(auth()->user()->id)->id;
        shuffle($tmp); //Set starting player random
        Combat::create(['user1_id' => $tmp[0], 'user2_id' => $tmp[1]]);

        $lastValue = DB::table('combat')->orderBy('combat_id', 'desc')->first()->combat_id;
        // if mode = skirmish, start draft
        if ($request->mode == "skirmish") {
            return view("combat.draft", [
                'pkmn' => User::getUsersPokemons($tmp[0]),
                'lobby_id' => $lastValue,
                'current_user_id' => $tmp[0],
                'opponent_id' => $tmp[1]
            ]);
        // if mode = blind, make draft and start combat
        } 
        elseif ($request->mode == "blind") {
            $this->blindDraft($lastValue, $tmp[0], $tmp[1]);
            $data = $this->createCombatData($lastValue);
            return view("combat.action", [
                'data' => $data
            ]);
        }
        /*
        return view("combat.lobby", [
            'mode' => $request->mode,
            'lobby_id' => $lastValue
        ]);*/
    }

    /**
     * Once Matchmaking and Draft are completed, this method create the combat data that will be exchanged every turn
     *
     * @param  int
     * @return \Illuminate\Http\Request
     */
    public function createCombatData($combat_id)
    {
        //TODO: Supprimer le pokemon_user
        $data = Combat::find($combat_id);
        $data->lobby = $combat_id;
        $data->draft = Tour::getDraftPokemons($combat_id);
        $data->users = User::whereIn('id', [$data->user1_id, $data->user2_id])->get();
        $data->pokemon_user = [$data->draft[0], $data->draft[1]];
        $data->users_hp = [$data->pokemon_user['0']['pv_max'], $data->pokemon_user['1']['pv_max']];
        $data->users_hp_last_turn = [$data->pokemon_user['0']['pv_max'], $data->pokemon_user['1']['pv_max']];
        $data->users_pokemon_index = [0, 1];
        $data->current_turn = 0;
        $name1 = strtoupper($data['pokemon_user'][0]['name']);
        $name2 = strtoupper($data['pokemon_user'][1]['name']);
        $data->animations = [["init","$name1 enter the arena"],["init","$name2 enter the arena"],["action", "What will $name1 do ?"]];
        return $data;
    }

    /**
     * Once the drafted has started, every time a user choses a pokemon, this method is called.
     *  It first generates a Tour with pokemon chosen id and action 0
     *  If there are less than six pokemon chosen, return draft view to chose another pokemon
     *  If there are already six pokemon chosen, return combat view
     * (isn't called for blind mode)
     * 
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Contracts\View\View
     */
    public function handleDraft(Request $request)
    {
        Tour::create([
            'FK_combat_id' => $request->lobby,
            'FK_user_id' => $request->user,
            'FK_pokemon_id' => $request->pokemon,
            'action' => 0
        ]);

        // TODO : A remplacer par une requete avec un count dans l'ideal
        $draft = Tour::getDraft($request->lobby);
        if (count($draft) < 6) {
            //Si la draft est en cours on renvoit la vue de draft
            return view("combat.draft", [
                'pkmn' => User::getUsersPokemons($request->opponent),
                'lobby_id' => $request->lobby,
                'current_user_id' => $request->opponent,
                'opponent_id' => $request->user
            ]);
        }
        //Sinon on renvoit la vue de combat (action.blade.php)
        $data = $this->createCombatData($request->lobby);
        //return $data;
        return view("combat.action", [
            'data' => $data
        ]);
    }

    /**
     * When a player start a blind game, this method create the randomized draft
     * 
     * @param  int, int, int
     * @return 
     */
    public function blindDraft(int $combat_id, int $user1, int $user2)
    {
        $pokemon_id = [];
            $tmp_pokemon_id = rand(1, 251);
            for ($ii = 0; $ii <= 6; $ii += 1) {
                while (in_array($tmp_pokemon_id, $pokemon_id)) {
                    $tmp_pokemon_id = rand(1, 251);
                }
                array_push($pokemon_id, $tmp_pokemon_id);
            }
            for ($jj = 1; $jj <= 6; $jj += 2) {
                Tour::create([
                    'FK_combat_id' => $combat_id,
                    'FK_user_id' => $user1,
                    'FK_pokemon_id' => $pokemon_id[$jj],
                    'action' => 0
                ]);
                Tour::create([
                    'FK_combat_id' => $combat_id,
                    'FK_user_id' => $user2,
                    'FK_pokemon_id' => $pokemon_id[$jj + 1],
                    'action' => 0
                ]);
            }
    }
    /**
     * This method create the combat data for the next turn from last turn's data
     * 
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Contracts\View\View
     */
    public function handleFight(Request $request)
    {
        $data = json_decode($request->data, true);
        //return $data;
        $data['animations'] = [];
        $player_index = $data['current_turn'];
        Tour::create([
            'FK_user_id' => $data['users'][$player_index]['id'],
            'FK_combat_id' => $data['lobby'],
            'FK_pokemon_id' => $data['pokemon_user'][$player_index]['pokemon_id'],
            'action' => $request->action
        ]);
        if ($data['current_turn'] == 0) {
            $data['current_turn'] = 1;
        } else {
            // Ajout des animations d'actions
            $data['animations'] = $this->createActionAnimations($data['lobby']);
            //return $data;
            //Application des degats = Actualisation des statistiques des pokemons
            $data = $this->applyDamage($data);
            if ($this->isDraw($data)) {
                return view('combat.draw', [
                    'data' => $data
                ]);
            }
            $result = $this->isVictory($data);
            if ($result[0]) {
                $winner = $data['users'][$result[1]]['id'];
                $data['winner_id'] = $winner;
                return view('combat.victory', [
                    'data' => $data
                ]);
            }
            //return $data['users_pokemon_index'][0];
            $data = $this->swapPokemon($data);
            //return $data;
            $data['current_turn'] = 0;
        }
        $name = strtoupper($data['pokemon_user'][$data['current_turn']]['name']);
        array_push($data['animations'],["question", "What will $name do ?"]);
        //return $data;
        return view("combat.action", [
            'data' => $data
        ]);
    }

    /**
     * Everytime user2 select their action, this method is called and it resolve the turn.
     * Each players amount of damage applied are calculated and applied to $data->users_hp
     * 
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Request
     */
    private function applyDamage($data)
    //TODO : ajouter les resistances et efficacités

    {
        $data['users_hp_last_turn'] = $data['users_hp'];
        $tmp = Tour::getLastTurn($data['lobby']);
        $actions = [$tmp[1], $tmp[0]];
        $damage_applied = [0, 0];
        for ($ii = 0; $ii <= 1; $ii++) {
            if ($actions[$ii]['action'] == 1) {
                $damage_applied[$ii] = $data['pokemon_user'][$ii]['attack'];
            } elseif ($actions[$ii]['action'] == 2) {
                $damage_applied[$ii] = $data['pokemon_user'][$ii]['special_attack'];
            }
        }
        if ($actions[0]['action'] == 3) {
            $damage_applied[1] = max(0, $damage_applied[1] - $data['pokemon_user'][0]['special_defense']);
        }
        if ($actions[1]['action'] == 3) {
            $damage_applied[0] = max(0, $damage_applied[0] - $data['pokemon_user'][1]['special_defense']);
        }
        $data['users_hp']['0'] = $data['users_hp']['0'] - $damage_applied[1];
        $data['users_hp']['1'] = $data['users_hp']['1'] - $damage_applied[0];
        return $data;
    }

    /**
     * Called at every resolution, check if fight ended on a draw
     * 
     * @param  \Illuminate\Http\Request
     * @return bool
     */
    private function isDraw($data)
    {
        return ($data['users_pokemon_index'][0] == 4 && //user 1 utilise son dernier pokemon
            $data['users_pokemon_index'][1] == 5 && //user 2 utilise son dernier pokemon
            $data['users_hp'][0] <= 0 && //pokemon user 1 a 0 hp
            $data['users_hp'][1] <= 0); //pokemon user 2 a 0 hp
    }
    /**
     * Called at every resolution, check if fight ended on a win
     * If not, returns [false]
     * If yes, returns [true, winner_id]
     * 
     * @param  \Illuminate\Http\Request
     * @return array<int|bool>
     */
    private function isVictory($data)
    {
        for ($ii = 0; $ii <= 1; $ii++) {
            if ($data['users_pokemon_index'][$ii] == 4 + $ii && $data['users_hp'][$ii] <= 0) {
                return [true, 1 - $ii];
            }
        }
        return [false];
    }

    /**
     * Called at every resolution, check if a pokemon needs to be replaced
     * 
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Request
     */
    private function swapPokemon($data)
    {
        for ($ii = 0; $ii <= 1; $ii++) {
            if ($data['users_hp'][$ii] <= 0) {
                //$data['users_pokemon_index'][$ii] += 2; //index du pokemon +=2
                //$data['pokemon_user'][$ii] = $data['draft'][$data['users_pokemon_index'][$ii]]; //changement du pokemon dans pokemon_user
                //$data['users_hp'][$ii] = $data['pokemon_user'][$ii]['pv_max'];
                $new_pokemon_index = $data['users_pokemon_index'][$ii] + 2;
                $name = strtoupper($data['draft'][$new_pokemon_index]['name']);
                array_push($data['animations'], ["change", "$name enters the arena", $ii]);
            }
        }
        return $data;
    }


    //TODO: Implémenter dans apply damages
    private function createActionAnimations($combat_id)
    {
        $actions = Tour::getLastTurn($combat_id);
        $action0 = ["action", $actions[0]->action, 0];
        $action1 = ["action", $actions[1]->action, 1];
        return [$action0, $action1];
    }
/*public function handleCombat(Request $request)
{
return view('combat.action');
}*/
}
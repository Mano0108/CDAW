<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class shopController extends Controller
{
    public function __invoke(Request $energy_id)
    {
        $user = auth()->user();
        return $energy_id;
        if ($user->gold>80 ){
            DB::table('user_energy')->insert([
                'FK_energy' => $energy_id , 
                'FK_user' => $user->id
            ]); 
            DB::table('users')
                ->where('id',$user->id)
                ->update([
                    'gold'=>$user->gold-80
            ]);        
        }
        return redirect('/menu/shop');
    }
}
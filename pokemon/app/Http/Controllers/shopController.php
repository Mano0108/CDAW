<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class shopController extends Controller
{
    //param : energy_id we wish to unlock
    public function __invoke(Request $request)
    {
        
        $user = auth()->user();
        //if enough gold, add the energy to the user and update users gold 
        if ($user->gold > 80 ){
            DB::table('user_energy')->insert([
                'FK_energy' => $request->energy_id , 
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
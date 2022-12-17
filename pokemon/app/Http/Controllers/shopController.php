<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class shopController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        if ($user->gold>80 ){
            User_energy::insert(
                [FK_energy => $energy->energy_id , FK_user => $user->id]
            );            
        }
        return redirect('/menu/shop');
    }
}
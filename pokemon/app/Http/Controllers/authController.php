<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class authController extends Controller
{
    public function logUser($user_mail, $password){
        return view('mainMenu', ['user' => $user_mail]);
    }

    public function handleForm(Request $request){
        $user_mail = $request->user_mail;
        $password = $request->password;
        $users = User::isUser($user_mail, $password);
        if(count($users) > 0){
            foreach($users as $user){
                return view('mainMenu', ['user' => $user]);
            }
        }
        else{
            return view('form',[
                'email' => $user_mail,
                'password' => $password,
                'state' => 'true'
        ]);
        }
    }
}

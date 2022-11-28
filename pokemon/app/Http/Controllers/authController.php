<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function logUser($user_mail, $password){
        return view('mainMenu', ['user' => $user_mail]);
    }

    public function handleForm(Request $request){
        $user_mail = $request->user_mail;
        $password = $request->password;
        return view('mainMenu', ['user' => $user_mail]);
    }
}

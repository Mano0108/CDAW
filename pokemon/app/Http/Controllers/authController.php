<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class authController extends Controller
{
    public function logUser($user_mail, $password){
        return view('mainMenu', ['user' => $user_mail]);
    }

    public function handleLoginForm(Request $request){
        $user_mail = $request->user_mail;
        $password = $request->password;
        $users = User::isUser($user_mail, $password);
        if(count($users) > 0){
            foreach($users as $user){
                return view('mainMenu', ['user' => $user]);
            }
        }
        else{
            return view('loginForm',[
                'email' => $user_mail,
                'password' => $password,
                'state' => "The identifiants entered doesn't fit our credentials"
        ]);
        }
    }

    public function handleSignupForm(Request $request){
        $user_name = $request->username;
        $user_mail = $request->user_mail;
        $password = $request->password;
        $confirm = $request->confirm;
        $users = User::getUser('email', $user_mail);
        if(count($users) > 0){
            return view('signupForm', [
                'username' => $user_name,
                'email' => $user_mail,
                'password' => $password,
                'confirm' => $confirm,
                'error' => "E-mail already taken, change it please"
            ]);
        }
        if($password != $confirm){
            return view('signupForm', [
                'username' => $user_name,
                'email' => $user_mail,
                'password' => $password,
                'confirm' => $confirm,
                'error' => "Passwords are different, try again pls"
            ]);
        }

        $users = User::getUser('name', $user_name);
        if(count($users) > 0){
            return view('signupForm', [
                'username' => $user_name,
                'email' => $user_mail,
                'password' => $password,
                'confirm' => $confirm,
                'error' => "Username already taken, change it please"
            ]);
        }

        $inputs = [
            'name' => $user_name,
            'email' => $user_mail,
            'password' => $password
        ];

        User::create($inputs);
        return redirect('/');
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listePokemonsController extends Controller
{
    //
    public function getHello($mot){
        return view('hello', ['mot' => $mot]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    //Primjena autentifikacije za cijeli kontroler
    /*public function __construct()
    {
        return $this->middleware('auth');    
    }*/

    public function index() {
        
        //Mora prikazati pocetnu stranicu - view home

        return view('home');
    }

    
}

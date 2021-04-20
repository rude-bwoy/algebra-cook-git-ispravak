<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index() 
    {
        return view('login');
    }

    public function login(Request $request) 
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
            );

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Auth::login(Auth::user());

            return redirect()->route('dashboard');
        } 

        return redirect()->back()->withErrors(['msg' => 'Email i lozinka nisu validni.']);
    }

}

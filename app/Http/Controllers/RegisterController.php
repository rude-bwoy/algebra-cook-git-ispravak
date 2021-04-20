<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request) 
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username',
                'password' => 'required'
            ]
        );

        //Sve ok, validacija je u redu -> bacaj u bazu!

        $user = User::create(
            [
                'firstname' => trim($request->input('firstname')),
                'lastname' => trim($request->input('lastname')),
                'username' => trim($request->input('username')),
                'email' => strtolower(trim($request->input('email'))),
                'password' => bcrypt($request->input('password'))
            ]
        );
        if(isset($user)) {

            //Dohvati rolu gdje je njen naziv 'user'
            $user_role = Role::where('name', 'user')->first();

            //Zakači rolu za novoregistriranog korisnika
            $user->roles()->attach($user_role);

            //Sve je ok:
            return redirect()->route('login');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Greska kod registracije!']);
        }

    }

}

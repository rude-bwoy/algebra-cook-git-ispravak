<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
       return $this->middleware('auth'); 
    }

    public function index() 
    {

        $all_users = [];
        if(Gate::allows('manage-users'))
        {
            $all_users = User::all();
        };

        return view('dashboard')->with(['all_users' => $all_users]);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    //Ruta za ažuriranje korisnika - /admin/user/edit/$id
    //GET
    //HTML forma za ažuriranje
    public function edit(User $user) 
    {
        //Dohvati popis svih uloga
        $roles = Role::all();

        //Prikaži view i prenesi podatke o korisniku i ulogama
        return view('admin.user-edit')->with(
            [
                'roles' => $roles,
                'user' => $user
            ]
        );
    }

    //Ruta za ažuriranje korisnika i uloga u bazi podataka
    //POST
    public function update(Request $request, User $user)
    {
        
        //DZ - kreirati proces validacije
/*         $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users,email',
            ]
        ); */

        //Korak 2 - sinkroniziraj odabrane uloge s korisnikom u tablici user_role
        $user->roles()->sync($request->roles);

        //Korak 3 - ažuriraj podatke o korisniku
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('dashboard');

    }

    //HTML forma za kreiranje novog korisnika
    public function create(User $user) 
    {
        //Dohvati popis svih uloga
        $roles = Role::all();

        //Prikaži view i prenesi podatke o ulogama
        return view('admin.user-create')->with(
            [
            'roles' => $roles,
            ]
            //Ovdje je luka nesto malo drugacije, dodao je u with i $request
        );
    }

    //Ruta za kreiranje korisnika
    public function store(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username',
                'password' => 'required',
                'roles' => 'required'
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
            $user->roles()->sync($request->input('roles'));

            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['error', 'Unos korisnika nije uspio!']);
        }
    }

    //Ruta za brisanje korisnika - /admin/user/delete/$id
    //HTML forma za brisanje
    public function delete(User $user)
    {
        return view('admin.user-delete')->with(['user' => $user]);
    }

    public function destroy(User $user)
    {
        //Korak 1: ukloniti sve role za korisnika koji se brise
        $user->roles()->detach();

        //Korak 2: Uklanjamno korisnika iz tablice users
        $user->delete();

        return redirect()->route('dashboard');
    }



}

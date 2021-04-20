<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        //Korak 1: dohvati role i pohrani ih u varijable
            //ekvivalent: SELECT id FROM roles WHERE name = 'admin';
        $admin_role = Role::where('name', 'admin')->first();
        $editor_role = Role::where('name', 'editor')->first();
        $user_role = Role::where('name', 'user')->first();
        $suradnik_role = Role::where('name', 'suradnik')->first();

        //Korak 2: kreiranje testnih korisnika
        $admin = User::create([
            'firstname' => 'Predavac',
            'lastname' => 'Adminic',
            'email' => 'admin@email.com',
            'username' => 'admin',
            'password' => Hash::make('test123')
        ]);
            
        $editor = User::create([
            'firstname' => 'Ana',
            'lastname' => 'Dizajneric',
            'email' => 'ana.dizajneric@email.com',
            'username' => 'editor',
            'password' => Hash::make('test123')
        ]);

        $user = User::create([
            'firstname' => 'Mico',
            'lastname' => 'Programeric',
            'email' => 'mico.programeric@email.com',
            'username' => 'user',
            'password' => Hash::make('test123')
        ]);

        $suradnik = User::create([
            'firstname' => 'Marko',
            'lastname' => 'Sistemovski',
            'email' => 'marko.sistemovski@email.com',
            'username' => 'suradnik',
            'password' => Hash::make('test123')
        ]);

        //Korak 3: spajanje korisnika s ulogom
        $admin->roles()->attach($admin_role);
        $editor->roles()->attach($editor_role);
        $user->roles()->attach($user_role);
        $suradnik->roles()->attach($suradnik_role);
    }
}

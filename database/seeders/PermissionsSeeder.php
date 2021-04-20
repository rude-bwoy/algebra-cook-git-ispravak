<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->delete();
        DB::table('permissions')->delete();

        // Za korisnike
        Permission::create([
            'name' => 'Pregled korisnika',
            'slug' => 'manage-users',
            'group' => 'users'
        ]);

        Permission::create([
            'name' => 'Kreiranje korisnika',
            'slug' => 'create-users',
            'group' => 'users'
        ]);

        Permission::create([
            'name' => 'Azuriranje korisnika',
            'slug' => 'edit-users',
            'group' => 'users'
        ]);

        Permission::create([
            'name' => 'Brisanje korisnika',
            'slug' => 'delete-users',
            'group' => 'users'
        ]);

        // Za uloge (roles)
        Permission::create([
            'name' => 'Pregled rola',
            'slug' => 'manage-roles',
            'group' => 'roles'
        ]);

        Permission::create([
            'name' => 'Kreiranje rola',
            'slug' => 'create-roles',
            'group' => 'roles'
        ]);

        Permission::create([
            'name' => 'Azuriranje rola',
            'slug' => 'edit-roles',
            'group' => 'roles'
        ]);

        Permission::create([
            'name' => 'Brisanje rola',
            'slug' => 'delete-roles',
            'group' => 'roles'
        ]);

        // Za recepte

        Permission::create([
            'name' => 'Pregled recepata',
            'slug' => 'manage-recipes',
            'group' => 'recipes'
        ]);

        Permission::create([
            'name' => 'Kreiranje recepata',
            'slug' => 'create-roles',
            'group' => 'recipes'
        ]);

        Permission::create([
            'name' => 'Azuriranje recepata',
            'slug' => 'edit-recipes',
            'group' => 'recipes'
        ]);

        Permission::create([
            'name' => 'Brisanje recepata',
            'slug' => 'delete-recipes',
            'group' => 'recipes'
        ]);
    }
}

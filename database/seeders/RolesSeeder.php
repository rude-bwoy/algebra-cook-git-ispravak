<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_role')->delete();
        DB::table('roles')->delete();

        //Definira ovlasti za svaku rolu
        $admin_permissions = Permission::whereIn('group', ['users', 'roles', 'recipes'])->get();
        $editor_permissions = Permission::whereIn('group', ['users', 'recipes'])->get();
        $user_permissions = Permission::whereIn('group', ['recipes'])->get();

        //Definiranje uloga
        $admin_role = Role::create([
            'name' => 'admin'
        ]);

        $editor_role = Role::create([
            'name' => 'editor'
        ]);

        $user_role = Role::create([
            'name' => 'user'
        ]);

        Role::create([
            'name' => 'suradnik'
        ]);

        //Povezivanje uloga s ovlastima

        foreach($admin_permissions as $permission)
        {
            $admin_role->permissions()->attach($permission);
        }

        foreach($editor_permissions as $permission)
        {
            $editor_role->permissions()->attach($permission);
        }

        foreach($user_permissions as $permission)
        {
            $user_role->permissions()->attach($permission);
        }
    }
}

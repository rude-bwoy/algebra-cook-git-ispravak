<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
        Gate::define('manage-users', function($user) {
            //Definiramo uvjete za ovu privilegiju
            return $user->has_any_role(['admin', 'editor', 'suradnik']);
        });
        */


    /**
     * Korak 1: dohvatimo sve permisije iz tablice baze podataka
     * Korak 2: za svaku iteraciju permisije kreiramo Gate autorizaciju
     * Korak 3: unutar svakog definiranog Gatea, provjeri ima li prijavljeni korisnik rolu koja podrzava tu permisiju
    */

    /**
     * 
     * 
     * 
     * 
     */


        Permission::get()->map(function($permission) { 
            
            Gate::define(
                $permission->slug,
                function($user) use ($permission) {
                    //Programska logika za autorizaciju
                    return $user->has_permission_to($permission);
                });
            });
    }
}

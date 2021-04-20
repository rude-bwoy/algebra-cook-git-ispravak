<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    //Provjeri ako korisnik ima niz uloga

    // $roles = ['admin','editor']
    public function has_any_role($roles) {

        if($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }

        return false;

    }

    //Provjeri ako korisnik ima određenu ulogu po nazivu
    //$role = 'admin'
    public function has_role($role) {

        if($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;

    }

    //Pripada li premisija određenoj rolu koju ima trenutno prijavljeni korisnik
    public function has_permission_to($permission) {
        return $this->has_any_role($permission->roles()->pluck('name'));
    }
}
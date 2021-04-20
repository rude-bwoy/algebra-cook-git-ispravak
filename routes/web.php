<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 *  GET - za citanje
 *  POST - za unos novih podataka
 *  PUT - za azuriranje podataka
 *  DELETE - za brisanje podataka
 */


//ovaj get dolje je http metoda
//Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//POST metode za registraciju i prijavu
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

//Ova ruta mora biti zasticena -> middleware('auth)
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

//Rute za recepte
Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe-create');


//Rute za administraciju
Route::prefix('admin')->group(function () {
    //domena.com/admin/user/edit/$parametar
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('user/update/{user}', [UserController::class, 'update'])->name('user-update');
    Route::get('/user/create', [UserController::class, 'create'])->name('user-create');
    Route::post('/user/new', [UserController::class, 'store'])->name('user-create-new');

    //ruta za brisanje korisnika
    Route::get('/users/delete/{user}', [UserController::class, 'delete'])->name('user-delete');
    Route::post('/user/destroy/{user}', [UserController::class, 'destroy'])->name('user-destroy');

    //Rute za uloge
    Route::get('role/delete/{role}', [RoleController::class, 'delete'])->name('roles.delete');
    Route::resource('roles', RoleController::class)->middleware('can:manage-roles');


});


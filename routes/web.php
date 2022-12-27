<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VuesyController;
use Illuminate\Support\Facades\Auth;

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



Route::get('/login', [App\Http\Controllers\VuesyController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\VuesyController::class, 'register'])->name('register');
// Route::resource('users', [UserController::class]);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('{any}', [App\Http\Controllers\VuesyController::class, 'index'])->name('index');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('users', [UserController::class, 'index'])->name('users-index');   
    Route::get('delete-users/{id}', [UserController::class, 'destroy'])->name('delete-user');   
    Route::get('users-edit/{id}', [UserController::class, 'edit'])->name('users-edit');   
    Route::post('users-update/{id}', [UserController::class, 'update'])->name('user-update');   

    Route::get('roles', [RoleController::class, 'index'])->name('show-roles');   
    Route::get('roles-create', [RoleController::class, 'create'])->name('create-roles');   
    Route::post('store-roles', [RoleController::class, 'store'])->name('store-roles');   
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');   
});



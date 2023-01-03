<?php

use App\Http\Controllers\backOffice\EventController;
use App\Http\Controllers\backOffice\HomeController;
use App\Http\Controllers\backOffice\PermissionController;
use App\Http\Controllers\backOffice\RoleController;
use App\Http\Controllers\backOffice\UserController;
use App\Http\Controllers\frontOffice\LocalizationController;
use App\Http\Controllers\backOffice\OrderController;
use App\Http\Controllers\frontOffice\VuesyController;
use Illuminate\Support\Facades\Route;
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



Route::get('/login', [VuesyController::class, 'login'])->name('login');
Route::get('/register', [VuesyController::class, 'register'])->name('register');
// Route::resource('users', [UserController::class]);
// Route qui permet de connaître la langue active
Route::get('locale', [LocalizationController::class, 'getLang'])->name('getlang');
// Route qui permet de modifier la langue
Route::get('locale/{lang}', [LocalizationController::class, 'setLang'])->name('setlang');

Auth::routes();

Route::group(['middleware' => ['auth','language']], function () {
    // Route::get('{any}', [App\Http\Controllers\VuesyController::class, 'index'])->name('index');
    // Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/calendar', [HomeController::class, 'calendar'])->name('calendar');
    Route::get('/timeline', [HomeController::class, 'timeline'])->name('timeline');
    //users
    Route::get('users', [UserController::class, 'index'])->name('users');  
    Route::get('users-create', [UserController::class, 'create'])->name('users-create'); 
    Route::post('users-store', [UserController::class, 'store'])->name('user-store');   
    Route::get('delete-users/{id}', [UserController::class, 'destroy'])->name('delete-user');   
    Route::get('users-edit/{id}', [UserController::class, 'edit'])->name('users-edit');
    Route::get('users-show/{id}', [UserController::class, 'show'])->name('users-show');   
    Route::post('users-update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::delete('/users-destroy/{id}', [UserController::class, 'destroy'])->name('users-destroy');
    Route::get('users-edit-profile/{id}', [UserController::class, 'editProfile'])->name('users-edit-profile');   
    Route::post('users-update-profile/{id}', [UserController::class, 'updateProfile'])->name('users-update-profile');

    //roles
    Route::get('roles', [RoleController::class, 'index'])->name('roles');   
    Route::get('roles-create', [RoleController::class, 'create'])->name('create-roles'); 
    Route::get('roles-edit/{id}', [RoleController::class, 'edit'])->name('edit-roles');  
    Route::get('roles-show/{id}', [RoleController::class, 'show'])->name('show-roles');   
    Route::post('store-roles', [RoleController::class, 'store'])->name('store-roles'); 
    Route::post('update-roles/{id}', [RoleController::class, 'update'])->name('update-roles');   
    Route::get('/roles', [RoleController::class, 'index'])->name('roles'); 
    Route::delete('/roles-destroy/{id}', [RoleController::class, 'destroy'])->name('roles-destroy');
    
    //permissions
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');   
    Route::get('permissions-create', [PermissionController::class, 'create'])->name('create-permissions'); 
    Route::get('permissions-edit/{id}', [PermissionController::class, 'edit'])->name('edit-permissions'); 
    Route::get('permissions-show/{id}', [PermissionController::class, 'show'])->name('show-permissions');   
    Route::post('store-permissions', [PermissionController::class, 'store'])->name('store-permissions'); 
    Route::post('update-permissions/{id}', [PermissionController::class, 'update'])->name('update-permissions');   
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions'); 
    Route::delete('/permissions-destroy/{id}', [PermissionController::class, 'destroy'])->name('permissions-destroy');

    //orders
    Route::get('orders', [OrderController::class, 'index'])->name('orders');   
    Route::get('orders-create', [OrderController::class, 'create'])->name('create-orders'); 
    Route::get('orders-edit/{id}', [OrderController::class, 'edit'])->name('edit-orders'); 
    Route::get('orders-show/{id}', [OrderController::class, 'show'])->name('show-orders');
    Route::get('orders-timeline/{id}', [OrderController::class, 'timeline'])->name('timeline-orders');   
    Route::post('store-orders', [OrderController::class, 'store'])->name('store-orders'); 
    Route::post('update-orders/{id}', [OrderController::class, 'update'])->name('update-orders');   
    Route::get('/orders', [OrderController::class, 'index'])->name('orders'); 
    Route::delete('/orders-destroy/{id}', [OrderController::class, 'destroy'])->name('orders-destroy');

    //events
    Route::get('events', [EventController::class, 'index'])->name('events');   
    Route::get('events-create', [EventController::class, 'create'])->name('create-events'); 
    Route::get('events-edit/{id}', [EventController::class, 'edit'])->name('edit-events'); 
    Route::get('events-show/{id}', [EventController::class, 'show'])->name('show-events');   
    Route::post('store-events', [EventController::class, 'store'])->name('store-events'); 
    Route::post('update-events/{id}', [EventController::class, 'update'])->name('update-events');   
    Route::get('/events', [EventController::class, 'index'])->name('events'); 
    Route::delete('/events-destroy/{id}', [EventController::class, 'destroy'])->name('events-destroy');
});



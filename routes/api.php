<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\JWTController;
use App\Http\Controllers\Backend\UserController;

use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['api','LocaleMiddleware']], function($router) {


    Route::get('/language/{locale}',[LanguageController::class,'swap']);

    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh-token', [JWTController::class, 'refresh']);

    Route::group(['middleware' => 'jwt.auth', 'providers' => 'jwt', 'refresh.token'], function() {
        Route::get('/profile', [JWTController::class, 'profile']);
        Route::get('/users', [UserController::class,'index']);
        Route::post('/user/delete', [UserController::class,'destroy']);
        Route::get('/customer', [UserController::class,'customer']);
        

        Route::get('/user/get/{id}',[UserController::class,'getUser']);
        Route::post('/user/delete/{id}', [UserController::class,'destroy']);
        Route::post('/user/update',[UserController::class,'update']);
        Route::post('/user/add',[UserController::class,'BackendstoreUser']);
        Route::post('/user/updated/password',[UserController::class,'updatewithpassword']);
     

    });
});

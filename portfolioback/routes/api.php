<?php

use App\Http\Controllers\FormationController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['checkToken'])->group(function () {
    Route::controller(InfoController::class)->group(function(){

            Route::get('/getinfo', 'getinfo');
            Route::post('/updateinfo', 'update');
            Route::post('/updateimage', 'updateimage');         
    });
    Route::controller(FormationController::class)->group(function(){

            Route::get('/getformations', 'index');
            Route::post('/storeformation', 'store');
            Route::post('/updateformation' , 'update');
            Route::get('/deleteformation/{id}', 'destroy');
                  
    });

});


Route::post('/login' ,  [UserController::class , 'login' ]);
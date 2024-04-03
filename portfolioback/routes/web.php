<?php

use Illuminate\Support\Facades\Route;
use App\Models\Info;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $info = new User();
    $info->name = 'admin';
    $info->email = 'admin@gmail.com';
    $info->password = Hash::make('12345678');
    // Ajoutez d'autres champs si nécessaire
    $info->save();

    return 'Data inserted successfully';
});


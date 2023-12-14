<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameBoardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/gb', function () {
    return view('gameBoard');
});

Route::get('/test', [App\Http\Controllers\AdminController::class, 'getGridMatrix'])->name('test');
Route::get('/test2', [App\Http\Controllers\AdminController::class, 'test'])->name('test2');

Route::get('/gameboard', [GameBoardController::class, 'index'])->name('gameBoard');

/**
 * 
 * ADMIN ROUTES
 * 
 */

 Route::controller(AdminController::class)
    ->prefix('admin')
    ->group(function(){
        //Main dashboard
        Route::get('/','index');

        //User module
        Route::get('/users','users')->name('users');
        Route::get('/user/{id}','oneUser')->name('user');
        Route::post('/user','addNewUser')->name('addNewUser');
        Route::put('/user/update/{id}','userUpdate')->name('userUpdate');
        Route::delete('/user/delete/{id}','userDelete')->name('userDelete');

        //Games module
        Route::get('/games','games')->name('games');
        Route::post('/games','createNewGame')->name('createNewGame');
    });

<?php

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

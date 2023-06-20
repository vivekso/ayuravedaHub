<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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


Route::get('/user_management', [UserController::class, 'index'])->name('user.management');
Route::get('/user_add', [UserController::class, 'addUser'])->name('user.add');
Route::post('/user_add', [UserController::class, 'add'])->name('user.addUser');



Route::get('/', function () {
    return view('admin.pages.dashboard');
});
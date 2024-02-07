<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ProfileController;
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
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register')->middleware('throttle:2,1');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('create', [InformationController::class, 'create'])->name('create');
    Route::post('store', [InformationController::class, 'store'])->name('store');

    Route::get('profile', [InformationController::class, 'profile'])->name('profile');
    Route::delete('delete/{uid}', [InformationController::class, 'delete'])->name('delete');
    Route::get('edit/{uid}',[InformationController::class,'edit'])->name('edit');
    Route::post('/edit/{uid}/update',[InformationController::class,'update'])->name('update');

    // Route::get('profile',[UserController::class,'show'])->name('');
    Route::post('updatedProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
});

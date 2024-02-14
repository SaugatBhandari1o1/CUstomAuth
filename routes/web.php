<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\UserController;

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
    return view('auth.login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/', function () {
        return view('auth.login');
    });

    // Route::get('admin_login' , [AdminController::class,'index'])->name('admin_login');
    // Route::post('admin_login', [AdminController::class,'admin_login']);

    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->middleware('throttle:2,1');
});




Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('admin/', [AdminController::class, 'a_loginView'])->name('a_loginView');
    Route::post('admin/', [AdminController::class, 'postLogin'])->name('postLogin');
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/logout', [AdminController::class, 'a_logout'])->name('a_logout');
});



Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('create', [InformationController::class, 'create'])->name('create');
    Route::post('store', [InformationController::class, 'store'])->name('store');

    Route::get('profile', [InformationController::class, 'profile'])->name('profile');
    Route::delete('delete/{uid}', [InformationController::class, 'delete'])->name('delete');
    Route::get('edit/{uid}', [InformationController::class, 'edit'])->name('edit');
    Route::post('edit/{uid}/update', [InformationController::class, 'update'])->name('update');

    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('download/{uid}', [InformationController::class, 'download'])->name('download');
});

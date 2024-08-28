<?php

use Illuminate\Support\Facades\Route;

//auth
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

//admin
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;

//affiliate
use App\Http\Controllers\affiliate\BiodataController;
use App\Http\Controllers\affiliate\DashboardAffController;



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

// Route::get('/', function () {
//     return view('admin.index');
// });

//auth
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'register_proses'])->name('register-proses');

//admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/user', [UserController::class, 'index'])->name('user');

    //user
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::delete('/destroy_user/{id}', [UserController::class, 'destroy'])->name('destroy_user');
    Route::get('/form_user', [UserController::class, 'create'])->name('create_user');
    Route::post('/form_user', [UserController::class, 'store'])->name('store_user');
    Route::get('/form_user_edit/{id}', [UserController::class, 'edit'])->name('edit_user');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('update_user');

//affiliate
Route::get('/dashboard_affiliate', [DashboardAffController::class, 'index'])->name('dashboardAff');
Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
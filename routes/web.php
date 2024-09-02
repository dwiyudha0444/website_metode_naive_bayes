<?php

use Illuminate\Support\Facades\Route;

//auth
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

//admin
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\DataLatihController;

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
    //data latih
    Route::get('/datalatih', [DataLatihController::class, 'index'])->name('datalatih');

    Route::get('/form_data_latih', [DataLatihController::class, 'create'])->name('create_data_latih');
    Route::post('/form_data_latih', [DataLatihController::class, 'store'])->name('store_data_latih');
    Route::get('/form_data_latih_edit/{id}', [DataLatihController::class, 'edit'])->name('edit_data_latih');
    Route::put('/data_latih/update/{id}', [DataLatihController::class, 'update'])->name('update_data_latih');
    Route::delete('/data_latih_destroy/{id}', [DataLatihController::class, 'destroy'])->name('destroy_data_latih');

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
Route::get('/biodata_form', [BiodataController::class, 'create'])->name('biodata_form');
Route::post('/biodata_store', [BiodataController::class, 'store'])->name('biodata_store');

Route::get('/biodata_edit/{id}', [BiodataController::class, 'edit'])->name('biodata_edit');
Route::put('/biodata_update/{id}', [BiodataController::class, 'update'])->name('biodata_update');

Route::delete('/biodata_destroy/{id}', [BiodataController::class, 'destroy'])->name('biodata_destroy');
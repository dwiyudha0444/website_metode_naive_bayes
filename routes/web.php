<?php

use Illuminate\Support\Facades\Route;

//auth
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

//admin
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\DataLatihController;
use App\Http\Controllers\admin\PrediksiController;
use App\Http\Controllers\admin\HasilPrediksiController;
use App\Http\Controllers\admin\HitungPrediksiController;

//affiliate
use App\Http\Controllers\affiliate\BiodataController;
use App\Http\Controllers\affiliate\DashboardAffController;
use App\Http\Controllers\affiliate\DataLatihAffController;
use App\Models\HasilPrediksi;

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

    //prediksi
    Route::get('/prediksi', [PrediksiController::class, 'index'])->name('prediksi');
    Route::post('/prediksi', [PrediksiController::class, 'store'])->name('store_prediksi');

    Route::get('/riwayat_prediksi', [HasilPrediksiController::class, 'index'])->name('riwayat_prediksi');

    Route::delete('/riwayat_prediksi_destroy/{id}', [HasilPrediksiController::class, 'destroy'])->name('destroy_riwayat_prediksi');
    Route::get('/riwayat_prediksi_detail/{id}', [HasilPrediksiController::class, 'show'])->name('riwayat_prediksi_detail');
    
    Route::get('/hitung_prediksi', [HitungPrediksiController::class, 'index'])->name('hitung_prediksi');
    Route::post('/hitung_prediksi', [HitungPrediksiController::class, 'showForm'])->name('form.show');

    Route::get('/hasil_hitung_prediksi', [HitungPrediksiController::class, 'create'])->name('create_hasil_hitung_prediksi');
    Route::post('/hasil_hitung_prediksi', [HitungPrediksiController::class, 'store'])->name('store_hasil_hitung_prediksi');
    
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

Route::get('/datalatihAff', [DataLatihAffController::class, 'index'])->name('datalatih');

    Route::get('/form_data_latih_aff', [DataLatihAffController::class, 'create'])->name('create_data_latih_aff');
    Route::post('/form_data_latih_aff', [DataLatihAffController::class, 'store'])->name('store_data_latih_aff');
    Route::get('/form_data_latih_edit_aff/{id}', [DataLatihAffController::class, 'edit'])->name('edit_data_latih_aff');
    Route::put('/data_latih/update_aff/{id}', [DataLatihAffController::class, 'update'])->name('update_data_latih_aff');
    Route::delete('/data_latih_destroy_aff/{id}', [DataLatihAffController::class, 'destroy'])->name('destroy_data_latih_aff');

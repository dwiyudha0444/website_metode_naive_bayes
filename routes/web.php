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

use App\Http\Controllers\downloadPdfController;

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
Route::get('/dashboardAff', [DashboardController::class, 'indexAff'])->name('dashboardAff');
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
Route::delete('/hasil_hitung_prediksi/delete-all', [HitungPrediksiController::class, 'destroyAll'])->name('hasil_hitung_prediksi.destroyAll');


//prediksi aff
Route::get('/prediksi_aff', [PrediksiController::class, 'index_aff'])->name('prediksi_aff');
Route::post('/prediksi_aff', [PrediksiController::class, 'store_aff'])->name('store_prediksi_aff');

Route::get('/riwayat_prediksi_aff', [HasilPrediksiController::class, 'index_aff'])->name('riwayat_prediksi_aff');

Route::delete('/riwayat_prediksi_destroy_aff/{id}', [HasilPrediksiController::class, 'destroy_aff'])->name('destroy_riwayat_prediksi_aff');
Route::get('/riwayat_prediksi_detail_aff/{id}', [HasilPrediksiController::class, 'show_aff'])->name('riwayat_prediksi_detail_aff');

Route::get('/hitung_prediksi_aff', [HitungPrediksiController::class, 'index_aff'])->name('hitung_prediksi_aff');
Route::post('/hitung_prediksi_aff', [HitungPrediksiController::class, 'showForm_aff'])->name('form.show_aff');

Route::get('/hasil_hitung_prediksi_aff', [HitungPrediksiController::class, 'create_aff'])->name('create_hasil_hitung_prediksi_aff');
Route::post('/hasil_hitung_prediksi_aff', [HitungPrediksiController::class, 'store_aff'])->name('store_hasil_hitung_prediksi_aff');
Route::delete('/hasil_hitung_prediksi/delete-all_aff', [HitungPrediksiController::class, 'destroyAll_aff'])->name('hasil_hitung_prediksi.destroyAll_aff');

Route::get('/hasil/{id}', [HitungPrediksiController::class, 'show'])->name('hasil');
Route::post('/save-selected-data', [HitungPrediksiController::class, 'saveSelectedData']);
Route::post('/save-to-database', [HitungPrediksiController::class, 'saveSelectedData']);

Route::get('/perhitungan_prediksi', [HitungPrediksiController::class, 'indexDetail'])->name('perhitungan_prediksi');
Route::delete('/destroy_all', [HitungPrediksiController::class, 'destroyAll'])->name('destroy_all');

Route::get('/biodata_aff', [BiodataController::class, 'indexAff'])->name('biodata_aff');
Route::get('/biodata_form_aff', [BiodataController::class, 'createAff'])->name('biodata_form_aff');
Route::post('/biodata_store_aff', [BiodataController::class, 'storeAff'])->name('biodata_store_aff');

Route::get('/biodata_edit_aff/{id}', [BiodataController::class, 'editAff'])->name('biodata_edit_aff');
Route::put('/biodata_update_aff/{id}', [BiodataController::class, 'updateAff'])->name('biodata_update_aff');

Route::delete('/biodata_destroy_aff/{id}', [BiodataController::class, 'destroyAff'])->name('biodata_destroy_aff');

// routes/web.php
Route::post('/add_data', [HasilPrediksiController::class, 'addData'])->name('add_data');

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

Route::get('/download-pdf', [downloadPdfController::class, 'downloadPdf'])->name('download_pdf');

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

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

Route::view('/','halaman_awal/home');

Route::get('/sesi',[AuthController::class,'index'])->name('auth');
Route::post('/sesi', [AuthController::class, 'login']);

Route::get('/reg',[AuthController::class,'create'])->name('registrasi');
Route::post('/reg', [AuthController::class, 'register']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/user', [UserController::class, 'index'])->name('user');

Route::get('verify/{verify_key}', [AuthController::class, 'verify']);

Route::get('/data-report', [DocumentController::class, 'showReport']);
Route::get('/api/report-data/{id}', [DocumentController::class, 'getReportData']);
Route::get('/data-masuk', [DocumentController::class, 'showDataMasuk']);
Route::get('/api/data-masuk', [DocumentController::class, 'getDataMasuk']);


Route::get('/view', function () {
    return view('halaman_admin.index');
});

<?php

use App\Http\Controllers\ApproveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\vehicleController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('manage', RentalController::class)->except('show');

    Route::resource('vehicle', vehicleController::class)->except('show');
    Route::delete('vehicle/{id}', [vehicleController::class, 'destroy']);


    Route::get('list', [ApproveController::class, 'list'])->name('list');
    Route::post('approve/{id}', [ApproveController::class, 'setStatus'])->name('setStatus');
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::resource('activity', LogActivityController::class)->except('show');
    Route::get('export', [RentalController::class, 'export'])->name('export');
});

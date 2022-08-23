<?php

use App\Http\Controllers\TenantController;
use App\Http\Controllers\UnitController;
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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('tenant')->name('tenant.')->group(function() {
    Route::get('/', [TenantController::class, 'index'])->name('index');
    Route::post('store', [TenantController::class, 'store'])->name('store');
    Route::get('show/{id}', [TenantController::class, 'show'])->name('show');
    Route::get('get-data-js', [TenantController::class, 'getDataJs'])->name('get-data-js');
    Route::get('create', [TenantController::class, 'create'])->name('create');
    Route::put('update/{id}', [TenantController::class, 'update'])->name('update');
    Route::get('delete/{id}', [TenantController::class, 'delete'])->name('delete');
});

Route::prefix('unit')->name('unit.')->group(function() {
    Route::get('/', [UnitController::class, 'index'])->name('index');
    Route::get('show/{id}', [UnitController::class, 'show'])->name('show');
    Route::post('store', [UnitController::class, 'store'])->name('store');
    Route::get('get-data-js', [UnitController::class, 'getDataJs'])->name('get-data-js');
    Route::put('update/{id}', [UnitController::class, 'update'])->name('update');
    Route::get('create', [UnitController::class, 'create'])->name('create');
    Route::get('delete/{id}', [UnitController::class, 'delete'])->name('delete');
});
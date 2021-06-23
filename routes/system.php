<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('service')->group(function () {
    Route::get('{type}/{number}', [App\Http\Controllers\system\ServiceController::class, 'service']);
});

Route::prefix('binnacles')->group(function () {
    Route::get('/', [App\Http\Controllers\Binnacle\BinnacleController::class, 'index'])->name('binnacles');
    Route::get('/columns', [App\Http\Controllers\Binnacle\BinnacleController::class, 'columns']);
    Route::get('/records', [App\Http\Controllers\Binnacle\BinnacleController::class, 'records']);
    Route::get('/tables', [App\Http\Controllers\Binnacle\BinnacleController::class, 'tables']);
    Route::post('/', [App\Http\Controllers\Binnacle\BinnacleController::class, 'store']);
    Route::get('/record/{id}', [App\Http\Controllers\Binnacle\BinnacleController::class, 'record']);
    Route::delete('/{id}', [App\Http\Controllers\Binnacle\BinnacleController::class, 'destroy']);
});

// Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('admin.users');
Route::resource('roles', RoleCotroller::class)->names('admin.roles');

Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\Config\UserController::class, 'index'])->name('users');
    Route::get('/columns', [App\Http\Controllers\Config\UserController::class, 'columns']);
    Route::get('/records', [App\Http\Controllers\Config\UserController::class, 'records']);
    Route::get('/record/{id}', [App\Http\Controllers\Config\UserController::class, 'record']);
    Route::get('/tables', [App\Http\Controllers\Config\UserController::class, 'tables']);
    Route::post('/', [App\Http\Controllers\Config\UserController::class, 'store']);
    Route::delete('/{id}', [App\Http\Controllers\Config\UserController::class, 'destroy']);
    Route::get('/enabled/{type}/{id}', [App\Http\Controllers\Config\UserController::class, 'enabled']);
});

Route::prefix('accounts')->group(function () {
    Route::get('/', [App\Http\Controllers\Config\AccountsController::class, 'index'])->name('accounts');
    Route::get('/columns', [App\Http\Controllers\Config\AccountsController::class, 'columns']);
    Route::get('/records', [App\Http\Controllers\Config\AccountsController::class, 'records']);
    Route::post('/', [App\Http\Controllers\Config\AccountsController::class, 'store']);
    Route::get('/record/{id}', [App\Http\Controllers\Config\AccountsController::class, 'record']);
    Route::delete('/{id}', [App\Http\Controllers\Config\AccountsController::class, 'destroy']);
});

Route::prefix('costs')->group(function () {
    Route::get('/', [App\Http\Controllers\Config\CostsController::class, 'index'])->name('costs');
    Route::get('/columns', [App\Http\Controllers\Config\CostsController::class, 'columns']);
    Route::get('/records', [App\Http\Controllers\Config\CostsController::class, 'records']);
    Route::post('/', [App\Http\Controllers\Config\CostsController::class, 'store']);
    Route::get('/record/{id}', [App\Http\Controllers\Config\CostsController::class, 'record']);
    Route::delete('/{id}', [App\Http\Controllers\Config\CostsController::class, 'destroy']);
});

Route::prefix('persons')->group(function () {
    Route::get('/', [App\Http\Controllers\Config\PersonsController::class, 'index'])->name('persons');
    Route::get('/columns', [App\Http\Controllers\Config\PersonsController::class, 'columns']);
    Route::get('/records', [App\Http\Controllers\Config\PersonsController::class, 'records']);
    Route::get('/record/{id}', [App\Http\Controllers\Config\PersonsController::class, 'record']);
    Route::get('/tables', [App\Http\Controllers\Config\PersonsController::class, 'tables']);
    Route::post('/', [App\Http\Controllers\Config\PersonsController::class, 'store']);
    Route::delete('/{id}', [App\Http\Controllers\Config\PersonsController::class, 'destroy']);
    Route::get('/enabled/{type}/{id}', [App\Http\Controllers\Config\PersonsController::class, 'enabled']);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\system\CommandController;

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
    return view('web/index');
});

Route::get('/calamar', function () {
    return view('web/calamar');
});

Route::get('/peces', function () {
    return view('web/peces');
});

Route::get('/contactanos', function () {
    return view('web/contactanos');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('command/clear-cache', [commandController::class, 'artisanClear'])->name('command.artisanClear');
Route::get('command/storage-link', [commandController::class,'StorageLink'])->name('command.StorageLink');
Route::get('command/migrate', [commandController::class,'migrate'])->name('command.migrate');
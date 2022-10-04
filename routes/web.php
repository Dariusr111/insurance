<?php

use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Http\Controllers\OwnerController;
use App\Models\Owner;


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

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });


    Route::resource('cars', CarController::class);
    Route::get('/automodeliai', [CarController::class, 'rodykModelius'])->name('automodeliai');
    Route::resource('owners', OwnerController::class);
    Route::get('/savininkai', [CarController::class, 'rodykSavininkus'])->name('savininkai');

});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

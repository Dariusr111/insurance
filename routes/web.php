<?php

use App\Http\Controllers\CarController;;
use App\Models\Car;
use App\Http\Controllers\OwnerController;
use App\Models\Owner;
use App\Http\Controllers\ImageController;
use App\Models\Image;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

    Route::get('cars', [CarController::class, 'index'])
        ->name('cars.index');
    Route::resource('cars', CarController::class);

    Route::get('/image/{name}',[CarController::class, 'display'])
        ->name('image.cars');
    Route::resource('images', ImageController::class);

    Route::get('/savininkai', [CarController::class, 'rodykSavininkus'])
        ->name('savininkai');
    Route::resource('owners', OwnerController::class);



//    Route::get('/automodeliai', [CarController::class, 'rodykModelius'])->name('automodeliai');













});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

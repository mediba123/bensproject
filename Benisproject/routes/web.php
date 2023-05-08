<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WomenclothingController;
Route::resource('womenclothings',WomenclothingController::class);

use App\Http\Controllers\MenclothingController;
Route::resource('menclothings',MenclothingController::class);

use App\Http\Controllers\AllproductsController;
Route::resource('allcontrollers',AllproductsController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



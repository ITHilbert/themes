<?php

use ITHilbert\Themes\Controllers\ThemesController;
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

if(env('APP_ENV') == 'local'){
    Route::middleware(['web'])->group(function () {
        Route::get('themes', [ThemesController::class, 'index'])->name('themes');
    });
}


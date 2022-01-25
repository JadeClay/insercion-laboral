<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\OfferController;


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

Auth::routes();

Route::resource('student', StudentController::class);

Route::resource('business', BusinessController::class);

Route::resource('offer', OfferController::class);

Route::get('/stats', function () {
    return view('stats');
})->name('stats');

Route::get('/contacts', function(){
    return view('contacts');
})->name('contacts');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

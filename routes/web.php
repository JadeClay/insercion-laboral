<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\OfferController;
use App\Models\User;
use App\Models\Student;
use App\Models\Offer;
use App\Models\Business;


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

Route::get('/test', function () {
    return 0;
});

Route::get('/stats', function () {
    $studentsSignedUp = Student::all();
    $businessesSignedUp = Business::all();
    $studentsAvailable = Student::whereNull('offer_id');
    $offers = Offer::where('status','=','0');
    return view('stats',["users" => User::all(), "studentsSignedUp" => $studentsSignedUp, "businessesSignedUp" => $businessesSignedUp, "studentsAvailable" => $studentsAvailable, "offers" => $offers]);
})->name('stats');

Route::get('/contacts', function(){
    return view('contacts',["users" => User::all()]);
})->name('contacts');

Route::get('/admin', function(){
    return view('register',["users" => User::all()]);
})->name('admin');

Route::get('/download', [App\Http\Controllers\StudentController::class, 'getDownload'])->name('download');

Route::get('/download-perfil', function($perfil){
    switch ($perfil) {
        case 'inf':
            Storage::download('')
            break;
        case 'gat':
            # code...
            break;
        case 'muebles':
            break;
        case 'patronaje':
            break;
        case 'elca':
            break;
        case 'eldad':
            break;
        case 'auto':
            break;
        case 'mecanizado':
            break;
        default:
            return view('home');
            break;
    }
})->name('download-perfil');

Route::post('/admin', [App\Http\Controllers\AdminController::class, 'create']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

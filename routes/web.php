<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MovieController;
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
    return view('Frontend.layouts.index');
});


// Backend Routes
Route::get('/dashboard', function () {
    return view('Backend.layouts.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource("/movies",MovieController::class);


// Frontend Routes

// User login and Register
Route::get('user/login',[FrontendController::class,'login'])->name('login.form');
Route::post('user/login', [FrontendController::class,'loginSubmit'])->name('login.submit');
Route::get('user/logout',[FrontendController::class,'logout'])->name('user.logout');

// Route::get('user/register',[FrontendController::class,'register')->name('register.form');
Route::post('user/register',[FrontendController::class,'registerSubmit'])->name('register.submit');
// Reset password
Route::post('password-reset',[FrontendController::class,'showResetForm'])->name('password.reset'); 

require __DIR__.'/auth.php';

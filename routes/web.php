<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
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



Route::get('/',[FrontendController::class,'index'])->name('index');


// Backend Routes
Route::group(["middleware"=>[ "admin"],"prefix"=>"admin"],function(){
    Route::get('/dashboard', function () {
        return view('Backend.layouts.dashboard');
    })->name('dashboard');
    
    Route::resource("/movies",MovieController::class);
    Route::get('/userFavorite',[MovieController::class,'UserFavorite'])->name("userFavorite");
});


// Route::get('/email', function() {

//     Mail::to('email@email.com')->send(new SendMail());
//     return new SendMail();
// });

Route::group(["middleware"=>"user"],function(){
    Route::get("/dashboard",[UserController::class,"dashboard"])->name("userDashboard");
    Route::post("/add-to-favorite",[UserController::class,"addToFavourite"]);
    Route::post("/delete-my-favourite/{id}",[UserController::class,"deleteFav"])->name("deleteFav");
});
// Frontend Routes

// User login and Register
Route::get('user/login',[FrontendController::class,'login'])->name('login.form');
Route::post('user/login', [FrontendController::class,'loginSubmit'])->name('login.submit');
Route::get('user/logout',[FrontendController::class,'logout'])->name('user.logout');

// Route::get('user/register',[FrontendController::class,'register')->name('register.form');
Route::post('user/register',[FrontendController::class,'registerSubmit'])->name('register.submit');


require __DIR__.'/auth.php';

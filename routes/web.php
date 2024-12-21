<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inputdata', [FormController::class,'Enkripsi']);
Route::get('/inputgambar', [FormController::class,'tampilanform']);
Route::get('/test2', [FormController::class,'dekripsi']);
Route::get('/citizen', [FormController::class,'index']);
Route::get('/update', [FormController::class,'formupdate']);
Route::get('/destroy', [FormController::class,'formdelete']);
Route::get('/terserah', function(){
    return "hello world";
})->middleware(["coba"]);

Route::middleware(['guest'])->group(function () {
    
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
});
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('dashboard', [AuthController::class, 'dashboard']); 
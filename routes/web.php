<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inputdata', [FormController::class,'Enkripsi']);
Route::get('/inputgambar', [FormController::class,'tampilanform']);
Route::get('/test2', [FormController::class,'dekripsi']);

Route::get('/citizen', [FormController::class,'index']);

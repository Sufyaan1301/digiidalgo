<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', [FormController::class,'Enkripsi']);
Route::get('/test2', [FormController::class,'dekripsi']);
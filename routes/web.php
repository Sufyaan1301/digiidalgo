<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CitizenImgController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('Form',CitizenImgController::class);

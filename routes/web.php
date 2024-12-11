<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CitizenImgController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('Citizens_img',CitizenImgController::class)->names("citizens_img");

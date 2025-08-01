<?php

use Illuminate\Support\Facades\Route;
use App\Modules\DeloSection\Controllers\DeloController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', function () {return view('contact');});

//Групппа адресов для модуля "ДЕЛОПРОИЗВОДСТВО"
Route::get('/delo/table', [DeloController::class, 'ShowTable'])->middleware('auth');
Route::get('/delo/{variant}', [DeloController::class, 'FrontView'])->middleware('auth')->name('delo');
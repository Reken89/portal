<?php

use Illuminate\Support\Facades\Route;
use App\Modules\DeloSection\Controllers\DeloController;
use App\Modules\DeloSection\Controllers\DeloOutController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', function () {return view('contact');});

//Групппа адресов для модуля "ДЕЛОПРОИЗВОДСТВО"
Route::get('/delo/out/table', [DeloOutController::class, 'ShowTable'])->middleware('auth');
Route::post('/delo/doc/add', [DeloController::class, 'AddDoc'])->middleware('auth');
Route::get('/delo/out', [DeloOutController::class, 'FrontView'])->middleware('auth')->name('delo-out');
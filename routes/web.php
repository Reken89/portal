<?php

use Illuminate\Support\Facades\Route;
use App\Modules\DeloSection\Controllers\DeloController;
use App\Modules\DeloSection\Controllers\DeloOutController;
use App\Modules\DeloSection\Controllers\DeloInController;
use App\Modules\DeloSection\Controllers\DeloCorrController;
use App\Modules\DeloSection\Controllers\DeloNpaController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', function () {return view('contact');});

//Групппа адресов для модуля "ДЕЛОПРОИЗВОДСТВО"
Route::get('/delo/out/table', [DeloOutController::class, 'ShowTable'])->middleware('auth', 'delo');
Route::get('/delo/in/table', [DeloInController::class, 'ShowTable'])->middleware('auth', 'delo');
Route::get('/delo/corr/table', [DeloCorrController::class, 'ShowTable'])->middleware('auth', 'delo');
Route::get('/delo/npa/table', [DeloNpaController::class, 'ShowTable'])->middleware('auth', 'delo');
Route::post('/delo/npa/add', [DeloController::class, 'AddNpa'])->middleware('auth', 'delo');
Route::post('/delo/corr/add', [DeloController::class, 'AddCorr'])->middleware('auth', 'delo');
Route::post('/delo/doc/add', [DeloController::class, 'AddDoc'])->middleware('auth', 'delo');
Route::post('/delo/doc/updatestatus', [DeloController::class, 'UpdateStatus'])->middleware('auth', 'delo');
Route::post('/delo/corr/updatestatus', [DeloController::class, 'UpdateCorrStatus'])->middleware('auth', 'delo');
Route::post('/delo/corr/update', [DeloController::class, 'UpdateCorr'])->middleware('auth', 'delo');
Route::post('/delo/doc/update', [DeloController::class, 'UpdateDoc'])->middleware('auth', 'delo');
Route::post('/delo/doc/filters', [DeloController::class, 'ApplyFilter'])->middleware('auth', 'delo');
Route::get('/delo/npa', [DeloNpaController::class, 'FrontView'])->middleware('auth', 'delo');
Route::get('/delo/corr', [DeloCorrController::class, 'FrontView'])->middleware('auth', 'delo');
Route::get('/delo/in', [DeloInController::class, 'FrontView'])->middleware('auth', 'delo');
Route::get('/delo/out', [DeloOutController::class, 'FrontView'])->middleware('auth', 'delo')->name('delo-out');
<?php

use Illuminate\Support\Facades\Route;
use App\Modules\DeloSection\Controllers\DeloController;
use App\Modules\DeloSection\Controllers\DeloOutController;
use App\Modules\DeloSection\Controllers\DeloInController;
use App\Modules\DeloSection\Controllers\DeloCorrController;
use App\Modules\DeloSection\Controllers\DeloNpaController;
use App\Modules\CommunalSection\Admin\Controllers\CommunalAdminController;
use App\Modules\CommunalSection\User\Controllers\CommunalUserController;
use App\Modules\UtilitiesSection\Admin\Controllers\UtilitiesTableAdminController;
use App\Modules\UtilitiesSection\Admin\Controllers\UtilitiesTarifAdminController;
use App\Modules\UtilitiesSection\Admin\Controllers\UtilitiesDiagramAdminController;
use App\Modules\UtilitiesSection\User\Controllers\UtilitiesTableUserController;
use App\Modules\ArchiveSection\User\Controllers\ArchiveUserController;
use App\Modules\ArchiveSection\Admin\Controllers\ArchiveAdminController;
use App\Modules\AdminSection\Controllers\AdministratorController;
use App\Modules\OfsSection\User\Controllers\OfsWorkUserController;

Route::get('/', function () {
    return view('auth.login');
});

//Auth::routes();
Auth::routes([
  'register' => false,
  'reset' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', function () {return view('contact');});

//Группа адресов для модуля "ДЕЛОПРОИЗВОДСТВО"
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

//Группа адресов для модуля "АРХИВ (коммунальные услуги)"
Route::get('/communal/admin/table', [CommunalAdminController::class, 'ShowTable'])->middleware('auth', 'admin');
Route::get('/communal/admin/export', [CommunalAdminController::class, 'ExportTable'])->middleware('auth', 'admin');

Route::get('/communal/user/table', [CommunalUserController::class, 'ShowTable'])->middleware('auth');
Route::get('/communal/user/export', [CommunalUserController::class, 'ExportTable'])->middleware('auth');

Route::get('/communal/admin', [CommunalAdminController::class, 'FrontView'])->middleware('auth', 'admin')->name('communal-admin');
Route::get('/communal/user', [CommunalUserController::class, 'FrontView'])->middleware('auth')->name('communal-user');

//Группа адресов для модуля "Коммунальные услуги"
Route::get('/utilities/admin/table', [UtilitiesTableAdminController::class, 'ShowTable'])->middleware('auth', 'admin');
Route::get('/utilities/admin/export', [UtilitiesTableAdminController::class, 'ExportTable'])->middleware('auth', 'admin');
Route::get('/utilities/admin/tariffs/table', [UtilitiesTarifAdminController::class, 'ShowTable'])->middleware('auth', 'admin');
Route::patch('/utilities/admin/tariffs/update', [UtilitiesTarifAdminController::class, 'UpdateTariffs'])->middleware('auth', 'admin');
Route::patch('/utilities/admin/tariffs/synch', [UtilitiesTarifAdminController::class, 'SynchTariffs'])->middleware('auth', 'admin');
Route::patch('/utilities/admin/table/update', [UtilitiesTableAdminController::class, 'UpdateStatus'])->middleware('auth', 'admin');

Route::get('/utilities/user/table', [UtilitiesTableUserController::class, 'ShowTable'])->middleware('auth');
Route::patch('/utilities/user/table/update', [UtilitiesTableUserController::class, 'UpdateUtilities'])->middleware('auth');
Route::patch('/utilities/user/table/status', [UtilitiesTableUserController::class, 'UpdateStatus'])->middleware('auth');
Route::get('/utilities/user/table/export', [UtilitiesTableUserController::class, 'ExportTable'])->middleware('auth');

Route::get('/utilities/admin', [UtilitiesTableAdminController::class, 'FrontView'])->middleware('auth', 'admin')->name('utilities-admin');
Route::get('/utilities/admin/tariffs', [UtilitiesTarifAdminController::class, 'FrontView'])->middleware('auth', 'admin')->name('utilities-tariffs');
Route::get('/utilities/admin/diagrams', [UtilitiesDiagramAdminController::class, 'FrontView'])->middleware('auth', 'admin')->name('utilities-diagrams');
Route::get('/utilities/user', [UtilitiesTableUserController::class, 'FrontView'])->middleware('auth')->name('utilities-user');

//Группа адресов для модуля "АРХИВ"
Route::get('/archive/admin/table', [ArchiveAdminController::class, 'ShowTable'])->middleware('auth', 'admin');
Route::get('/archive/admin/export', [ArchiveAdminController::class, 'ExportTable'])->middleware('auth', 'admin');

Route::get('/archive/user/table', [ArchiveUserController::class, 'ShowTable'])->middleware('auth');
Route::post('/archive/user/parameters/add', [ArchiveUserController::class, 'AddParameters'])->middleware('auth');
Route::get('/archive/user/export', [ArchiveUserController::class, 'ExportTable'])->middleware('auth');

Route::get('/archive/admin', [ArchiveAdminController::class, 'FrontView'])->middleware('auth')->name('archive-admin');
Route::get('/archive/user', [ArchiveUserController::class, 'FrontView'])->middleware('auth')->name('archive-user');

//Группа адресов для панели администратора
Route::post('/administrator/adduser', [AdministratorController::class, 'AddUser'])->middleware('auth', 'admin');
Route::patch('/administrator/updateinfo', [AdministratorController::class, 'UpdateInfo'])->middleware('auth', 'admin');
Route::patch('/administrator/updatepassword', [AdministratorController::class, 'UpdatePassword'])->middleware('auth', 'admin');
Route::get('/administrator/menu', [AdministratorController::class, 'ShowTable'])->middleware('auth', 'admin');
Route::get('/administrator', [AdministratorController::class, 'FrontView'])->middleware('auth', 'admin')->name('administrator');

//Группа адресов для модуля "ОФС"
Route::get('/ofs/user', [OfsWorkUserController::class, 'FrontView'])->middleware('auth')->name('ofs-user');
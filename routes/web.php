<?php
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);


Route::get('/emails', [\App\Http\Controllers\EmailsController::class, 'index']);
Route::get('/emails/{id}', [\App\Http\Controllers\EmailsController::class, 'index']);
Route::get('/email/delete/{id}', [\App\Http\Controllers\EmailsController::class, 'destroy']);
Route::post('/email/search', [\App\Http\Controllers\EmailsController::class, 'index'])->name('search');
Route::get('/filter', function () {
    return view('filter');
});
Route::post('filter', [\App\Http\Controllers\EmailsController::class, 'filter'])->name('filter_post');


/**
 * Domains
 */
Route::get('/domains', [\App\Http\Controllers\DomainController::class, 'index']);
Route::get('/invalid_domains', [\App\Http\Controllers\DomainController::class,'show_invalid']);
Route::post('/domains_check', [\App\Http\Controllers\DomainController::class,'index'])->name('domains_check');
Route::get('/domain_add', function (){return view('domain_add');});
Route::post('/domain_add', [\App\Http\Controllers\DomainController::class, 'store'])->name('domain_add');
Route::get('/domain_update/{id}', [\App\Http\Controllers\DomainController::class, 'update_show']);
Route::post('/domain_update/', [\App\Http\Controllers\DomainController::class, 'update'])->name('domain_update');
Route::get('/domain_invalid/{id}', [\App\Http\Controllers\DomainController::class, 'invalid']);
Route::get('/domain_valid/{id}', [\App\Http\Controllers\DomainController::class, 'valid']);


Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});


/**
 * Profile
 */

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'getInfos']);
Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'editInfo'])->name('edit_info');

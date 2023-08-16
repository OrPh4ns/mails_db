<?php
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\EmailsController::class, 'index'])->name('index');
Route::get('/emails/{id}', [\App\Http\Controllers\EmailsController::class, 'index']);
Route::get('/email/delete/{id}', [\App\Http\Controllers\EmailsController::class, 'destroy']);
Route::post('/email/search', [\App\Http\Controllers\EmailsController::class, 'search'])->name('search');
Route::get('/filter', function () {
    return view('filter');
});
Route::post('filter', [\App\Http\Controllers\EmailsController::class, 'filter'])->name('filter_post');
Route::get('/domains', [\App\Http\Controllers\DomainController::class, 'index'])->name('domains');
Route::get('/domains_check', function (){return view('domains_check');});
Route::get('/domain_add', function (){return view('domain_add');});
//Route::post('/domain_add', )
Route::get('/domain_update/{id}')->name('domain_update');
Route::post('/type_add', [\App\Http\Controllers\DomainController::class, 'store'])->name('type_add');

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

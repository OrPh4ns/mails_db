<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\EmailsController::class, 'index'])->name('index');
Route::get('/emails/{id}', [\App\Http\Controllers\EmailsController::class, 'index']);
Route::get('/email/delete/{id}', [\App\Http\Controllers\EmailsController::class, 'destroy']);
Route::post('/email/search', [\App\Http\Controllers\EmailsController::class, 'search'])->name('search');
Route::get('/filter', function ()
{
    return view('filter');
});
Route::post('filter', [\App\Http\Controllers\EmailsController::class, 'filter'])->name('filter_post');
Route::get('/checker', [\App\Http\Controllers\EmailsController::class, 'checker'])->name('checker');
Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

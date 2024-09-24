<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/passports', [App\Http\Controllers\PassportController::class, 'index'])->name('passport:index');
Route::get('/passports/create', [App\Http\Controllers\PassportController::class, 'create'])->name('passport:create');
Route::post('/passports/create', [App\Http\Controllers\PassportController::class, 'store'])->name('passport:store');
Route::get('/passports/{client}', [App\Http\Controllers\PassportController::class, 'delete'])->name('passport:delete');
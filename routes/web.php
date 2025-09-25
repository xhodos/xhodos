<?php

use App\Controllers;
use Hodos\Base\Request;
use Hodos\Base\Route;

Route::get('', [Controllers\HomeController::class, 'show'])->name('home');

Route::post('message/store', [Controllers\MessageController::class, 'store'])->name('message.store');

Route::get('login', [Controllers\Auth\LoginController::class, 'show'])->name('login');
Route::get('logout', [Controllers\Auth\LoginController::class, 'destroy'])->name('logout');
Route::post('login', [Controllers\Auth\LoginController::class, 'store']);

Route::get('register', [Controllers\Auth\RegisterController::class, 'show'])->name('register');
Route::post('register', [Controllers\Auth\RegisterController::class, 'store']);

Route::post('fetch-users', [Controllers\FetchController::class, 'getUsers'])->name('fetch.users');

<?php

use App\Controllers;
use Hodos\Base\Request;
use Hodos\Base\Route;

Route::get('', [Controllers\HomeController::class, 'show'])->name('home');
Route::get('', [Controllers\Auth\LoginController::class, 'show'])->name('login');
Route::get('', [Controllers\Auth\RegisterController::class, 'show'])->name('register');


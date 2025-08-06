<?php

use App\Controllers;
use Hodos\Base\Request;
use Hodos\Base\Route;

Route::get('', [Controllers\HomeController::class, 'show']);
Route::put('test-submit', [Controllers\TestSubmitController::class, 'submit'])->name('test-submit');


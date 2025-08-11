<?php

use App\Controllers;
use Hodos\Base\Request;
use Hodos\Base\Route;

Route::get('', [Controllers\HomeController::class, 'show']);


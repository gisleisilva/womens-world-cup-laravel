<?php

use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', DriverController::class);



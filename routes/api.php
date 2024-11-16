<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(base_path('routes/api-web.php'));

Route::middleware('auth:sanctum')->prefix('/admin')->group(base_path('routes/api-admin.php'));

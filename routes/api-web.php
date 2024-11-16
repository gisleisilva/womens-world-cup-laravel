<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/users', function (){
    return \App\Models\DriverUser::all();
});

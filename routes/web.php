<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PekerjaController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('pekerja', PekerjaController::class);

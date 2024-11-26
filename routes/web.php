<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

// bad practice -> reason -> function in route (x)
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PersonController::class, 'welcome'])->name('welcome');
Route::post('/store', [PersonController::class, 'store'])->name('store');
Route::get('/create', [PersonController::class, 'createPerson'])->name('createPerson');

// url -> /view -> page view -> tampilin product

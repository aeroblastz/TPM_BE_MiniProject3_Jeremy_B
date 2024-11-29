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
Route::get('/edit/{id}', [PersonController::class, 'editPerson'])->name('editPerson');
Route::patch('/update/{id}' , [PersonController::class,'updatePerson'])->name('updatePerson');
Route::delete('/delete/{id}', [PersonController::class,'deletePerson'])->name('deletePerson');
// url -> /view -> page view -> tampilin product

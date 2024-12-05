<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;

// bad practice -> reason -> function in route (x)
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PersonController::class, 'welcome'])->name('welcome')->middleware('isLogin');
Route::post('/store', [PersonController::class, 'store'])->name('store');
Route::get('/create', [PersonController::class, 'createPerson'])->name('createPerson')->middleware('isLogin');
Route::get('/edit/{id}', [PersonController::class, 'editPerson'])->name('editPerson')->middleware('isLogin');
Route::patch('/update/{id}' , [PersonController::class,'updatePerson'])->name('updatePerson');
Route::delete('/delete/{id}', [PersonController::class,'deletePerson'])->name('deletePerson')->middleware('isLogin');
Route::get('/register',[AuthController::class,'ShowRegisterForm'])->name('register');
Route::post('/register',[AuthController::class,'Register'])->name('registerStore');
Route::get('/login',[AuthController::class,'ShowLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'Login'])->name('loginStore');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// url -> /view -> page view -> tampilin product

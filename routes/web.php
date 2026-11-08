<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
Route::redirect('/','/customers');
Route::resource('customers',CustomerController::class)->only(['index','create','store','edit','update']);
Route::resource('users',UserController::class)->only(['index','create','store','edit','update']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::resource('ql-loaitin', \App\Http\Controllers\API\CategoryController::class);
Route::resource('ql-account', \App\Http\Controllers\API\AccountController::class);

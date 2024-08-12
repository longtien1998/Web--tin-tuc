<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin


Route::group(['prefix' => 'quan-tri', 'middleware' => ['auth', 'quantri']], function () {
    Route::get('/',[DashboardController::class,'index'])->name('admin')->middleware('quantri');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/show',[DashboardController::class,'show'])->name('hihi');
});
require __DIR__.'/auth.php';

//client
Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('danh-muc/{ten}', [\App\Http\Controllers\BlogController::class,'index'])->name('blogs');
Route::get('danh-muc/{ten}/{tieude}', [\App\Http\Controllers\TinController::class,'index'])->name('blogdetail');


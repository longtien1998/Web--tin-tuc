<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;


// Error
Route::get('/404', function () {
    return view('404');
});

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

    //account
    Route::get('/account', [\App\Http\Controllers\Admin\AccountController::class,'index'])->name('admin.account');
    Route::get('/account/create', [\App\Http\Controllers\Admin\AccountController::class,'create'])->name('admin.account.create');
    Route::post('/account/store', [\App\Http\Controllers\Admin\AccountController::class,'store'])->name('admin.account.store');
    Route::get('/account/{id}/edit', [\App\Http\Controllers\Admin\AccountController::class,'edit'])->name('admin.account.edit');
    Route::put('/account/{id}/update', [\App\Http\Controllers\Admin\AccountController::class,'update'])->name('admin.account.update');
    Route::delete('/account/{id}/delete', [\App\Http\Controllers\Admin\AccountController::class,'destroy'])->name('admin.account.delete');
    Route::post('/account/save-lever', [\App\Http\Controllers\Admin\AccountController::class,'savelever'])->name('admin.account.savelever');


    // category
    Route::get('/category', [\App\Http\Controllers\Admin\CategoryBlogsController::class,'index'])->name('admin.category');
    Route::get('/category/create', [\App\Http\Controllers\Admin\CategoryBlogsController::class,'create'])->name('admin.category.create');
    Route::post('/category/store', [\App\Http\Controllers\Admin\CategoryBlogsController::class,'store'])->name('admin.category.store');
    Route::get('/category/{id}/edit', [\App\Http\Controllers\Admin\CategoryBlogsController::class,'edit'])->name('admin.category.edit');
    Route::put('/category/{id}/update', [\App\Http\Controllers\Admin\CategoryBlogsController::class,'update'])->name('admin.category.update');
    Route::delete('/category/{id}/delete', [\App\Http\Controllers\Admin\CategoryBlogsController::class,'destroy'])->name('admin.category.delete');


    // blog
    Route::get('/blog', [\App\Http\Controllers\Admin\BlogController::class,'index'])->name('admin.blog');
    Route::get('/blog/create', [\App\Http\Controllers\Admin\BlogController::class,'create'])->name('admin.blog.create');
    Route::post('/blog/store', [\App\Http\Controllers\Admin\BlogController::class,'store'])->name('admin.blog.store');
    Route::get('/blog/{id}/edit', [\App\Http\Controllers\Admin\BlogController::class,'edit'])->name('admin.blog.edit');
    Route::put('/blog/{id}/update', [\App\Http\Controllers\Admin\BlogController::class,'update'])->name('admin.blog.update');
    Route::delete('/blog/{id}/delete', [\App\Http\Controllers\Admin\BlogController::class,'destroy'])->name('admin.blog.delete');
});
require __DIR__.'/auth.php';

//client
Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('danh-muc/{ten}', [\App\Http\Controllers\BlogController::class,'index'])->name('blogs');
Route::get('danh-muc/{ten}/{tieude}', [\App\Http\Controllers\TinController::class,'index'])->name('blogdetail');


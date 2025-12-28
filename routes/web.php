<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\DashboardController;


use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\BlogController;


//panel
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('admin/login/do', [AuthenticatedSessionController::class, 'store']);
});
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
Route::middleware('auth')->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    //KATEGORİ MODÜLÜ
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('categories/active/status', [CategoryController::class, 'status']);

    //BLOG YÖNETİMİ
    Route::get('blog', [BlogsController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [BlogsController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogsController::class, 'store'])->name('blog.store');
    Route::delete('blog/{blog}', [BlogsController::class, 'destroy'])->name('blog.destroy');
    Route::get('blog/{blog}/edit', [BlogsController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{blog}', [BlogsController::class, 'update'])->name('blog.update');
    Route::post('blog/active/status', [BlogsController::class, 'status']);
  

});

//front
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/{link}', [BlogController::class, 'index'])->name('blog.list');  
Route::get('/{category:slug}/{blog:slug}', [BlogController::class, 'detail'])->name('blog.detail');
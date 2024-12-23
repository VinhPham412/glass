<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// index create store show edit update destroy

Route::get('/',[ShopController::class, 'index'])->name('shop.index');


Route::get('/admin/login', [AdminController::class, 'showLoginAdmin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'loginAdmin'])->name('admin.process_login');
Route::get('/admin/logout', [AdminController::class, 'logoutAdmin'])->name('admin.logout');


//tạo middleware group login.admin
Route::middleware(['login.admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

    // Post
    Route::get('/admin/post', [PostController::class, 'index'])->name('admin.list_post');    
    Route::get('/admin/post/create', [PostController::class, 'create'])->name('admin.create_post');
    

    Route::post('/admin/post/store', [PostController::class, 'store'])->name('admin.store_post');
    Route::get('/admin/post/show/{id}', [PostController::class, 'show'])->name('admin.show_post');
    Route::get('/admin/post/edit/{id}', [PostController::class, 'edit'])->name('admin.edit_post');
    Route::post('/admin/post/update/{id}', [PostController::class, 'update'])->name('admin.update_post');
    Route::get('/admin/post/delete/{id}', [PostController::class, 'destroy'])->name('admin.delete_post');

    Route::get('/admin/test', [PostController::class, 'test'])->name('admin.test');
});


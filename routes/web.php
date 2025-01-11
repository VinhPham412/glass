<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ShopController::class, 'index'])->name('shop.index');

Route::get('/catfilter',[ShopController::class, 'catfilter'])->name('shop.catfilter');

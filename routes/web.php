<?php
	
	use App\Http\Controllers\AdminController;
	use App\Http\Controllers\PostController;
	use App\Http\Controllers\ShopController;
	use App\Http\Controllers\UserController;
	use Illuminate\Support\Facades\Route;
	use App\Livewire\ProductOverview;
	
	
	Route::get('/', [ShopController::class, 'index'])->name('shop.index');
	
	Route::get('/catfilter', [ShopController::class, 'catfilter'])->name('shop.catfilter');
	
	Route::get('/product_overview/{id}', [ShopController::class, 'product_overview'])->name('shop.product_overview');
	
	Route::get('try_on/{id}', [ShopController::class, 'try_on'])->name('shop.try_on');
	
	Route::get('/test', [ShopController::class, 'test'])->name('shop.test');
	
	Route::get('/test_cam',function (){
		return view('main.try_on.try_on');
	});
	
<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');
Route::get('/details/{id}', [App\Http\Controllers\DetailsController::class, 'index'])->name('details');
Route::get('/toko', [App\Http\Controllers\TokoController::class, 'index'])->name('toko');
Route::get('/toko/details/{id}', [App\Http\Controllers\DetailsStoreController::class, 'showProfile'])->name('details-store');


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/product', [App\Http\Controllers\DashboardProductController::class, 'index'])->name('dashboard-product');
Route::get('/dashboard/product/create', [App\Http\Controllers\DashboardProductController::class, 'create'])->name('dashboard-products-create');
Route::get('/dashboard/product/{id}', [App\Http\Controllers\DashboardProductController::class, 'details'])->name('dashboard-products-details');

Route::get('/dashboard/settings', [App\Http\Controllers\DashboardSettingController::class, 'store'])->name('dashboard-settings-store');
Route::get('/dashboard/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])->name('dashboard-settings-account');

Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
Route::resource('/admin/kategori', App\Http\Controllers\Admin\CategoryController::class)->names('category');

Route::post('/admin/kategori', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');



Route::resource('/admin/user', App\Http\Controllers\Admin\UserController::class )->name('user.index', 'user');

Route::resource('/admin/product', App\Http\Controllers\Admin\ProductController::class )->name('product.index', 'product');

Route::resource('/admin/product-gallery', App\Http\Controllers\Admin\ProductGalleryController::class )->name('product-gallery.index', 'product-gallery');

Auth::routes();
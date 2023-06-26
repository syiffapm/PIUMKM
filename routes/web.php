<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Sentry\Laravel\Tracing\Middleware;
use App\Http\Controllers\DashboardProductController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        Route::get('/product', [App\Http\Controllers\DashboardProductController::class, 'index'])->name('dashboard-product');
        Route::get('/product/create', [App\Http\Controllers\DashboardProductController::class, 'create'])->name('dashboard-product-create');
        Route::post('/product', [App\Http\Controllers\DashboardProductController::class, 'store'])->name('dashboard-product-store');
        Route::get('/product/{id}', [App\Http\Controllers\DashboardProductController::class, 'details'])->name('dashboard-product-details');

         Route::post('/product/{id}', [App\Http\Controllers\DashboardProductController::class, 'update'])->name('dashboard-product-update');

         Route::delete('/product/{id}', [App\Http\Controllers\DashboardProductController::class, 'destroy'])->name('dashboard-products.destroy');

        Route::get('/product/gallery/delete/{id}', [App\Http\Controllers\DashboardProductController::class, 'delete'])->name('dashboard-product-gallery-delete');

      Route::post('/product/gallery/upload', [App\Http\Controllers\DashboardProductController::class, 'uploadGallery'])->name('dashboard-product-gallery-upload');

        Route::get('/settings', [App\Http\Controllers\DashboardSettingController::class, 'store'])->name('dashboard-settings-store');



        Route::get('/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])->name('dashboard-settings-account');

                Route::post('/settings/{redirect}', [App\Http\Controllers\DashboardSettingController::class, 'update'])->name('dashboard-settings-redirect');

    });
});




Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
        
        Route::resource('/kategori', App\Http\Controllers\Admin\CategoryController::class)->names('category');
        Route::post('/kategori', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
        
        Route::resource('/user', App\Http\Controllers\Admin\UserController::class)->names('user');
        
        Route::resource('/product', App\Http\Controllers\Admin\ProductController::class)->names('product');
        
        Route::resource('/product-gallery', App\Http\Controllers\Admin\ProductGalleryController::class)->names('product-gallery');
});


Auth::routes();
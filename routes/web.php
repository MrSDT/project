<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


// User Routes
Route::get('/', 'App\Http\Controllers\user\UserController@index')->name('user.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', 'App\Http\Controllers\user\UserController@userDashboard')->name('user.dashboard');
    // KYC Routes
    Route::get('/dashboard/kyc', 'App\Http\Controllers\user\KycController@index')->name('user.kyc_dashboard');
    Route::get('/dashboard/kyc/submit', 'App\Http\Controllers\user\KycController@submit_kyc')
        ->name('user.submit_kyc');
    Route::post('/dashboard/kyc/submit', 'App\Http\Controllers\user\KycController@store_kyc')
        ->name('user.store_kyc');
    // Advertise Routes
    Route::get('/advertises', 'App\Http\Controllers\user\AdvertiseController@advertise_list')->name('user.advertises');
    Route::get('/advertises/submit', 'App\Http\Controllers\user\AdvertiseController@advertise_submit')
        ->name('user.advertises.submit');
    Route::post('/advertises/submit', 'App\Http\Controllers\user\AdvertiseController@advertise_store')
        ->name('user.advertises_store');
});

require __DIR__.'/auth.php';

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Redirect /admin to /admin/dashboard
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', 'App\Http\Controllers\admin\AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard/users', 'App\Http\Controllers\admin\AdminController@users')->name('admin.users');
    // KYC Admin Routes
    Route::get('/dashboard/kyc', 'App\Http\Controllers\admin\AdminController@kyc')->name('admin.kyc');

    Route::get('/dashboard/kyc/review/{id}', 'App\Http\Controllers\admin\AdminController@kyc_review')
        ->name('admin.kyc_review');

    Route::match(['post', 'delete'],'/dashboard/kyc/review/{id}', 'App\Http\Controllers\admin\AdminController@kyc_update')
        ->name('admin.kyc_update');

    // Advertise Admin Routes
    Route::get('/dashboard/categories', 'App\Http\Controllers\admin\AdminController@categories')
        ->name('admin.categories');
    Route::get('/dashboard/categories/create', 'App\Http\Controllers\admin\AdminController@categories_create')
        ->name('admin.categories_create');
    Route::post('/dashboard/categories/create', 'App\Http\Controllers\admin\AdminController@categories_store')
        ->name('admin.categories_store');
    Route::get('/dashboard/categories/create/{id}', 'App\Http\Controllers\admin\AdminController@categories_edit')
        ->name('admin.categories_edit');
    Route::get('/dashboard/categories/edit/{id}', 'App\Http\Controllers\admin\AdminController@categories_edit')
        ->name('admin.categories_edit');
    Route::post('/dashboard/categories/edit/{id}', 'App\Http\Controllers\admin\AdminController@categories_update')
        ->name('admin.categories_update');
    Route::delete('/dashboard/categories/create/{id}', 'App\Http\Controllers\admin\AdminController@categories_delete')
        ->name('admin.categories_delete');

});

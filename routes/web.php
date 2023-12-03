<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


// User Routes
Route::get('/', 'App\Http\Controllers\user\UserController@index')->name('users.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', 'App\Http\Controllers\user\UserController@userDashboard')->name('user.dashboard');
    // KYC Routes
    Route::get('/dashboard/kyc', 'App\Http\Controllers\user\KycController@index')->name('user.kyc_dashboard');
    Route::get('/dashboard/kyc/submit', 'App\Http\Controllers\user\KycController@submit_kyc')
        ->name('users.submit_kyc');
    Route::post('/dashboard/kyc/submit', 'App\Http\Controllers\user\KycController@store_kyc')
        ->name('users.store_kyc');
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

});

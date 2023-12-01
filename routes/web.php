<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserGroupController;


// User Routes
Route::get('/', 'App\Http\Controllers\user\UserController@index')->name('user.index');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Redirect /admin to /admin/dashboard
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', 'App\Http\Controllers\admin\AdminController@index')->name('admin.dashboard');

});

<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\Admin\Auth\AdminPasswordController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;






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

Route::get('/', function () {
     return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/profile/admin', [AdminProfilController::class, 'edit'])->name('profile.admin.edit');
    Route::patch('/profile/admin', [AdminProfilController::class, 'update'])->name('profile.admin.update');
    Route::delete('/profile/admin', [AdminProfilController::class, 'destroy'])->name('profile.admin.destroy');
});




require __DIR__.'/auth.php';

// Admin

//login route
Route::get('admin', [AuthenticatedSessionController::class, 'create'])->middleware(['guest:admin'])->name('admin.login');
Route::post('admin', [AuthenticatedSessionController::class, 'store'])->middleware(['guest:admin'])->name('adminLogin');
Route::middleware('admin')->group(function(){
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard'); 
});
Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

Route::middleware('admin')->group(function () {
Route::put('admin/password', [AdminPasswordController::class, 'update'])->name('password.admin.update');
});







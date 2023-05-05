<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\LeaveStatusController;
use App\Http\Controllers\AppointmentTypeController;
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

//login admin
Route::get('admin', [AuthenticatedSessionController::class, 'create'])->middleware(['guest:admin'])->name('admin.login');
Route::post('admin', [AuthenticatedSessionController::class, 'store'])->middleware(['guest:admin'])->name('adminLogin');
Route::middleware('admin')->group(function(){
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard'); 
});
Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
Route::middleware('admin')->group(function () {
Route::put('admin/password', [AdminPasswordController::class, 'update'])->name('password.admin.update');
});

//admin user
Route::get('admin/user/index', [UserController::class, 'index'])->name('admin.user.index');
Route::get('admin/user/delete/{user}', [UserController::class, 'delete'])->name('admin.user.delete');
Route::get('/admin/user/edit/{user}',  [UserController::class, 'edit'])->name('admin.user.edit');
Route::put('/admin/user/update/{user}',  [UserController::class, 'update'])->name('admin.user.update');
Route::get('/admin/user/show/{user}',  [UserController::class, 'show'])->name('admin.user.show');
Route::get('/admin/user/create',  [UserController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/store',  [UserController::class, 'store'])->name('admin.user.store');

//leaveType
Route::get('admin/leaveType/index', [LeaveTypeController::class, 'index'])->name('admin.leaveType.index');
Route::get('/admin/leaveType/create',  [LeaveTypeController::class, 'create'])->name('admin.leaveType.create');
Route::post('/admin/leaveType/store',  [LeaveTypeController::class, 'store'])->name('admin.leaveType.store');
Route::get('/admin/leaveType/edit/{leaveType}',  [LeaveTypeController::class, 'edit'])->name('admin.leaveType.edit');
Route::put('/admin/leaveType/update/{leaveType}',  [LeaveTypeController::class, 'update'])->name('admin.leaveType.update');
Route::get('/admin/leaveType/delete/{leaveType}', [LeaveTypeController::class, 'delete'])->name('admin.leaveType.delete');
Route::get('/admin/leaveType/show/{leaveType}',  [LeaveTypeController::class, 'show'])->name('admin.leaveType.show');


//appointmentType
Route::get('admin/appointmentType/index', [AppointmentTypeController::class, 'index'])->name('admin.appointmentType.index');
Route::get('/admin/appointmentType/create',  [AppointmentTypeController::class, 'create'])->name('admin.appointmentType.create');
Route::post('/admin/appointmentType/store',  [AppointmentTypeController::class, 'store'])->name('admin.appointmentType.store');
Route::get('/admin/appointmentType/edit/{appointmentType}',  [AppointmentTypeController::class, 'edit'])->name('admin.appointmentType.edit');
Route::put('/admin/appointmentType/update/{appointmentType}',  [AppointmentTypeController::class, 'update'])->name('admin.appointmentType.update');
Route::get('/admin/appointmentType/delete/{appointmentType}', [AppointmentTypeController::class, 'delete'])->name('admin.appointmentType.delete');
Route::get('/admin/appointmentType/show/{appointmentType}',  [AppointmentTypeController::class, 'show'])->name('admin.appointmentType.show');


//leaveStatus
Route::get('admin/leaveStatus/index', [LeaveStatusController::class, 'index'])->name('admin.leaveStatus.index');
Route::get('/admin/leaveStatus/create',  [LeaveStatusController::class, 'create'])->name('admin.leaveStatus.create');
Route::post('/admin/leaveStatus/store',  [LeaveStatusController::class, 'store'])->name('admin.leaveStatus.store');
Route::get('/admin/leaveStatus/edit/{leaveStatus}',  [LeaveStatusController::class, 'edit'])->name('admin.leaveStatus.edit');
Route::put('/admin/leaveStatus/update/{leaveStatus}',  [LeaveStatusController::class, 'update'])->name('admin.leaveStatus.update');
Route::get('/admin/leaveStatus/delete/{leaveStatus}', [LeaveStatusController::class, 'delete'])->name('admin.leaveStatus.delete');
Route::get('/admin/leaveStatus/show/{leaveStatus}',  [LeaveStatusController::class, 'show'])->name('admin.leaveStatus.show');

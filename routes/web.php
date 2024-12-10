<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.admin_login');
});
Route::get('/admin_register', function () {
    return view('admin.admin_register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/index', [AdminController::class, 'AdminIndex'])->name('admin.index');
    Route::get('admin/read', [AdminController::class, 'AdminRead'])->name('admin.read');
    Route::get('admin/compose', [AdminController::class, 'AdminCompose'])->name('admin.compose');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin_profile/update',[AdminController::class,'AdminProfileUpdate'])->name('admin_profile_update');
    Route::get('admin/users', [AdminController::class, 'admin_users']);



});
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});
Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

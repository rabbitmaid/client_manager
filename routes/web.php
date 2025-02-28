<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\RoleController;
use App\Http\Controllers\Dashboard\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard.client.index')
    ->middleware(['auth', 'verified'])
    ->name('client.dashboard');


Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function() {

    Route::view('', 'dashboard.admin.index')->name('admin.dashboard');

    Route::get('users', [UserController::class, 'index'])->name('admin.dashboard.users');

    Route::get('users/create', [UserController::class, 'create'])->name('admin.dashboard.users.create');

    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('admin.dashboard.users.edit');

    Route::get('users/role/{id}', [UserController::class, 'role'])->name('admin.dashboard.users.role');

    Route::get('roles', [RoleController::class, 'index'])->name('admin.dashboard.roles');

    Route::get('roles/permissions/{id}', [RoleController::class, 'permission'])->name('admin.dashboard.roles.permission');

});

    

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

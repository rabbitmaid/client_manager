<?php

use App\Http\Controllers\Dashboard\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard.client.index')
    ->middleware(['auth', 'verified'])
    ->name('client.dashboard');


Route::prefix('admin')->group(function() {

    Route::view('', 'dashboard.admin.index')
        ->middleware(['auth', 'verified'])
        ->name('admin.dashboard');

    Route::get('users', [UserController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('admin.dashboard.users');

    Route::get('users/create', [UserController::class, 'create'])
        ->middleware(['auth', 'verified'])
        ->name('admin.dashboard.users.create');

    Route::get('users/edit/{id}', [UserController::class, 'edit'])
        ->middleware(['auth', 'verified'])
        ->name('admin.dashboard.users.edit');

    Route::get('users/permission/{id}', [UserController::class, 'permission'])
        ->middleware(['auth', 'verified'])
        ->name('admin.dashboard.users.permission');

});

    

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

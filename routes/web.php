<?php

use App\Services\AuthService;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::livewire('/login', 'pages::auth.login')->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        app(AuthService::class)->logout();

        return redirect()->route('login');
    })->name('logout');

    Route::get('/', fn () => redirect()->route('dashboard'));

    Route::livewire('/dashboard', 'pages::dashboard.index')->name('dashboard');

    Route::prefix('products')->name('products.')->group(function () {
        Route::livewire('/', 'pages::products.index')->name('index');
        Route::livewire('/create', 'pages::products.create')->name('create');
        Route::livewire('/{product}/edit', 'pages::products.edit')->name('edit');
    });
});

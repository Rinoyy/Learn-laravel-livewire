<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::livewire('/', 'pages::products.index')->name('index');
    Route::livewire('/create', 'pages::products.create')->name('create');
    Route::livewire('/{product}/edit', 'pages::products.edit')->name('edit');
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/how-it-works', function () {
    return view('how-it-works');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/view-more', function () {
        return view('view-more');
    })->name('view-more');

    Route::get('/admin-panel', function () {
        return view('admin-panel');
    })->name('admin-panel');
    // })->middleware('can:admin-panel');
});

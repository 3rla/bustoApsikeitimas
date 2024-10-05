<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ListingDetails;

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

    Route::get('/my-houses', function () {
        return view('my-houses');
    })->name('my-houses');

    Route::get('/listing/{id}', function ($id) {
        return view('listing-details', ['id' => $id]);
    })->name('listing.details');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-panel', function () {
        return view('admin-panel');
    })->name('admin-panel');

    Route::get('/admin-panel/users', function () {
        return view('admin.admin-users');
    })->name('admin.users');

    Route::get('/admin-panel/swaps', function () {
        return view('admin.admin-swaps');
    })->name('admin.swaps');

    Route::get('/admin-panel/reviews', function () {
        return view('admin.admin-reviews');
    })->name('admin.reviews');

    Route::get('/admin-panel/reports', function () {
        return view('admin.admin-reports');
    })->name('admin.reports');
});

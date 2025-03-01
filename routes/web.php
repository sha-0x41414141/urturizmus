<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/destinations', [DestinationController::class, 'index']);
Route::post('/destinations/{id}', [DestinationController::class, 'book'])->name('destinations.book');

Route::delete('/destinations/{id}', [DestinationController::class, 'delete'])->name('destinations.delete')->middleware(AdminMiddleware::class);
Route::get('/destination/{id}', [DestinationController::class, 'show'])->name('destination.show')->middleware(AdminMiddleware::class);
Route::put('/destination/{id}', [DestinationController::class, 'update'])->name('destination.update')->middleware(AdminMiddleware::class);

Route::get('/reservations', [ReservationController::class, 'index'])->middleware(UserMiddleware::class);

Route::get('/new-destination', function()
{
    return view('destinations.create');
})->middleware(AdminMiddleware::class);

Route::post('/new-destination', [DestinationController::class, 'store'])->name('destinations.create')->middleware(AdminMiddleware::class);

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

require __DIR__.'/auth.php';

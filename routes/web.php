<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ContactController;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactMessageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/menu', [DishController::class, 'index'])->name('menu');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Dishes management
    Route::resource('dishes', DishController::class);
    
    // Contact messages management
    Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('admin.contact-messages.index');
    Route::get('/contact-messages/{message}', [ContactMessageController::class, 'show'])->name('admin.contact-messages.show');
    Route::delete('/contact-messages/{message}', [ContactMessageController::class, 'destroy'])->name('admin.contact-messages.destroy');
});

require __DIR__.'/auth.php';

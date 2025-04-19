<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Models\Dish;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/menu', function () {
    $dishes = Dish::where('is_available', true)->latest()->get();
    return view('menu', compact('dishes'));
})->name('menu');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/send', function (Request $request) {
    // Hier komt later de logica voor het verwerken van het contactformulier
    return redirect()->route('contact')->with('success', 'Bedankt voor uw bericht! We nemen zo spoedig mogelijk contact met u op.');
})->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('dishes', DishController::class);
});

require __DIR__.'/auth.php';

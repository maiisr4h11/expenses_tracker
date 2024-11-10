<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

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

    // Expense routes
    Route::resource('expenses', ExpenseController::class);
    Route::get('expenses/summary', [ExpenseController::class, 'summary'])->name('expenses.summary');

    // Show the form to add a new expense
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');

    // Handle the form submission and save the data
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

});

require __DIR__.'/auth.php';

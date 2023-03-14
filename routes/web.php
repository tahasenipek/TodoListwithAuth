<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/todolist', [TodolistController::class, 'index'])->name('index');
        Route::post('/todolist', [TodolistController::class, 'store'])->name('store');
        Route::put('/todolist', [TodolistController::class, 'update'])->name('update');
        Route::delete('/todolist/{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

/* Route::get('/dashboard', [TodolistController::class, 'index'])->name('index');
Route::post('/dashboard', [TodolistController::class, 'store'])->name('store');
Route::put('/dashboard', [TodolistController::class, 'update'])->name('update');
Route::delete('/dashboard/{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy'); */
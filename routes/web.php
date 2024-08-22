<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
    Route::get('/register', 'create')->name('login.register');
    Route::get('/dashboard', 'index')->name('login.index');
});

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/book', [UserController::class,'index'])->name('index');
Route::get('/books', [UserController::class, 'create'])->name('books.index');
Route::get('/books/create', [UserController::class, 'create'])->name('books.create');
Route::post('/books', [UserController::class, 'store'])->name('books.store');
Route::post('/books/{user}', [UserController::class, 'show'])->name('books.show');
Route::get('/books/{user}/edit', [UserController::class, 'edit'])->name('books.edit');
Route::put('/books/{user}', [UserController::class, 'update'])->name('books.update');
Route::delete('/books/{user}', [UserController::class, 'destroy'])->name('books.destroy');


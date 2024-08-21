<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class,'index'])->name('index');
Route::get('/books', [UserController::class, 'create'])->name('books.index');
Route::get('/books/create', [UserController::class, 'create'])->name('books.create');
Route::post('/books', [UserController::class, 'store'])->name('books.store');
Route::post('/books/{user}', [UserController::class, 'show'])->name('books.show');
Route::get('/books/{user}/edit', [UserController::class, 'edit'])->name('books.edit');
Route::put('/books/{user}', [UserController::class, 'update'])->name('books.update');
Route::delete('/books/{user}', [UserController::class, 'destroy'])->name('books.destroy');


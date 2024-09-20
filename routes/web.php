<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\CarrinhoController;



Route::get('/', [AdmController::class,'index'])->name('user-adm');
Route::get('/user-adm', [AdmController::class,'index'])->name('adm.index');



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/register', 'create')->name('login.register');
    Route::get('/dashboard', 'index')->name('login.index');
});

Route::get('/', [CadastroController::class, 'index'])->name('cadastro');
Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro.index');
Route::post('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/book', [UserController::class,'index'])->name('index')->middleware('admin');
Route::get('/books/create', [UserController::class, 'create'])->name('books.create');
Route::post('/books', [UserController::class, 'store'])->name('books.store');
Route::get('/books/{user}', [UserController::class, 'show'])->name('books.show');
Route::get('/books/{user}/edit', [UserController::class, 'edit'])->name('books.edit');
Route::put('/books/{user}', [UserController::class, 'update'])->name('books.update');
Route::delete('/books/{user}', [UserController::class, 'destroy'])->name('books.destroy');

Route::get('/usuario', [UsuarioController::class,'index'])->name('usuario');

Route::get('/', [LivroController::class,'index'])->name('livro');
Route::get('/livro', [LivroController::class,'index'])->name('livro.index');

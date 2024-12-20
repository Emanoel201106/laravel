<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CadastroController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/register', 'create')->name('login.register');
});

Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro');
Route::post('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');

Route::get('/book', [UserController::class,'index'])->name('book.index')->middleware('admin');
Route::get('/crud/create', [UserController::class, 'create'])->name('crud.create');
Route::post('/crud', [UserController::class, 'store'])->name('crud.store');
Route::get('/crud/{user}/edit', [UserController::class, 'edit'])->name('crud.edit');
Route::put('/crud/{user}', [UserController::class, 'update'])->name('crud.update');
Route::delete('/crud/{user}', [UserController::class, 'destroy'])->name('crud.destroy');

Route::get('/usuario', [UsuarioController::class,'index'])->name('usuario')->middleware('user');
Route::get('/carrinho', [UsuarioController::class,'carrinho'])->name('carrinho')->middleware('user');
Route::get('/adicionar-ao-carrinho/{id}', [UsuarioController::class,'adicionar'])->name('adicionar-ao-carrinho');
Route::patch('/atualizar-carrinho', [UsuarioController::class,'atualizar'])->name('atualizar_carrinho');
Route::delete('/remover-do-carrinho', [UsuarioController::class,'remover'])->name('remover_do_carrinho');
Route::delete('/limpar-carrinho', [UsuarioController::class,'limpar'])->name('limpar_carrinho');
Route::get('/livro/{slug}', [UsuarioController::class, 'details'])->name('livro');

Route::get('/lista-desejo', [UsuarioController::class,'lista'])->name('lista')->middleware('user');
Route::post('/atualizar-lista', [UsuarioController::class, 'updatelista'])->name('atualizar-lista');
Route::get('/mover-lista{id}', [UsuarioController::class, 'moverlista'])->name('mover-lista');


Route::get('/checkout', [UsuarioController::class,'checkout'])->name('checkout');
Route::delete('compra-concluida', [UsuarioController::class, 'concluir'])->name('compra-concluida');
Route::get('/comprar-agora/{id}', [UsuarioController::class,'comprar'])->name('comprar-agora');

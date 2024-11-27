@extends('templates.template')

@section('title', "Novo Usuário")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="crud" href="{{route('book.index')}}"><img src="{{url('assets/img/livraria.png')}}" width="110px" height="100px"></a>
                <div class="collapse navbar-collapse">
                    <div class="alinhar">
                        <h2 class="titulo">Criar novo usuário</h1>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        <a class="menu-link" id="sair" href="{{route('login.store')}}"><div class="cabeçalho">
                            <img class="c-logout" src="{{url('assets/img/icones/logout.png')}}" width="40px" height="42px"/>
                            <li class="car">Sair</li>
                        </div></a>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
<div class="box-3">

@if(session()->has('success'))
    {{session()->get('sucess')}}
@endif
@error('error')
    <span>{{$message}}</span>
    @enderror
<div>
<form class="cadastro" action="{{route('cadastro.create')}}" method="post">
    @csrf
    <div>
    <h5 class="cad-title" style="margin-top: 10px">Nome</h3>
    <input class="criar" type="text" name="name" placeholder="Nome" required><br><br>
    <h5 class="cad-title">Email</h3>
    <input class="criar" type="email" name="email" placeholder="Email" required><br><br>
    <h5 class="cad-title">Livro</h3>
    <input class="criar" type="text" name="livro" placeholder="Livro" required><br><br>
    <h5 class="cad-title">Categoria</h3>
    <input class="criar" type="text" name="categoria" placeholder="Categoria" required><br><br>
    <h5 class="cad-title">Senha</h3>
    <input class="criar" type="password" name="password" placeholder="Senha" required> <br><br>
    <label class="checkbox" for="customCheck">
    <input class="choice" type="checkbox" value="1" name="admin">
    Administrador</label>
    <label class="checkbox" for="customCheck">
    <input class="choice" type="checkbox" value="1" name="user">
    Usuário</label> <br>
    </div>
    <button id="botao" class="enter" type="submit">Criar</button>
</form></div>
@endsection


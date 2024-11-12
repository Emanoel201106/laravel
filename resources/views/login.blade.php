@extends('templates.template')

@section('title', "Login")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="crud" href=""><img src="{{url('assets/img/livraria.png')}}" width="110px" height="100px"></a>
        <div class="icones">
             <ul class="navbar-nav ms-auto">
                <a class="menu-link" id="home" href="/"><div>
                    <img class="home" src="{{url('assets/img/icones/home.png')}}" height="45px"/>
                    <li class="car nav-item mx-0 mx-lg-1">Início</li>
                </div></a>

            </ul>
        </div>
    </div>
</nav><br><br><br>

<div class="box-login">
<h2>Login</h2><hr>

@if(session()->has('success'))
    {{session()->get('sucess')}}
@endif
@error('error')
    <span>{{$message}}</span>
    @enderror
<form class="text-center" action="{{route('login.store')}}" method="post">
    @csrf
    <h4 class="l-title">Email</h4>
    <input class="email_senha" type="text" name="email" placeholder="Email">
    @error('email')
    <br><span class="mensagem">{{$message}}</span>
    @enderror <br><br>
    <h4 class="l-title">Senha</h4>
    <input class="email_senha" type="password" name="password" placeholder="Senha"> <br>
    <div class="text-right">
        <a href="" class="forget">Esqueceu a senha?</a>
    </div>
    @error('password')
    <span class="mensagem">{{$message}}</span><br><br>
    @enderror
    <button id="botao" class="enter" type="submit">Entrar</button>
</form>
</div>
@endsection

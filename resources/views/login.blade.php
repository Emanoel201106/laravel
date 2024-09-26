@extends('templates.template')

@section('title', "Login")
@section('content')
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top">
            <div class="container">
                <a class="crud" href="">CRUD de Usuário</a>
                <div>
                     <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="menu-link" id="home" href="/">Início</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="menu-link" id="login" href="{{url('/user-adm')}}">Alterar usuário</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
<div class="box">
<h2 class="text-center">Login</h2><hr>

@if(session()->has('success'))
    {{session()->get('sucess')}}
@endif
@error('error')
    <span>{{$message}}</span>
    @enderror
<form class="text-center" action="{{route('login.store')}}" method="post">
    @csrf
    <input class="email_senha" type="text" name="email" placeholder="Email">
    @error('email')
    <br><span>{{$message}}</span>
    @enderror <br><br>
    <input class="email_senha" type="password" name="password" placeholder="Senha"> <br>
    @error('password')
    <span>{{$message}}</span><br>
    @enderror
    <input type="checkbox" class="custom-control-input" id="customCheck">
    <label class="checkbox" for="customCheck"><input type="checkbox"> Lembrar de mim</label> <br>
    <button id="botao" class="btn btn-primary" type="submit">Entrar</button>
</form><hr>
<div class="text-center">
    <a href="">Esqueceu a senha?</a>
</div>
<div class="text-center">
    <a href="">Criar uma conta!</a>
</div>
</div>
<div class="text-center mt-3 mb-4">

</div>
 <footer class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; CRUD 2024</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                    <a id="logo" class="btn btn-dark btn-social mx-2" href="https://web.whatsapp.com/" aria-label="Whatsapp"><img class="logo" src="{{url('assets/img/logo1.png')}}"/></a>
                        <a id="logo" class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/" aria-label="Instagram"><img class="logo" src="{{url('assets/img/logo2.png')}}"/></a>
                        <a id="logo" class="btn btn-dark btn-social mx-2" href="https://github.com/" aria-label="GitHub"><img class="logo" src="{{url('assets/img/logo3.png')}}"/></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="">Política de Privacidade</a>
                        <a class="link-dark text-decoration-none" href="">Termos de Uso</a>
                    </div>
                </div>
            </div>
        </footer>
@endsection

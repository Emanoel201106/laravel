@extends('templates.template')

@section('content')
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top">
            <div class="container">
                <a class="crud" href="{{route('index')}}">CRUD de Usuário</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class=""><a class="menu-link" id="home" href="/">Início</a></li>
                        <li class=""><a class="menu-link" id="sair" href="{{route('login.store')}}">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
<div class="box-3">
<h2 class="text-center">Criar novo usuário</h2><hr>

@if(session()->has('success'))
    {{session()->get('sucess')}}
@endif
@error('error')
    <span>{{$message}}</span>
    @enderror
<form class="text-center" action="{{route('cadastro.create')}}" method="post">
    @csrf
    <h5 class="cad-title">Nome</h3>
    <input class="email_senha" type="text" name="name" placeholder="Nome" required><br><br>
    <h5 class="cad-title">Email</h3>
    <input class="email_senha" type="email" name="email" placeholder="Email" required><br><br>
    <h5 class="cad-title">Senha</h3>
    <input class="email_senha" type="password" name="password" placeholder="Senha" required> <br><br>
    <h5 class="text-center">Será administrador?</h3>
    <label class="checkbox" for="customCheck">
    <input type="checkbox" value="1" name="admin">
    Sim</label>
    <label class="custom-control-label" for="customCheck">
    <input type="checkbox" value="1" name="user">
    Não</label> <br>
    <button id="botao" class="btn btn-primary" type="submit">Criar</button>
</form>
<footer class="footer py-4">
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
''

@extends('templates.template')

@section('title', "Login")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="crud" href="">CRUD de Usuário</a>
        <div>
             <ul class="navbar-nav ms-auto">
                <a class="menu-link" id="home" href="/"><div>
                    <img class="home" src="{{url('assets/img/icones/home.png')}}" height="45px"/>
                    <li class="nav-item mx-0 mx-lg-1">Início</li>
                </div></a>
                <a class="menu-link" id="login" href="{{url('/user-adm')}}"><div>
                    <img class="a-user" src="{{url('assets/img/icones/login.svg')}}" width="45px" height="45"/>
                    <li class="nav-item mx-0 mx-lg-1">Alterar usuário</li>
                </div></a>
            </ul>
        </div>
    </div>
</nav><br><br><br>

<div class="box">
<h2 class="titles">Login</h2><hr>

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

 <footer class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; CRUD 2024</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a id="logo" class="btn btn-social mx-2" href="https://web.whatsapp.com/" aria-label="Whatsapp"><img class="logo" src="{{url('assets/img/logos/logo1.png')}}"/></a>
                        <a id="logo" class="btn btn-social mx-2" href="https://www.instagram.com/" aria-label="Instagram"><img class="logo" src="{{url('assets/img/logos/logo2.png')}}"/></a>
                        <a id="logo" class="btn btn-social mx-2" href="https://github.com/" aria-label="GitHub"><img class="logo3" src="{{url('assets/img/logos/logo3.png')}}"/></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="termo" id="policy" href="">Política de Privacidade</a>
                        <a class="termo" href="">Termos de Uso</a>
                    </div>
                </div>
            </div>
        </footer>
@endsection

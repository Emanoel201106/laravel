@extends('templates.template')

@section('title', "Home")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
            <div class="container">
                <a class="crud" href="">CRUD de Usuário</a>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <a class="menu-link" id="login" href="{{url('/user-adm')}}"><div>
                            <img class="login" src="{{url('assets/img/icones/login.svg')}}" width="45px" height="45"/>
                            <li class="nav-item mx-0 mx-lg-1">Entrar</li>
                        </div></a>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
        <h1 class="title">Bem-vindo à página inicial!</h1><br>
@endsection

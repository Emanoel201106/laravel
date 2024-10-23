@extends('templates.template')

@section('title', "Seleção de usuário")
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
                    </ul>
                </div>
            </div>
        </nav><br><br><br>

        <div class="box">
           <div  class="user" id="adm">
                <a href="{{route('login.store')}}" class="user-name"><img class="usuario" id="admin" src="{{url('assets/img/adm.png')}}"/><h1 class="text-center">Administrador</h1></a>
            </div>
            <div class="user">
                <a href="{{route('login.store')}}" class="user-name"><img class="usuario" src="{{url('assets/img/user.png')}}"/><h1 class="text-center">Usuário</h1></a>
            </div>
        </div>


@endsection

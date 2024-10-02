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
                        <a class="link-dark text-decoration-none me-3" href="">Política de Privacidade</a>
                        <a class="link-dark text-decoration-none" href="">Termos de Uso</a>
                    </div>
                </div>
            </div>
        </footer>
@endsection

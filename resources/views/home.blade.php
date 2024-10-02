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

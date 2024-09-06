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
    <div class="box-2">
    <h1 class="titulo">@if(isset($book)) Editar @else Cadastrar @endif</h1> <hr>
    <div class="col-8 m-auto">
        @if(isset($book))
            <form id="formEdit" method="post" action="{{ url("books/$book->id") }}">
                @method('PUT')
        @else
            <form id="formCad" method="post" action="{{ url('books') }}">
        @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="{{ $book->nome ?? '' }}" required> <br>
            <select class="form-control" name="id_user" id="id_user">
                <option value="{{ $book->relUsers->id ?? '' }}">{{ $book->relUsers->id ?? 'Id' }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }}</option>
                @endforeach
            </select> <br>
            <input class="form-control" type="text" name="idade" id="idade" placeholder="Idade" value="{{ $book->idade ?? '' }}" required> <br>
            <input class="form-control" type="text" name="emprego" id="emprego" placeholder="Emprego" value="{{ $book->emprego ?? '' }}" required> <br>
            <div class="text-center">
            <input class="btn btn-primary" type="submit" value="@if(isset($book)) Editar @else Cadastrar @endif">
            </div>
        </form>
    </div>
    </div>
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

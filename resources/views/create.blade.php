@extends('templates.template')

@section('title', "Editar")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="crud" href="{{route('index')}}">CRUD de Usuário</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <a class="menu-link" id="sair" href="{{route('login.store')}}"><div class="cabeçalho">
                            <img class="logout" src="{{url('assets/img/icones/logout.png')}}"/>
                            <li class="">Sair</li>
                        </div></a>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
    <div class="box-2">
    <h1 class="titulo">@if(isset($user)) Editar @endif</h1> <hr>
    <div class="col-8 m-auto">
        @if(isset($user))
            <form id="formEdit" method="post" action="{{ url("crud/{$user->id}") }}">
                @method('PUT')
        @else
            <form id="formCad" method="post" action="{{ url('crud') }}">
        @endif
            @csrf
            <input class="form-control" type="text" name="name" id="name" placeholder="Nome" value="{{ $user->name ?? '' }}" required> <br>
            <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="{{ $user->email ?? '' }}" required> <br>
            <input class="form-control" type="text" name="livro" id="livro" placeholder="Livro" value="{{ $user->livro ?? '' }}" required> <br>
            <input class="form-control" type="text" name="genero" id="genero" placeholder="Gênero" value="{{ $user->genero ?? '' }}" required> <br>

            <input type="checkbox" name="admin" id="admin" {{ isset($user) && $user->admin ? 'checked' : '' }}>
            <label class="checkbox-2" for="admin">Administrador</label>
            <input type="checkbox" name="user" id="user" {{ isset($user) && $user->user ? 'checked' : '' }}>
            <label for="user">Usuário</label><br><br>


            <div class="text-center">
            <input class="btn btn-primary" type="submit" value="@if(isset($user)) Editar @endif">
            </div>
        </form>
    </div>
    </div>
    <footer class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; CRUD 2024</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a id="logo" class="btn btn-social mx-2" href="https://web.whatsapp.com/" aria-label="Whatsapp"><img class="logo" src="{{url('assets/img/logo1.png')}}"/></a>
                        <a id="logo" class="btn btn-social mx-2" href="https://www.instagram.com/" aria-label="Instagram"><img class="logo" src="{{url('assets/img/logo2.png')}}"/></a>
                        <a id="logo" class="btn btn-social mx-2" href="https://github.com/" aria-label="GitHub"><img class="logo3" src="{{url('assets/img/logo3.png')}}"/></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="">Política de Privacidade</a>
                        <a class="link-dark text-decoration-none" href="">Termos de Uso</a>
                    </div>
                </div>
            </div>
        </footer>
@endsection

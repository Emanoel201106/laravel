@extends('templates.template')

@section('title', "Editar")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="crud" href="{{route('book.index')}}"><img src="{{url('assets/img/livraria.png')}}" width="110px" height="100px"></a>
                <div class="collapse navbar-collapse">
                    <div class="alinhar-edit">
                        <h2 class="titulo">Editar</h1>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        <a class="menu-link" id="sair" href="{{route('login.store')}}"><div class="cabeçalho">
                            <img class="c-logout" src="{{url('assets/img/icones/logout.png')}}" width="40px" height="42px"/>
                            <li class="car">Sair</li>
                        </div></a>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
    <div class="box-2">
    <div class="col-8 m-auto">
        @if(isset($user))
            <form id="formEdit" method="post" action="{{ url("crud/{$user->id}") }}">
                @method('PUT')
        @else
            <form id="formCad" method="post" action="{{ url('crud') }}">
        @endif
            @csrf
            <div>
            <h4 class="edit" style="margin-top: 4px">Nome</h4>
            <input class="infor" type="text" name="name" placeholder="Nome" value="{{ $user->name ?? '' }}" required> <br>
            <h4 class="edit">Email</h4>
            <input class="infor" type="text" name="email" placeholder="Email" value="{{ $user->email ?? '' }}" required> <br>
            <h4 class="edit">Livro</h4>
            <input class="infor" type="text" name="livro" placeholder="Livro" value="{{ $user->livro ?? '' }}" required> <br>
            <h4 class="edit">Categoria</h4>
            <input class="infor" type="text" name="categoria" placeholder="Categoria" value="{{ $user->categoria ?? '' }}" required> <br>

            <input type="checkbox" name="admin" id="admin" {{ isset($user) && $user->admin ? 'checked' : '' }}>
            <label class="checkbox-2" for="admin">Administrador</label>
            <input type="checkbox" name="user" id="user" {{ isset($user) && $user->user ? 'checked' : '' }}>
            <label for="user" style="margin-bottom: 0px">Usuário</label><br><br>
            </div>

            <div class="text-center">
            <input class="edita" type="submit" value="@if(isset($user)) Editar @endif">
            </div>
        </form>
    </div>
    </div>
@endsection

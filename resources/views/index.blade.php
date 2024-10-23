@extends('templates.template')

@section('title', "Crud de Usuário")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="crud" href="">CRUD de Usuário</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <a class="menu-link" id="cadastrar" href="{{url('cadastro')}}"><div class="cabeçalho">
                            <img class="" src="{{url('assets/img/icones/add.png')}}" width="50px" height="45px"/>
                            <li class="">Criar usuário</li>
                        </div></a>
                        <a class="menu-link" id="sair" href="{{route('login.store')}}"><div class="cabeçalho">
                            <img class="c-logout" src="{{url('assets/img/icones/logout.png')}}" width="45px" height="42px"/>
                            <li class="">Sair</li>
                        </div></a>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
    <h1 class="titulo">Crud de Usuário</h1>
    <hr>
    <div class="tabela col-8 m-auto">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Livro</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Administrador</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->livro }}</td>
                    <td>{{ $user->categoria }}</td>
                    <td>{{ $user->admin }}</td>
                    <td>{{ $user->user }}</td>
                    <td>

                        <a href="{{ url("crud/{$user->id}/edit") }}">
                            <button class="editar">Editar</button>
                        </a>
                        <a href="#" class="js-del" data-id="{{ $user->id }}">
                            <button class="deletar">Deletar</button>
                        </a>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('crud.destroy', ['user' => $user->id]) }}" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.querySelectorAll('.js-del').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();

                if (confirm('Tem certeza de que deseja deletar?')) {
                    var formId = 'delete-form-' + this.dataset.id;
                    document.getElementById(formId).submit();
                }
            });
        });
    </script>
@endsection

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
    <div class="col-8 m-auto">
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
                    <td class="item">{{ $user->id }}</td>
                    <td class="item">{{ $user->name }}</td>
                    <td class="item">{{ $user->email }}</td>
                    <td class="item">{{ $user->livro }}</td>
                    <td class="item">{{ $user->categoria }}</td>
                    <td class="item">{{ $user->admin }}</td>
                    <td class="item">{{ $user->user }}</td>
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

@extends('templates.template')

@section('content')
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top">
            <div class="container">
                <a class="crud" href="">CRUD de Usuário</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class=""><a class="menu-link" id="home" href="/">Início</a></li>
                        <li class=""><a class="menu-link" id="cadastrar" href="{{url('cadastro')}}">Criar usuário</a></li>
                        <li class=""><a class="menu-link" id="sair" href="{{route('login.store')}}">Sair</a></li>
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
                    <th scope="col">Idade</th>
                    <th scope="col">Emprego</th>
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
                    <td>{{ $user->idade }}</td>
                    <td>{{ $user->emprego }}</td>
                    <td>{{ $user->admin }}</td>
                    <td>{{ $user->user }}</td>
                    <td>

                        <a href="{{ url("books/{$user->id}/edit") }}">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="#" class="js-del" data-id="{{ $user->id }}">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('books.destroy', ['user' => $user->id]) }}" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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

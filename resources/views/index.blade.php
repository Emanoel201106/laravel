@extends('templates.template')

@section('content')
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top">
            <div class="container">
                <a class="crud" href="">CRUD de Usuário</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class=""><a class="menu-link" id="home" href="/">Início</a></li>
                        <li class=""><a class="menu-link" id="cadastrar" href="{{url('books/create')}}">Cadastrar</a></li>
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
                    <th scope="col">Idade</th>
                    <th scope="col">Emprego</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($book as $books)
                <tr>
                    <th scope="row">{{ $books->id }}</th>
                    <td>{{ $books->nome }}</td>
                    <td>{{ $books->idade }}</td>
                    <td>{{ $books->emprego }}</td>
                    <td>
                        <a href="{{ url("books/{$books->id}/edit") }}">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="#" class="js-del" data-id="{{ $books->id }}">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                        <form id="delete-form-{{ $books->id }}" action="{{ route('books.destroy', ['user' => $books->id]) }}" method="POST" style="display:none;">
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
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2024</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a id="logo" class="btn btn-dark btn-social mx-2" href="https://web.whatsapp.com/" aria-label="Whatsapp"><img class="logo" src="{{url('assets/img/logo1.png')}}"/></a>
                        <a id="logo" class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/" aria-label="Instagram"><img class="logo" src="{{url('assets/img/logo2.png')}}"/></a>
                        <a id="logo" class="btn btn-dark btn-social mx-2" href="https://github.com/" aria-label="GitHub"><img class="logo" src="{{url('assets/img/logo3.png')}}"/></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
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

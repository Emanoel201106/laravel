@extends('templates.template')

@section('content')
    <h1 class="text-center">Crud de Usuário</h1>
    <hr>
    <div class="text-center mt-3 mb-4">
        <a href="{{ url('/') }}">
            <button class="btn btn-dark">Home</button>
        </a>
    <div class="text-center mt-3 mb-4">
        <a href="{{ url('books/create') }}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center">
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
        <div class="text-center mt-3 mb-4">
        <a href="{{ url('/dashboard') }}">
            <button class="btn btn-danger">Sair</button>
        </a>
    </div>
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

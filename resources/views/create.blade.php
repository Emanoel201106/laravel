@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($book)) Editar @else Cadastrar @endif</h1> <hr>

    <div class="col-8 m-auto">
        @if(isset($book))
            <form id="formEdit" method="post" action="{{ url("books/$book->id") }}">
                @method('PUT')
        @else
            <form id="formCad" method="post" action="{{ url('books') }}">
        @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome:" value="{{ $book->nome ?? '' }}" required> <br>
            <select class="form-control" name="id_user" id="id_user" required>
                <option value="{{ $book->relUsers->id ?? '' }}">{{ $book->relUsers->id ?? 'Id:' }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }}</option>
                @endforeach
            </select> <br>
            <input class="form-control" type="text" name="idade" id="idade" placeholder="Idade:" value="{{ $book->idade ?? '' }}" required> <br>
            <input class="form-control" type="text" name="emprego" id="emprego" placeholder="Emprego:" value="{{ $book->emprego ?? '' }}" required> <br>
            <input class="btn btn-primary" type="submit" value="@if(isset($book)) Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection

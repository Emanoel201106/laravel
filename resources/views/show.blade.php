@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>
    @php
        $user=$book->find($book->id)->relUsers;
    @endphp
    <div class="col-8 m-auto">
       Nome: {{$book->nome}} <br>
       Idade: {{$book->idade}} <br>
       Emprego: {{$book->emprego}} <br>
    </div>
@endsection

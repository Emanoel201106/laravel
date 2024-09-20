@extends('templates.template')

@section('title', "Carrinho")
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

<div class="container">
    <div class="row">
        <h3>Carrinho de compras</h3>
        @if(session('carrinho'))
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('carrinho') as $id => $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit">Remover</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Carrinho vazio.</p>
    @endif
    </div>
</div>

@endsection

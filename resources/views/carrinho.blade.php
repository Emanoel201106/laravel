@extends('templates.template')

@section('title', "Carrinho")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="crud" href="{{route('book.index')}}"><img src="{{url('assets/img/livraria.png')}}" width="110px" height="100px"></a>
        <div>
            <form class="form-inline my-2 my-lg-0" action="/usuario" method="GET">
                <div class="pesquisa">
                <input type="search" name="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="lupa"><img src="{{url('assets/img/lupa.png')}}" width="28px" height="28px"></button>
                </div>
            </form>
        </div>
        <div>
            <ul class="navbar-nav ms-auto">
               <div class="icones">
                    <a class="menu-link" id="favorito" href="{{route('lista')}}"><div class="cabeçalho">
                        <img class="favorito" src="{{url('assets/img/icones/favorito.svg')}}" width="45px"/>
                        <li class="car">Favoritos <span>({{count((array) session('lista'))}})</span></li>
                    </div></a>
                    <a class="menu-link" id="sair" href="{{route('login.store')}}"><div class="cabeçalho">
                       <img class="logout" src="{{url('assets/img/icones/logout.png')}}" width="40px" height="42px"/>
                       <li class="car">Sair</li>
                    </div></a>
               </div>
           </ul>
       </div>
    </div>
</nav><br><br><br>
@php
$total = 0;
@endphp
@if (count((array) session('carrinho')) == 0)

<div class="vazio">
    <img src="{{url('assets/img/icones/carrinho.svg')}}" width="100px" height="100px">
    <h1>Seu carrinho está vazio!</h1>
    <h3>Que tal explorar nossos produtos em destaque?</h3>
    <a href="{{url('/usuario')}}" class="all">Todos os produtos</a>
</div>
@elseif (count((array) session('carrinho')) == 1)
<h1 class="qtd">Seu carrinho possui {{count((array) session('carrinho'))}} produto!</h1>

<div class="tabela-d"  id="t-carrinho">
<table class="tabela table-hover">
    <thead>
        <tr style="border-bottom: 2px solid #dcdcdc">
            <th style="width: 50%">Produto</th>
            <th style="width: 10%">Preço</th>
            <th style="width: 8%">Quantidade</th>
            <th style="width: 22%">Subtotal</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @if (session('carrinho'))
        @foreach (session('carrinho') as $id => $details)
        @php $total += $details['price'] * $details['quantidade'] @endphp
        <tr data-id="{{$id}}">
            <td data-th="Produto">
                <div class="book-table row">
                    <div class="col-sm-3 hidden-xs">
                        <a href="{{ route('livro', $details['slug']) }}">
                            <img src="{{asset('assets/img/livros')}}/{{$details['image']}}" width="100" height="140" alt="">
                        </a>
                    </div>

                    <div class="col-sm-9">
                        <a href="{{ route('livro', $details['slug']) }}">
                            <h4 class="font">{{ Str::limit($details['name'], 25) }}</h4>
                        </a>
                    </div>
                </div>
            </td>
            <td data-th="Price" class="font-price">R$ {{$details['price']}}</td>
            <td data-th="Quantidade">
                <input type="number" value="{{$details['quantidade']}}" class="form-control quantity cart_update" id="car-quantity" min="1">
            </td>
            <td data-th="Subtotal" class="font-price">R$ {{$details['price'] * $details['quantidade']}}</td>
            <td>
                <button class="deletar cart_remove"><i class="fa fa-remove"></i> Deletar</button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="font-price text-right"><h3><strong>Total R$ {{$total}}</strong></h3></td>
        </tr>
        <td colspan="5" class="text-right" style="border: none">
            <a href="{{url('/usuario')}}" class="continue btn btn-dander"><i class="fa fa-reply"></i> Continue comprando</a>
            <a href="" class="continue btn btn-dander" id="limpar-carrinho"><i class="fa fa-trash-o"></i> Limpar carrinho</a>
            <button class="fechar btn btn-sucess"><i class="fa fa-money"></i> Fechar compra</button>
        </td>
    </tfoot>
</table>
</div>

@else
<h1 class="qtd">Seu carrinho possui {{count((array) session('carrinho'))}} produtos!</h1>
<div class="tabela-d" id="t-carrinho2">
<table class="tabela table-hover">
    <thead>
        <tr style="border-bottom: 2px solid #dcdcdc">
            <th style="width: 50%">Produto</th>
            <th style="width: 10%">Preço</th>
            <th style="width: 8%">Quantidade</th>
            <th style="width: 22%">Subtotal</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @if (session('carrinho'))
        @foreach (session('carrinho') as $id => $details)
        @php $total += $details['price'] * $details['quantidade'] @endphp
        <tr data-id="{{$id}}">
            <td data-th="Produto">
                <div class="book-table row">
                    <div class="col-sm-3 hidden-xs">
                        <a href="{{ route('livro', $details['slug']) }}">
                            <img src="{{asset('assets/img/livros')}}/{{$details['image']}}" width="100" height="140" alt="">
                        </a>
                    </div>

                    <div class="col-sm-9">
                        <a href="{{ route('livro', $details['slug']) }}">
                            <h4 class="font">{{ Str::limit($details['name'], 25) }}</h4>
                        </a>
                    </div>
                </div>
            </td>
            <td data-th="Price" class="font-price">R$ {{$details['price']}}</td>
            <td data-th="Quantidade">
                <input type="number" value="{{$details['quantidade']}}" class="form-control quantity cart_update" id="car-quantity" min="1">
            </td>
            <td data-th="Subtotal" class="font-price">R$ {{$details['price'] * $details['quantidade']}}</td>
            <td>
                <button class="deletar cart_remove"><i class="fa fa-remove"></i> Deletar</button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="font-price text-right"><h3><strong>Total: R$ {{$total}}</strong></h3></td>
        </tr>
        <td colspan="5" class="text-right" style="border-bottom: transparent">
            <a href="{{url('/usuario')}}" class="continue btn btn-dander"><i class="fa fa-reply"></i> Continue comprando</a>
            <a href="" class="continue btn btn-dander" id="limpar-carrinho"><i class="fa fa-trash-o"></i> Limpar carrinho</a>
            <a href="{{url('/checkout')}}"><button class="fechar btn btn-sucess"><i class="fa fa-money"> Fechar compra</i></button></a>
        </td>
    </tfoot>
</table></div>
@endif
<form id="limpar" action="{{route('limpar_carrinho')}}" method="post">
    @csrf
    @method("delete")
</form>
@endsection

@section('scripts')
<script type="text/javascript">
   $(document).ready(function() {
    $(".cart_update").change(function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{route('atualizar_carrinho')}}',
            method: "PATCH",
            data: {
                _token: '{{csrf_token()}}',
                id: ele.parents("tr").attr("data-id"),
                quantidade: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".cart_remove").click(function(e) {
        e.preventDefault();

        var ele = $(this);

            $.ajax({
                url: '{{ route('remover_do_carrinho') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
    });

    $("#limpar-carrinho").click(function(e) {
        e.preventDefault();
            $("#limpar").submit();
    });
});
</script>
@endsection


@extends('templates.template')

@section('title', "Carrinho")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="crud" href="{{route('book.index')}}">Carrinho</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <a class="menu-link" id="sair" href="{{route('login.store')}}"><div class="cabeçalho">
                    <img class="c-logout" src="{{url('assets/img/icones/logout.png')}}" width="45px" height="42px"/>
                    <li class="">Sair</li>
                </div></a>
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
<table class="table table-hover" id="t-carrinho">
    <thead>
        <tr>
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
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{asset('assets/img/livros')}}/{{$details['image']}}" width="100" height="140" alt=""></div>
                    <div class="col-sm-9">
                        <h4 class="font">{{$details['name']}}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price" class="font-price">R$ {{$details['price']}}</td>
            <td data-th="Quantidade">
                <input type="number" value="{{$details['quantidade']}}" class="form-control quantity cart_update" id="car-quantity" min="1">
            </td>
            <td data-th="Subtotal" class="font-price">R$ {{$details['price'] * $details['quantidade']}}</td>
            <td>
                <button class="deletar cart_remove"><i class="fa fa-trash-o"></i> Deletar</button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="font-price text-right"><h3><strong>Total R$ {{$total}}</strong></h3></td>
        </tr>
        <td colspan="5" class="text-right">
            <a href="{{url('/usuario')}}" class="continue btn btn-dander"><i class="fa fa-arrow-left"></i> Continue comprando</a>
            <button class="fechar btn btn-sucess"><i class="fechar fa fa-money"> Fechar compra</i></button>
        </td>
    </tfoot>
</table>

@else
<h1 class="qtd">Seu carrinho possui {{count((array) session('carrinho'))}} produtos!</h1>
<table class="table table-hover" id="t-carrinho">
    <thead>
        <tr>
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
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{asset('assets/img/livros')}}/{{$details['image']}}" width="100" height="140" alt=""></div>
                    <div class="col-sm-9">
                        <h4 class="font">{{$details['name']}}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price" class="font-price">R$ {{$details['price']}}</td>
            <td data-th="Quantidade">
                <input type="number" value="{{$details['quantidade']}}" class="form-control quantity cart_update" id="car-quantity" min="1">
            </td>
            <td data-th="Subtotal" class="font-price">R$ {{$details['price'] * $details['quantidade']}}</td>
            <td>
                <button class="deletar cart_remove"><i class="fa fa-trash-o"></i> Deletar</button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="font-price text-right"><h3><strong>Total R$ {{$total}}</strong></h3></td>
        </tr>
        <td colspan="5" class="text-right">
            <a href="{{url('/usuario')}}" class="continue btn btn-dander"><i class="fa fa-arrow-left"></i> Continue comprando</a>
            <button class="fechar btn btn-sucess"><i class="fechar fa fa-money"> Fechar compra</i></button>
        </td>
    </tfoot>
</table>
@endif
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

        if (confirm("Tem certeza que quer remover esse item do carrinho?")) {
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
        }
    });
});
</script>
@endsection


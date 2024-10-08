@extends('templates.template')

@section('title', "Carrinho")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="crud" href="{{route('index')}}">Carrinho</a>
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
                <input type="number" value="{{$details['quantidade']}}" class="form-control quantity cart_update" min="1">
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


<footer class="footer" id="f-book">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Livraria 2024</div>
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


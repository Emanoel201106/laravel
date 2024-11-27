@extends('templates.template')

@section('title', "Lista de desejos")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="crud" href="{{route('usuario')}}"><img src="{{url('assets/img/livraria.png')}}" width="110px" height="100px"></a>
        <div>
            <form class="form-inline my-2 my-lg-0" action="/usuario" method="GET">
                <div class="pesquisa">
                <input type="search" name="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="lupa"><img src="{{url('assets/img/lupa.png')}}" width="28px" height="28px"></button>
                </div>
            </form>
        </div>
        <div class="icones">
             <ul class="navbar-nav ms-auto">
                <div>
                    <a class="menu-link" id="carrinho" href="{{route('carrinho')}}"><div class="cabeçalho" id="cabeçalho">
                        <img class="" src="{{url('assets/img/icones/carrinho.svg')}}" width="57px" height="45px"/>
                        <li class="car">Carrinho <span>({{count((array) session('carrinho'))}})</span></li>
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

@if (count((array) session('lista')) == 0)

<div class="vazio">
    <img src="{{url('assets/img/icones/favorito.svg')}}" width="100px" height="100px">
    <h1>Sua lista de desejos está vazia!</h1>
    <h3>Que tal explorar nossos produtos em destaque?</h3>
    <a href="{{url('/usuario')}}" class="all-lista">Todos os produtos</a>
</div>
@elseif (count((array) session('lista')) == 1)
<h1 class="qtd-lista">Sua lista de desejos possui {{count((array) session('lista'))}} produto!</h1>
@foreach (session('lista') as $lid => $favorito)
<a href="{{ route('livro', $favorito['slug']) }}">
    <div class="box-livros">
        <img class="livro" src="{{ asset('assets/img/livros/' . $favorito['image']) }}" width="200" height="300"/>
        <div class="coração">
            @php $countWishlist = 0 @endphp
            @if (Auth::check())
                @php
                    $countWishlist =
                    App\Models\Wishlist::countWishlist($favorito['id'])
                @endphp
            @endif
        <a href="" class="coração update_wishlist" data-productid="{{ $favorito['id'] }}">
            @if ($countWishlist > 0) <i class="coração fa fa-heart fa-3x"></i>
            @else
            <i class="coração fa fa-heart-o fa-3x"></i>
            @endif
        </a>
        </div>
        <p class="livro-p">{{ Str::limit($favorito['name'], 30) }}</p>
        <p class="livro-p1">{{$favorito['author']}}</p>
        <img class="stars" src="{{asset('assets/img/estrelas/' . $favorito['estrelas'])}}"/>
        <p class="avaliacoes">{{$favorito['avaliação']}}</p>
        <h3 class="preço">R$ {{$favorito['price']}}</h3>
        <p class="preço-p">R$ {{$favorito['desconto']}}</p>
        <div class="add">
            <a class="add" href="{{ route('mover-lista', $favorito['id'])}}">
                <p>Mover para o carrinho</p>
            </a>
        </div>
    </div>
</a>
@endforeach
@else
<h1 class="qtd-lista">Sua lista de desejos possui {{count((array) session('lista'))}} produtos!</h1>
@foreach (session('lista') as $lid => $favorito)
<a href="{{ route('livro', $favorito['slug']) }}">
    <div class="box-livros">
        <img class="livro" src="{{ asset('assets/img/livros/' . $favorito['image']) }}" width="200" height="300"/>
        <div class="coração">
            @php $countWishlist = 0 @endphp
            @if (Auth::check())
                @php
                    $countWishlist =
                    App\Models\Wishlist::countWishlist($favorito['id'])
                @endphp
            @endif
        <a href="" class="coração update_wishlist" data-productid="{{ $favorito['id'] }}">
            @if ($countWishlist > 0) <i class="coração fa fa-heart fa-3x"></i>
            @else
            <i class="coração fa fa-heart-o fa-3x"></i>
            @endif
        </a>
        </div>
        <p class="livro-p">{{ Str::limit($favorito['name'], 30) }}</p>
        <p class="livro-p1">{{$favorito['author']}}</p>
        <img class="stars" src="{{asset('assets/img/estrelas/' . $favorito['estrelas'])}}"/>
        <p class="avaliacoes">{{$favorito['avaliação']}}</p>
        <h3 class="preço">R$ {{$favorito['price']}}</h3>
        <p class="preço-p">R$ {{$favorito['desconto']}}</p>
        <div class="add">
            <a class="add" href="{{ route('mover-lista', $favorito['id'])}}">
                <p>Mover para o carrinho</p>
            </a>
        </div>
    </div>
</a>
@endforeach

@endif

@endsection

@section('scripts')


<script>
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function(){
        $('.update_wishlist').click(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var product_id = $(this).data('productid');
            $.ajax({
                type: 'POST',
                url: '/atualizar-lista',
                data: {
                    product_id: product_id,
                    user_id: my_id
                },
                success: function(response){
                    if(response.action == 'add') {
                        $('a[data-productid="' + product_id + '"]').html('<i class="coração fa fa-heart fa-3x"></i>');                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'green');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);

                    } else if(response.action == 'remove') {
                        $('a[data-productid="' + product_id + '"]').html('<i class="coração fa fa-heart-o fa-3x"></i>');                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'red');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);

                    }
                },
            });
        });
    });
</script>

@endsection

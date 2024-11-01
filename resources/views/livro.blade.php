@extends('templates.template')

@section('title', "Livraria")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="crud" href="">Livraria</a>
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
                <div>
                    <a class="menu-link" id="carrinho" href="{{route('carrinho')}}"><div class="cabeçalho" id="cabeçalho">
                        <img class="" src="{{url('assets/img/icones/carrinho.svg')}}" width="57px" height="45px"/>
                        <li class="car">Carrinho <span>({{count((array) session('carrinho'))}})</span></li>
                    </div></a>
                    <a class="menu-link" id="favorito" href="{{route('lista')}}"><div class="cabeçalho">
                        <img class="favorito" src="{{url('assets/img/icones/favorito.svg')}}" width="45px"/>
                        <li class="">Lista de desejos <span>({{count((array) session('lista'))}})</span></li>
                    </div></a>
                    <a class="menu-link" id="sair" href="{{route('login.store')}}"><div class="cabeçalho">
                        <img class="logout" src="{{url('assets/img/icones/logout.png')}}" width="45px" height="42px"/>
                        <li class="">Sair</li>
                    </div></a>
                </div>
            </ul>
        </div>
    </div>
</nav><br><br><br>

        <div class="livros">
            <div class="capa">
                <div>
                    <img src="{{ asset('assets/img/livros/' . $produto->image) }}" width="245px" height="360px">
                </div>
                <div class="coração-l">
                    @php $countWishlist = 0 @endphp
                    @if (Auth::check())
                        @php
                            $countWishlist =
                            App\Models\Wishlist::countWishlist($produto['id'])
                        @endphp
                    @endif
                <a href="" class="coração update_wishlist" data-productid="{{ $produto->id }}">
                    @if ($countWishlist > 0) <i class="coração-1 fa fa-heart fa-3x"></i>
                    @else
                    <i class="coração-1 fa fa-heart-o fa-3x"></i>
                    @endif
                </a>
                </div>
            </div>
            <div class="descricao">
                <h2>{{ $produto->name }}</h2>
                <p>por <a href="/usuario?search={{ $produto->author }}">{{ $produto->author }}</a> (Autor), <a href="/usuario?search={{ $produto->editora }}">{{ $produto->editora }}</a> (Editora)</p>
                <img src="{{asset('assets/img/estrelas/' . $produto->estrelas)}}" class="stars">
                <p class="avaliacoes">{{$produto->avaliação}}</p>
                <hr>
                <p class="descriçao">{{ $produto->descrição }}</p>
                <hr>

                @if ($produto->idade < 10)
                <div class="detalhe">
                    <img src="{{url('assets/img/icones/kid.png')}}">
                    <h6>Classificação indicativa</h6>
                    <p>Livre para todos</p>
                </div>
                @elseif ($produto->idade >= 10 && $produto->idade <= 12)
                <div class="detalhe">
                    <img src="{{url('assets/img/icones/kid.png')}}">
                    <h6>Classificação indicativa</h6>
                    <p>Maiores de {{ $produto->idade }}</p>
                </div>
                @else
                <div class="detalhe">
                    <img src="{{url('assets/img/icones/adult.png')}}" width="43px" height="38px">
                    <h6>Classificação indicativa</h6>
                    <p>Maiores de {{ $produto->idade }}</p>
                </div>
                @endif

                <div class="detalhe">
                    <img src="{{url('assets/img/icones/page.png')}}" width="40px" height="40px">
                    <h6>Páginas</h6>
                    <p>{{ $produto->pagina }} páginas</p>
                </div>
                <div class="detalhe">
                    <img src="{{url('assets/img/icones/editora.png')}}" width="40px" height="40px">
                    <h6>Editora</h6>
                    <p>{{ $produto->editora }}</p>
                </div>
                <div class="detalhe">
                    <img src="{{url('assets/img/icones/date.png')}}" width="40px" height="40px">
                    <h6>Ano de publicação</h6>
                    <p>{{ $produto->ano }}</p>
                </div>
                <div class="detalhe">
                    <img src="{{url('assets/img/icones/idioma.png')}}" width="45px" height="45px">
                    <h6>Idioma</h6>
                    <p>Português</p>
                </div>
                <div class="detalhe">
                    <img src="{{url('assets/img/icones/dimension.png')}}" width="40px" height="40px">
                    <h6>Dimensão</h6>
                    <p>{{ $produto->dimensao }}</p>
                </div>

            </div>
            <div class="compra">
                <div class="price">
                    <h3 class="preço" style="margin-bottom: 0px">R$ {{$produto->price}}</h3>
                    <p class="preço-p" style="margin-bottom: 0px">R$ {{$produto->desconto}}</p>
                </div>
                <hr>
                <div>
                    <h5>Em estoque</h5>
                </div>
                <a class="add-l" href="{{ route('adicionar-ao-carrinho', $produto->id) }}">
                    <div class="add-l">
                        <p>Adicionar ao carrinho</p>
                    </div>
                </a>

                <a class="comprar" href="">
                    <div class="comprar">
                        <p>Comprar agora</p>
                    </div>
                </a>
                <hr>
                <div class="garantia">
                    <img src="{{url('assets/img/icones/devolver.png')}}" width="28px" height="29px" style="margin: 0px 4px 0px 4px">
                    <h6>Devolução em até 7 dias</h6><br>
                    <img src="{{url('assets/img/icones/entrega.png')}}" width="40px" height="40px" style="margin-bottom: 10px;">
                    <h6>Entrega rápida e garantida</h6>
                    <p>Receba o produto que está esperando ou devolvemos o dinheiro.</p>
                </div>
            </div>
        </div>

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

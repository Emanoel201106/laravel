@extends('templates.template')

@section('title', "Livraria")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="crud" href="">Livraria</a>
                <div>
                    <form class="form-inline my-2 my-lg-0" action="/usuario" method="GET">
                        <input class="pesquisa" type="search" name="search" placeholder="Pesquisar" aria-label="Pesquisar">
                      </form>
                </div>
                <div>
                     <ul class="navbar-nav ms-auto">
                        <div>
                            <a class="menu-link" id="carrinho" href="{{route('carrinho')}}"><div class="cabeçalho" id="cabeçalho">
                                <img class="" src="{{url('assets/img/icones/carrinho.svg')}}" width="57px" height="45px"/>
                                <li class="car">Carrinho <span>({{count((array) session('carrinho'))}})</span></li>
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
        @if ($search)
        <div class="filtro">
            <h1 class="livraria-titles">Filtro</h1>
            <form class="filter" action="/usuario" method="GET">
                <div class="d-categoria">
                    <h3 class="filtro-titulo">Preço</h3>
                    <div class="mb-3">
                        <label class="minmax" for="min">Mínimo:</label>
                        <input class="min-max" id="min" type="number" placeholder="R$ 0.00" name="min" min="0">
                    </div>
                    <div>
                        <label class="minmax" for="min">Máximo:</label>
                        <input class="min-max" type="number" placeholder="R$ 200.00" name="max" max="200">
                    </div>
                </div>
                <br><button class="apply" type="submit">Aplicar</button>
            </form>
        </div>

        <h1 id="promo" class="livraria-titles">Buscando por: {{$search}}</h1>
        @else
        @if (session('sucess'))
            <div class="sucesso">
            {{session('sucess')}}
            </div>
        @endif

        <h1 class="livraria-titles">Categorias</h1>
        <div>
            @foreach ($categoria as $category)
            <div class="d-categoria">
                <a href="?search={{$category->name}}"><img class="categoria" src="{{ asset('assets/img/categoria/' . $category->categoria) }}"/></a><br>
                <p class="categoria-p">{{$category->name}}</p>
                </div>
            @endforeach
        </div>

        <div class="filtro">
            <h1 class="livraria-titles">Filtro</h1>
            <form class="filter" action="{{ route('usuario') }}" method="GET">
                <div class="d-filter">
                    <h3 class="filtro-titulo">Preço</h3>
                    <div class="d-filtro">
                        <label class="minmax" for="min">Mínimo:</label>
                        <input class="min-max" id="min" type="number" placeholder="R$ 0.00" name="min" value="{{ request('min') }}">
                    </div>
                    <div class="d-filtro">
                        <label class="minmax" for="min">Máximo:</label>
                        <input class="min-max" type="number" placeholder="R$ 200.00" name="max" value="{{ request('max') }}">
                    </div>
                </div>
                <div class="d-filter" id="ano">
                    <h3 class="filtro-titulo">Ano de publicação</h3>
                    <div class="d-filtro">
                        <label class="minmax" for="minimo">Mínimo:</label>
                        <input class="min-max" id="min" type="number" placeholder="1900" name="minimo" value="{{ request('minimo') }}">
                    </div>
                    <div class="d-filtro">
                        <label class="minmax" for="minimo">Máximo:</label>
                        <input class="min-max" type="number" placeholder="2024" name="maximo" value="{{ request('maximo') }}">
                    </div>
                </div>
                <div class="d-filter" id="avaliacao">
                    <h3 class="filtro-titulo">Classificação</h3>
                    <div>
                        @foreach ($stars as $star)
                        @php
                            $checked = request('stars', []);
                            if(isset($_GET['stars']))
                        @endphp
                            <input type="checkbox" name="stars[]" value="{{ $star->stars }}" id="star_{{ $star->id }}" @if(in_array($star->stars, $checked)) checked @endif>
                            <label for="star_{{ $star->id }}">
                                <img class="estrela" src="{{ asset('assets/img/estrelas/' . $star->stars) }}" alt="Estrela de classificação" checked>
                            </label>
                        @endforeach

                    </div>
                </div>

                <br><button class="apply" type="submit">Aplicar</button>
            </form>
        </div>


        <h1 id="promo" class="livraria-titles">Livros mais vendidos</h1>
        @endif
        @foreach($produto as $item)
        <div class="box-livros">
            <img class="livro" src="{{ asset('assets/img/livros/' . $item->image) }}" width="200" height="300"/>
            <p class="livro-p">{{$item->name}}</p>
            <p class="livro-p1">{{$item->author}}</p>
            <img class="stars" src="{{asset('assets/img/estrelas/' . $item->estrelas)}}"/>
            <p class="avaliacoes">{{$item->avaliação}}</p>
            <h3 class="preço">R$ {{$item->price}}</h3>
            <p class="preço-p">R$ {{$item->desconto}}</p>
            <div class="add">
                <a class="add" href="{{ route('adicionar-ao-carrinho', $item->id) }}">
                    <p>Adicionar ao carrinho</p>
                </a>
            </div>
        </div>
        @endforeach
        @if (count($produto) == 0 && $search)
            <h5 class="nao-encontrado">Não foi possível encontrar nenhum livro com {{$search}}! <a class="veja" href="/usuario">Veja as opções disponíveis</a></h5>
        @endif
        @if (count($produto) > 0 && $search)
            <br><h6 class="encontrado" ><a class="veja" href="/usuario">Veja todas as opções disponíveis</a></h6>
        @endif

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

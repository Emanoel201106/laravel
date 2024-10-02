@extends('templates.template')

@section('title', "Livraria")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="crud" href="">Livraria</a>
                <div>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="pesquisa" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                      </form>
                </div>
                <div>
                     <ul class="navbar-nav ms-auto">
                        <div>
                            <a class="menu-link" id="carrinho" href="{{route('carrinho')}}"><div class="cabeçalho" id="cabeçalho">
                                <img class="" src="{{url('assets/img/icones/carrinho.svg')}}"/>
                                <li class="car">Carrinho <span>({{count((array) session('carrinho'))}})</span></li>
                            </div></a>
                            <a class="menu-link" id="sair" href="{{route('login.store')}}"><div class="cabeçalho">
                                <img class="logout" src="{{url('assets/img/icones/logout.png')}}"/>
                                <li class="">Sair</li>
                            </div></a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>

        @if (session('sucess'))
            <div class="sucesso">
            {{session('sucess')}}
            </div>
        @endif

        <h1 class="livraria-titles">Categorias</h1>
        <div>
            <div class="d-categoria">
                <a href=""><img class="categoria" id="romance" src="{{url('assets/img/categoria/categoria1.svg')}}"/></a><br>
                <p class="categoria-p">Romance</p>
            </div>
            <div class="d-categoria">
                <a href=""><img class="categoria" id="terror" src="{{url('assets/img/categoria/categoria2.svg')}}"/></a><br>
                <p class="categoria-p">Terror</p>
            </div>
            <div class="d-categoria">
                <a href=""><img class="categoria" id="fantasia" src="{{url('assets/img/categoria/categoria3.svg')}}"/></a><br>
                <p class="categoria-p">Fantasia</p>
            </div>
            <div class="d-categoria">
                <a href=""><img class="categoria" id="aventura" src="{{url('assets/img/categoria/categoria4.svg')}}"/></a><br>
                <p class="categoria-p">Aventura</p>
            </div>
            <div class="d-categoria">
                <a href=""><img class="categoria" id="infantil" src="{{url('assets/img/categoria/categoria5.svg')}}"/></a><br>
                <p class="categoria-p">Infantil</p>
            </div>
            <div class="d-categoria">
                <a href=""><img class="categoria" id="hq" src="{{url('assets/img/categoria/categoria6.svg')}}"/></a><br>
                <p class="categoria-p">HQ</p>
            </div>
            <div class="d-categoria">
                <a href=""><img class="categoria" id="drama" src="{{url('assets/img/categoria/categoria7.svg')}}"/></a><br>
                <p class="categoria-p">Drama</p>
            </div>
            <div class="d-categoria">
                <a href=""><img class="categoria" id="nacional" src="{{url('assets/img/categoria/categoria8.svg')}}"/></a><br>
                <p class="categoria-p">Nacional</p>
            </div>
        </div>

        <h1 id="promo" class="livraria-titles">Livros mais vendidos</h1>
        @foreach($produto as $item)
        <div class="box-livros">
            <img class="livro" src="{{ asset('assets/img/livros/' . $item->image) }}" width="200" height="300"/>
            <p class="livro-p">{{$item->name}}</p>
            <p class="livro-p1">{{$item->author}}</p>
            <img class="stars" src="{{url('assets/img/stars.png')}}"/>
            <p class="avaliacoes">(3293 avaliações)</p>
            <h3 class="preço">R$ {{$item->price}}</h3>
            <p class="preço-p">R$ {{$item->desconto}}</p>
            <div class="add">
                <a class="add" href="{{ route('adicionar-ao-carrinho', $item->id) }}">
                    <p>Adicionar ao carrinho</p>
                </a>
            </div>
        </div>
        @endforeach

        <footer class="footer" id="f-book">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Livraria 2024</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                    <a id="logo" class="btn btn-social mx-2" href="https://web.whatsapp.com/" aria-label="Whatsapp"><img class="logo" src="{{url('assets/img/logo1.png')}}"/></a>
                    <a id="logo" class="btn btn-social mx-2" href="https://www.instagram.com/" aria-label="Instagram"><img class="logo" src="{{url('assets/img/logo2.png')}}"/></a>
                    <a id="logo" class="btn btn-social mx-2" href="https://github.com/" aria-label="GitHub"><img class="logo3" src="{{url('assets/img/logo3.png')}}"/></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="">Política de Privacidade</a>
                        <a class="link-dark text-decoration-none" href="">Termos de Uso</a>
                    </div>
                </div>
            </div>
        </footer>
@endsection

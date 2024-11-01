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



@endsection

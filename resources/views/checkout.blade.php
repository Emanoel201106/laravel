@extends('templates.template')

@section('title', "Livraria")
@section('content')
<nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="crud" href=""><img src="{{url('assets/img/livraria.png')}}" width="110px" height="100px"></a>
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
        <h1 class="espaço">A</h1>
    <div>
        <h1 class="livraria-titles">Pagamento</h1>
        <div class="checkout">
            <form action="">
                <div class="informacao">
                    <h3>Suas Informações</h3>
                    <label for="">Nome Completo</label><br>
                    <input class="min-max" type="text"><br>
                    <label for="">País de origem</label><br>
                    <select name="pais" id="pais">
                        <option value="">Selecione o país</option>
                        <option value="Brasil">Brasil</option>
                    </select><br>
                    <label for="">Endereço</label><br>
                    <input class="min-max" type="text"><br>
                    <label for="">Detalhamento</label><br>
                    <input class="min-max" type="text" placeholder="Opcional"><br>
                    <label for="">Cidade</label><br>
                    <input class="min-max" type="text"><br>
                    <label for="">CEP</label><br>
                    <input class="min-max" type="text" placeholder="00000-000"><br>
                    <label for="">Estado</label><br>
                    <select name="estado" id="estado">
                        <option value="">Selecione o estado</option>
                        <option value="Acre">Acre</option><option value="Alagoas">Alagoas</option><option value="Amapá">Amapá</option>
                        <option value="Amazonas">Amazonas</option><option value="Bahia">Bahia</option><option value="Ceará">Ceará</option>
                        <option value="Espírito Santo">Espírito Santo</option><option value="Goiás">Goiás</option>
                        <option value="Maranhão">Maranhão</option><option value="Mato Grosso">Mato Grosso</option><option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                        <option value="Minas Gerais">Minas Gerais</option><option value="Pará">Pará</option><option value="Paraíba">Paraíba</option>
                        <option value="Paraná">Paraná</option><option value="Pernambuco">Pernambuco</option><option value="Piauí">Piauí</option>
                        <option value="Rio de Janeiro">Rio de Janeiro</option><option value="Rio Grande do Norte">Rio Grande do Norte</option><option value="Rio Grande do Sul">Rio Grande do Sul</option>
                        <option value="Rondônia">Rondônia</option><option value="Roraima">Roraima</option><option value="Santa Catarina">Santa Catarina</option>
                        <option value="São Paulo">São Paulo</option><option value="Sergipe">Sergipe</option><option value="Tocantins">Tocantins</option>
                    </select><br>
                    <label for="">Telefone</label><br>
                    <input class="min-max" type="text" placeholder="(00) 0 0000-0000"><br>
                    <label for="">Email</label><br>
                    <input class="min-max" type="email">
                </div>
                <div class="pagar">
                    <h3>Seu pedido</h3>
                    <table>

                    </table>
                    <h3>Forma de Pagamento</h3>
                    <input type="radio" name="pagamento" value="Pix"><label for="">Pix</label> <br>
                    <input type="radio" name="pagamento" value="Boleto"><label for="">Boleto</label> <br>
                    <hr><button style="border: none">Adicionar um cartão de crédito</button><hr>
                    <button>Concluir compra</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@extends('templates.template')

@section('title', "Livraria")
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
        @php
            $total = 0;
        @endphp
    <div>
        @if(session('carrinho') && count(session('carrinho')) > 0)
        <h1 class="livraria-titles">Pagamento</h1>
        <div class="checkout">
            <form action="">
                <div class="check">
                    <h3 style="font-family: 'Alegreya SC', serif;">Suas Informações</h3>
                    <div class="informacao">
                        <label for="">Endereço *</label><br>
                        <input class="min-max" type="text" placeholder="Número da casa/apartamento e nome da rua" required><br>
                        <label for="">Detalhamento</label><br>
                        <input class="min-max" type="text" placeholder="Ex: Apartamento, casa (opcional)"><br>
                        <div class="lado">
                            <label for="">CEP *</label><br>
                            <input class="min-max" type="text" placeholder="00000-000" required><br>
                        </div>
                        <div class="lado">
                            <label for="">Telefone *</label><br>
                            <input class="min-max" type="text" placeholder="(00) 0 0000-0000" required><br>
                        </div><br>
                        <div class="lado">
                            <label for="">Cidade *</label><br>
                            <input class="min-max" type="text" required><br>
                        </div>
                        <div class="lado">
                            <label for="">Estado *</label><br>
                            <select name="estado" id="estado" required>
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
                            </select>
                        </div>
                        <div>
                            <label for="">Notas do pedido</label><br>
                            <textarea name="" id="" rows="5" maxlength="500" placeholder="Deseja informar algum detalhe sobre seu pedido? (opcional)"></textarea>
                        </div><br>
                    </div>
                </div>
                <div class="pagar">
                    <h3 style="font-family: 'Alegreya SC', serif">Seu pedido</h3>
                    <div class="preços-t">
                        <table>
                            <thead>
                                <tr style="border-left-width: 0px">
                                    <th style="border-top-left-radius: 20px; border-left-width: 0px">Produto</th>
                                    <th style="border-top-right-radius: 20px">Total</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach (session('carrinho') as $id => $details)
                                @php $total += $details['price'] * $details['quantidade'] @endphp

                                <tr style="background-color: gray; border-left-width: 0px">
                                    <td class="t-item" id="item" style="border-left-width: 0px"><a href="{{ route('livro', $details['slug']) }}">{{ Str::limit($details['name'], 23) }}</a></td>
                                    <td class="t-item">R$ {{$details['price'] * $details['quantidade']}}</td>
                                </tr>
                                @endforeach
                                <tr style="border-left-width: 0px">
                                    <td style="border-left-width: 0px">Subtotal</td>
                                    <td class="t-pagar">R$ {{$total}}</td>
                                </tr>
                                <tr style="border-left-width: 0px">
                                    <td style="border-left-width: 0px">Frete:</td>
                                    <td class="t-pagar">R$ 00.00</td>
                                </tr>
                                <tr style="border-bottom: none; border-left-width: 0px">
                                    <td style="border-bottom-left-radius: 20px; border-bottom: none; border-left: none">Total:</td>
                                    <td class="t-pagar" style="border-bottom-right-radius: 20px; border-bottom: none">R$ {{$total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 style="font-family: 'Alegreya SC', serif; margin-top: 10px">Forma de Pagamento</h3>
                    <div class="botoes">
                        <div class="opcao">
                            <input type="radio" name="pagamento" class="radio">
                            <label for="pix">Pix</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" name="pagamento" class="radio">
                            <label for="boleto">Boleto</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" name="pagamento" class="radio">
                            <label for="dinheiro">Dinheiro na Entrega</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" name="pagamento" class="radio">
                            <label for="cartão">Cartão de Crédito</label>
                        </div>
                    </div>

                    @if (count((array) session('carrinho')) == 1)
                    <button class="concluir-1" type="submit" id="compra-concluida">Concluir compra</button>
                    @elseif (count((array) session('carrinho')) == 2)
                    <button class="concluir-2" type="submit" id="compra-concluida">Concluir compra</button>
                    @elseif(count((array) session('carrinho')) >= 3)
                    <button class="concluir-3" type="submit" id="compra-concluida">Concluir compra</button>
                    @endif
                </div>

            </form>
        </div>
        @else
            <div class="vazio-2">
                <img src="{{url('assets/img/icones/pessoa&car.png')}}" width="150px" height="150px">
                <h1>Compra concluída!</h1>
                <h3>Que tal já adquirir outra compra?</h3>
                <a href="{{url('/usuario')}}" class="all-checkout">Todos os produtos</a>
            </div>
        @endif
    </div>
    <form id="concluir" action="{{route('compra-concluida')}}" method="post">
        @csrf
        @method("delete")
    </form>

@endsection

@section('scripts')
<script type="text/javascript">
   $(document).ready(function() {
    $("#compra-concluida").click(function(e) {
        e.preventDefault();
        $("#concluir").submit();
    });
});
</script>
@endsection



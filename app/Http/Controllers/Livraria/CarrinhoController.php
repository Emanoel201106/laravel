<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;



class CarrinhoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $produto = session()->get('carrinho', []);
        return view('carrinho', compact('produto'));
    }
    public function add(Request $request, $id)
    {
        $produto = Produto::find($id);

        $produto = session()->get('carinho', []);
        $produto[$id] = [
            "name" => $produto->name,
            "qtd" => isset($produto[$id]) ? $produto[$id]['qtd'] + 1 : 1,
            "price" => $produto->price,
            "image" => $produto->image
        ];
        session()->put('carrinho', $produto);
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function remove(Request $request, $id)
    {
        $produto = session()->get('carrinho');
        if (isset($produto[$id])) {
            unset($produto[$id]);
            session()->put('carrinho', $produto);
        }
        return redirect()->back()->with('success', 'Produto removido do carrinho!');
    }

    public function view()
    {
        $produto = session()->get('carrinho');
        return view('carrinho', compact('carrinho'));
    }
}

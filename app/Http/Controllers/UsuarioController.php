<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class UsuarioController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $produto = Produto::all();

        return view('usuario', compact('produto'));
    }

    public function carrinho(){
        return view('carrinho');
    }

    public function adicionar($id){
        $produto = Produto::findOrFail($id);

        $carrinho = session()->get('carrinho', []);

        if(isset($carrinho[$id])){
            $carrinho[$id]['quantidade']++;
        }else{
            $carrinho[$id] = [
                "name" => $produto->name,
                "image" => $produto->image,
                "price" => $produto->price,
                "quantidade" => 1
            ];
        }
        session()->put('carrinho', $carrinho);
        return redirect()->back()->with('sucess', 'Produto adicionado ao carrinho!');
    }

    public function atualizar(Request $request){
        if($request->id && $request->quantidade){
            $carrinho = session()->get('carrinho');
            $carrinho[$request->id]["quantidade"] = $request->quantidade;
            session()->put('carrinho', $carrinho);
            session()->flash('success','Carrinho atualizado com sucesso!');
        }
    }

    public function remover(Request $request){
        if($request->id){
            $carrinho = session()->get('carrinho');
            if(isset($carrinho[$request->id])){
                unset($carrinho[$request->id]);
                session()->put('carrinho', $carrinho);
            }
            session()->flash('success','Produto removido com sucesso!');
        }
    }
}


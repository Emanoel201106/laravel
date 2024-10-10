<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\categoria;
use App\Models\stars;

class UsuarioController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $search = request('search');

        $query = Produto::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
              ->orWhere('categoria', 'like', '%' . $search . '%')
              ->orWhere('author', 'like', '%' . $search . '%');
        }else{
            $produto = Produto::all();
        }

        if(isset($request->min) && $request->min != null){
            $query->where('price', '>=', $request->min);
        }

        if(isset($request->max) && $request->max != null){
            $query->where('price', '<=', $request->max);
        }

        if(isset($request->minimo) && $request->minimo != null){
            $query->where('ano', '>=', $request->minimo);
        }

        if(isset($request->maximo) && $request->maximo != null){
            $query->where('ano', '<=', $request->maximo);
        }

        if ($request->has('stars')) {
            $stars = $request->input('stars');
            $query->whereIn('estrelas', $stars);
        }

        $produto = $query->get();

        return view('usuario', ['produto' => $produto, 'search' => $search, 'categoria' => Categoria::all(), 'stars' => stars::all()]);
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


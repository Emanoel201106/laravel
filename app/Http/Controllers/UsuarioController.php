<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\categoria;
use App\Models\stars;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;


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
                  ->orWhere('author', 'like', '%' . $search . '%')
                  ->orWhere('editora', 'like', '%' . $search . '%');
        }else{
            $produto = Produto::all();
        }

        if ($request->filled('min')) {
            $query->where('price', '>=', $request->min);
        }
        if ($request->filled('max')) {
            $query->where('price', '<=', $request->max);
        }
        if ($request->filled('minimo')) {
            $query->where('ano', '>=', $request->minimo);
        }
        if ($request->filled('maximo')) {
            $query->where('ano', '<=', $request->maximo);
        }
        if ($request->filled('menor')) {
            $query->where('porcentagem', '>=', $request->menor);
        }
        if ($request->filled('maior')) {
            $query->where('porcentagem', '<=', $request->maior);
        }
        if ($request->has('stars')) {
            $query->whereIn('estrelas', $request->input('stars'));
        }
        if ($request->filled('editora')) {
            $query->where('editora', $request->input('editora'));
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
                "slug" => $produto->slug,
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
            session()->flash('success','Produto removido do carrinho com sucesso!');
        }
    }

    public function limpar(Request $request){
        $request->session()->forget('carrinho');
        return redirect()->route('carrinho');
    }

    public function details($slug){
        $produto = Produto::where('slug', $slug)->firstOrFail();

        return view('livro', compact('produto'));
    }

    public function lista(){
        return view('lista');
    }

    public function updatelista(Request $request){
        if($request->ajax()){
            $data = $request->all();
            $countWishlist = Wishlist::countWishlist($data['product_id']);

            $wishlist = new Wishlist;
            if($countWishlist == 0){
                $wishlist->product_id = $data['product_id'];
                $wishlist->user_id = $data['user_id'];
                $wishlist->save();

                $produto = Produto::findOrFail($data['product_id']);
                $lista = session()->get('lista', []);

                $lista[$data['product_id']] = [
                    "id" => $produto->id,
                    "name" => $produto->name,
                    "image" => $produto->image,
                    "price" => $produto->price,
                    "author" => $produto->author,
                    "estrelas" => $produto->estrelas,
                    "avaliação" => $produto->avaliação,
                    "desconto" => $produto->desconto,
                    "slug" => $produto->slug,
                    "quantidade" => 1
                ];
                session()->put('lista', $lista);

                return response()->json(['action' => 'add', 'message' => 'Produto adicionado à lista de desejos!']);
            } else {
                Wishlist::where(['user_id' => Auth::user()->id, 'product_id' => $data['product_id']])->delete();
                $lista = session()->get('lista');

                if(isset($lista[$data['product_id']])) {
                    unset($lista[$data['product_id']]);
                    session()->put('lista', $lista);
                }

                return response()->json(['action' => 'remove', 'message' => 'Produto removido da lista de desejos!']);
            }
        }
    }

    public function moverlista($id){
        $produto = Produto::findOrFail($id);

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
        }else {
            $carrinho[$id] = [
                "name" => $produto->name,
                "image" => $produto->image,
                "price" => $produto->price,
                "slug" => $produto->slug,
                "quantidade" => 1
            ];
        }

        session()->put('carrinho', $carrinho);

        $lista = session()->get('lista', []);

        if(isset($lista[$id])){
            unset($lista[$id]);
            session()->put('lista', $lista);
        }

        return redirect()->route('lista');
    }

    public function checkout(){
        return view('checkout');
    }
}


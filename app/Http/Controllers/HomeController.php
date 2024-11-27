<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\categoria;
use App\Models\stars;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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

        return view('home', ['produto' => $produto, 'search' => $search, 'categoria' => Categoria::all(), 'stars' => stars::all()]);
    }
}

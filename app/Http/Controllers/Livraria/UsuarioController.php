<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class UsuarioController extends Controller
{
    public function index()
    {
        $produto = Produto::all();
        return view('usuario', compact('produto'));
    }
}

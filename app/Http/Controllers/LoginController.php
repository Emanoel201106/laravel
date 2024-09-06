<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ],[
            'email.required'=> 'Esse campo de email é obrigatório!',
            'email.email'=> 'Email inválido!',
            'password.required'=> 'Esse campo de senha é obrigatório!',
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        //$user->password = Hash::make($credentials['password']);
            //$user->save();

        if($user && Hash::check($credentials['password'], $user->password)){
            Auth::login($user);
            return redirect()->intended('/book');
        } else {
            return redirect()->back()->withErrors([
                'email' =>'Email ou senha inválido!'
            ]);
        }
    }
}

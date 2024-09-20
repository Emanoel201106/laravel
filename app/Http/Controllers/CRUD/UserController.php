<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    private $objUser;

    public function __construct(User $user)
    {
        $this->objUser = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=$this->objUser->all();
        return view('index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->objUser->all();
        return view('create', compact('users'));
        return redirect('/book');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $cad=$this->objUser->create([
            $user->name = $request->name,
            $user->email = $request->email,
            $user->idade = $request->idade,
            $user->emprego = $request->emprego,
            $user->password = bcrypt($request->password),
            'admin' => $request->has('admin'),
            'user' => $request->has('user'),
        ]);
        if($cad){
            return redirect('/book');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=$this->objUser->find($id);
        return view('show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->objUser->findOrFail($id);
        return view('create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = $this->objUser->findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'admin' => $request->has('admin'),
            'user' => $request->has('user'),
            'idade' => $request->idade,
            'emprego' => $request->emprego,
        ]);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=$this->objUser->findOrFail($id)->delete();
        return redirect('/book');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Models\ModelUsers;
use App\Models\User;

class UserController extends Controller
{
    private $objUser;
    private $objBook;

    public function __construct()
    {
        $this->objUser=new User();
        $this->objBook=new ModelUsers();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book=$this->objBook->all();
        return view('index',compact('book'));
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
        $cad=$this->objBook->create([
            'nome'=>$request->nome,
            'idade'=>$request->idade,
            'emprego'=>$request->emprego,
            'id_user'=>$request->id_user
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
        $book=$this->objBook->find($id);
        return view('show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book=$this->objBook->find($id);
        $users=$this->objUser->all();
        return view('create',compact('book','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $this->objBook->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'idade'=>$request->idade,
            'emprego'=>$request->emprego,
            'id_user'=>$request->id_user
        ]);
        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book=$this->objBook->findOrFail($id)->delete();
        return redirect('/book');
    }
}

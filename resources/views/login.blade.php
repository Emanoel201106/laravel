@extends('templates.template')

@section('content')
<div class="text-center mt-3 mb-4">
<a href="/">
    <button class="btn btn-dark">Home</button>
</a>
</div>


<h2 class="text-center">Login</h2>

@if(session()->has('success'))
    {{session()->get('sucess')}}
@endif
@error('error')
    <span>{{$message}}</span>
    @enderror

<form class="text-center" action="{{route('login.store')}}" method="post">
    @csrf
    <input type="text" name="email" placeholder="Email" value="lais@gmail.com">
    @error('email')
    <span>{{$message}}</span>
    @enderror <br><br>
    <input type="password" name="password" placeholder="Senha" value="edf">
    @error('password')
    <span>{{$message}}</span>
    @enderror <br><br>
    <button class="btn btn-primary" type="submit">Login</button>
</form>
@endsection

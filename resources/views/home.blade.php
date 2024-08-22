@extends('templates.template')

@section('content')
<h2 class="text-center">Home</h2>

<div class="text-center mt-3 mb-4">
<a href="{{route('login.store')}}">
    <button class="btn btn-dark">Login</button>
</a>
</div>
@endsection

@extends('layouts.app')
@section('content')

<div class="col-8 offset-2">
   <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
    <br>
    {{-- <a href="{{ route('admin.index')}}">В админку</a> 
    <a href="{{ route('account')}}">В админку</a>--}}
    @if(Auth::user()->is_admin == true)
        <a href="{{ route('admin.admin')}}">В админку</a> 
    @endif
</div>


@endsection('content')
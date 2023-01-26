@extends('layouts.form')

@section('title', 'Обратная связь')

@section('content')

<div>
    <h4>Отправить сообщение</h4>
    <hr>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="POST" action="{{route('mail.store')}}">
        @csrf
        <div class="form-group">
            <label for="username">Ваше имя</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ old('username')}}">
        </div>
        <div class="form-group">
            <label for="comment">Ваш комментарий</label>
            <textarea class="form-control" name="comment" id="comment">{{ old('comment')}}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>

    </form>

</div>

@endsection
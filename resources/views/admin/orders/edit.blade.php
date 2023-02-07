тут редактируем заявку
@extends('layouts.form')

@section('title', 'Заказ данных')

@section('content')

<div>
    <h4>Заказать выгрузку данных</h4>
    <hr>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>                       
        @endforeach
    @endif
<form method="POST" action="{{route('order.store', ['order' => $order])}}">
    @method('put')
    @csrf
    <div class="form-group">Пользователь</label>
        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $order->username }}">
    </div>
    <div class="form-group">
        <label for="userphone">Телефон</label>
        <input type="text" id="userphone" name="userphone" class="form-control @error('userphone') is-invalid @enderror" value="{{ $order->userphone }}">
    </div>
    <div class="form-group">
        <label for="useremail">E-mail</label>
        <input type="text" id="useremail" name="useremail" class="form-control @error('usermail') is-invalid @enderror" value="{{ $order->useremail }}">
    </div>
    <div class="form-group">
        <label for="orderinfo">Что выгрузить?</label>
        <textarea class="form-control @error('orderinfo') is-invalid @enderror" name="orderinfo" id="orderinfo">{{ $order->orderinfo}}</textarea>
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
          @foreach($statuses as $status)
          <option @if($order->status === $status) selected @endif>{{ $status }}</option>
          @endforeach
        </select>
      </div>
    <br>
    <button type="submit" class="btn btn-success">Сохранить</button>

</form>

</div>

@endsection('content')


@extends('layouts.admin')

@section('title', 'Админка сообщений')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Админ. панель Сообщений пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary">Share</button>
        <button class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Пользователь</th>
          <th>Комментарий</th>
          <th>Дата добавления</th>
          <th>Дата изменения</th>
          <th>Статус</th>
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($mailsList as $mail)
        <tr>
          <td>{{ $mail->id }}</td>
          <td>{{ $mail->username }}</td>
          <td>{{ $mail->comment }}</td>
          <td>{{ $mail->created_at }}</td>
          <td>{{ $mail->updated_at }}</td>
          <td>{{ $mail->status }}</td>
          <td><a href="{{route('admin.mails.show', $mail->id)}}">См.</a> &nbsp; <a href="{{route('admin.mails.edit', $mail->id)}}">Изм.</a> &nbsp; <a href="" style=" color: red;">Уд.</a></td>
        </tr>            
        @empty
        <tr>
          <td colspan="7">Записей нет</td>
        </tr>            
        @endforelse
      </tbody>

    </table>

  </div>

@endsection


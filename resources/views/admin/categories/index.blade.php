@extends('layouts.admin')

@section('title', 'Админка Категорий новостей')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Админ. панель Категорий новостей</h1>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.categories.create')}}">Добавить Категорию новостей</a>
    </div>
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
          <th>Заголовок</th>
          <th>Слаг</th>          
          <th>Описание</th>
          <th>Дата добавления</th>
          <th>Дата изменения</th>
          <th>Статус</th>
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categoriesList as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->title }}</td>
          <td>{{ $category->slug }}</td>          
          <td>{{ $category->description }}</td>
          <td>{{ $category->created_at }}</td>
          <td>{{ $category->updated_at }}</td>
          <td>{{ $category->status }}</td>
          <td><a href="{{route('admin.categories.edit', $category->id)}}">Изм.</a> &nbsp; <a href="" style=" color: red;">Уд.</a></td>
        </tr>            
        @empty
        <tr>
          <td colspan="7">Записей нет</td>
        </tr>            
        @endforelse
      </tbody>

    </table>

    {{ $categoriesList->links() }}
    {{-- <x-alert type="info" message="Это информационное сообщение"></x-alert>
    <x-alert type="danger" message="Это информационное сообщение"></x-alert>
    <x-alert type="warning" message="Это информационное сообщение"></x-alert>
    <x-alert type="success" message="Это информационное сообщение"></x-alert> --}}
  </div>

@endsection


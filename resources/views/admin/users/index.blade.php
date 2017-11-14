@extends('layouts.app')

@section('title', 'Список всех пользователей')

@section('content')
список всех пользователей
<a href="{{ url('admin/users/create') }}">add user</a>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Ф.И.О.</th>
        <th>Эл. почта</th>
        <th>IP адрес</th>
        <th>Управление</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>ip</td>
            <td><a href="{{ url('admin/users/' . $user->id) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a></td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection
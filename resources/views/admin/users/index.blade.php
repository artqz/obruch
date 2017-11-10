@extends('layouts.app')

@section('title', 'Список всех пользователей')

@section('content')
список всех пользователей
<a href="{{ url('admin/users/create') }}">add user</a>
@foreach ($users as $user)
    <a href="{{ url('admin/users/' . $user->id) }}">{{ $user->name }}</a>
@endforeach
@endsection
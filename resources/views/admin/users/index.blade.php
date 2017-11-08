@extends('layouts.app')

@section('title', 'Список всех пользователей')

@section('content')
список всех пользователей
<a href="users/create">add user</a>
@foreach ($users as $user)
    <p>This is user {{ $user->name }}</p>
@endforeach
@endsection
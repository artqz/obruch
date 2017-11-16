@extends('layouts.app')

@section('title', 'Редактор пользователя')

@section('content')
<a href="{{ url('admin/users') }}">Пользователи</a>
<br>
<a href="{{ url('admin/organizations') }}">Справочник</a>
@endsection
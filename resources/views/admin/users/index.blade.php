@extends('layouts.app')

@section('title', 'Список всех пользователей')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.users') !!}
    <h1>Список пользователей</h1>
    <hr>
    <div class="float-right">
        <a href="{{ url('admin/users/create') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Добавить пользователя</a>
    </div>

    <br><br>
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
                <td><img src="{{ url('images/users/'. $user->photo) }}" alt="{{ $user->login }}" style="width: 30px; border-radius: 50%;"> {{ $user->name }} {{ ($user->is_hide) ? '(Удален)' : '' }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->ip_address }}</td>
                <td><a href="{{ url('admin/users/' . $user->id) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <nav class="nav justify-content-center">
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    </nav>
@endsection
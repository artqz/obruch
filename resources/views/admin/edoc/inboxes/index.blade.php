@extends('layouts.app')

@section('title', 'Панель управления - Список входящих')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.users') !!}
    <h1>Список входящих</h1>
    <hr>
    <div class="float-right">
        <a href="{{ url('admin/edoc/inbox/create') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-file-text-o" aria-hidden="true"></i> Добавить входящий документ</a>
    </div>

    <br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Рег/Номер</th>
            <th>Тема</th>
            <th>Откуда</th>
            <th>Дата регистрации</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($inboxes as $inbox)
            <tr>
                <td>{{ $inbox->reg_number }}</td>
                <td>{{ $inbox->name }} {{ ($inbox->is_hide) ? '(Удален)' : '' }}</td>
                <td><a href="/">{{ $inbox->organization->name }}</a></td>
                <td>{{ $inbox->reg_date }}</td>
                <td><a href="{{ url('admin/edoc/inbox/' . $inbox->id) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@extends('layouts.app')

@section('title', 'Панель управления - Организации')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.organizations') !!}
    <h1>Список организаций</h1>
    <hr>
    <div class="float-right">
        <a href="{{ url('admin/organizations/create') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Добавить организацию</a>
    </div>

    <br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Эл. почта</th>
            <th>Адрес</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($organizations as $organization)
            <tr>
                <td>{{ $organization->name }} {{ ($organization->is_hide) ? '(Удалена)' : '' }}</td>
                <td>{{ $organization->email }}</td>
                <td>{{ $organization->address }}</td>
                <td><a href="{{ url('admin/organizations/' . $organization->id) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <nav class="nav justify-content-center">
        {{ $organizations->links('vendor.pagination.bootstrap-4') }}
    </nav>
@endsection
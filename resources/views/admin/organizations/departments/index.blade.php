@extends('layouts.app')

@section('title', 'Панель управления - Организации')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.organizations.departments.index', $organization) !!}
    <h1>Список организаций</h1>
    <hr>
    <div class="float-right">
        <a href="{{ url('admin/organizations/'.$organization->id.'/departments/create') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-building-o" aria-hidden="true"></i> Добавить отдел</a>
    </div>
    @foreach ($organization->departments as $department)
        {{ $department->name }}
    @endforeach
    <br><br>
@endsection

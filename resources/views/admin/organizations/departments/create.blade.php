@extends('layouts.app')

@section('title', 'Панель управления - Добавить организацию')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.organizations.departments.create', $organization) !!}
    <h1>Добавить отдел</h1>
    <hr>
{{ Form::open(['url' => 'admin/organizations/'.$organization->id.'/departments', 'method' => 'post']) }}
    <div class="form-group">
        {{ Form::label('name', 'Наименование') }}
        {{ Form::text('name', null, ['placeholder' => 'Отдел связи и оповещения', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Наименование отдела</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>
    <a href="{{ url('admin/organizations/'. $organization->id .'#departments') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
@endsection
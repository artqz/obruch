@extends('layouts.app')

@section('title', 'Добавить входящий')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.users.create') !!}
    <h1>Добавить входящий</h1>
    <hr>
{{ Form::open(['url' => 'admin/edoc/inbox', 'method' => 'post']) }}
    <div class="form-group">
        {{ Form::label('reg_number', 'Регистрационный номер') }}
        {{ Form::text('reg_number', null, ['placeholder' => '1', 'class' => 'form-control']) }}
        <small id="regNumberHelp" class="form-text text-muted">Регистрационный номер документа.</small>
        <small id="regNumberHelp" class="text-danger">{{ $errors->first('reg_number') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Тема документа') }}
        {{ Form::text('name', null, ['placeholder' => 'О внесении изменений', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Тема входящего документа.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('reg_date', 'Дата регистрации') }}
        {{ Form::date('reg_date', null, ['class' => 'form-control']) }}
        <small id="regDateHelp" class="form-text text-muted">Дата регистрации входящегно документа.</small>
        <small id="regDateHelp" class="text-danger">{{ $errors->first('reg_date') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('number', 'Номер') }}
        {{ Form::text('number', null, ['placeholder' => '11-01-17/2', 'class' => 'form-control']) }}
        <small id="numberHelp" class="form-text text-muted">Номер документа входящего документа.</small>
        <small id="numberHelp" class="text-danger">{{ $errors->first('number') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('date', 'Дата документа') }}
        {{ Form::date('date', null, ['class' => 'form-control']) }}
        <small id="dateHelp" class="form-text text-muted">Дата входящегно документа.</small>
        <small id="dateHelp" class="text-danger">{{ $errors->first('date') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('folder', 'Дело') }}
        {{ Form::text('folder', null, ['placeholder' => '1', 'class' => 'form-control']) }}
        <small id="folderHelp" class="form-text text-muted">Номер документа входящего документа.</small>
        <small id="folderHelp" class="text-danger">{{ $errors->first('folder') }}</small>
    </div>
    <a href="{{ url('admin/edoc/inbox/') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Зарегистрировать', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
@endsection
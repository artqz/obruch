@extends('layouts.app')

@section('title', 'Панель управления - Добавить организацию')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.organizations.create') !!}
    <h1>Добавить организацию</h1>
    <hr>
{{ Form::open(['url' => 'admin/organizations', 'method' => 'post']) }}
    <div class="form-group">
        {{ Form::label('name', 'Наименование') }}
        {{ Form::text('name', null, ['placeholder' => 'МБУ "Управление гражданской защиты Серовского городского округа"', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Наименование организации</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>

    <div class="form-group">
        {{ Form::label('short_name', 'Наименование') }}
        {{ Form::text('short_name', null, ['placeholder' => 'МБУ "УГЗ СГО"', 'class' => 'form-control']) }}
        <small id="shortNameHelp" class="form-text text-muted">Короткое наименование организации</small>
        <small id="shortNameHelp" class="text-danger">{{ $errors->first('short_name') }}</small>
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Эл. почта') }}
        {{ Form::text('email', null, ['placeholder' => 'info@serov112.ru', 'class' => 'form-control']) }}
        <small id="emailHelp" class="form-text text-muted">Электроная почта сотрудника, необходима для оповещения.</small>
        <small id="emailHelp" class="text-danger">{{ $errors->first('email') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Адрес') }}
        {{ Form::text('address', null, ['placeholder' => 'г. Серов, ул. Ленина, 140', 'class' => 'form-control']) }}
        <small id="addressHelp" class="form-text text-muted">Адрес организации.</small>
        <small id="addressHelp" class="text-danger">{{ $errors->first('address') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('coordinates', 'Координаты') }}
        {{ Form::text('coordinates', null, ['placeholder' => '59.600202, 60.564895', 'class' => 'form-control']) }}
        <small id="coordinatesHelp" class="form-text text-muted">Координаты, необходимы для отображения на карте.</small>
        <small id="coordinatesHelp" class="text-danger">{{ $errors->first('coordinates') }}</small>
    </div>
    <a href="{{ url('admin/organizations/') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
@endsection
@extends('layouts.app')

@section('title', 'Добавить пользователя')

@section('content')
    <br>
    <h1><i class="fa fa-address-book-o" aria-hidden="true"></i> Добавить пользователя</h1>
    <hr>
{{ Form::open(['url' => 'admin/users', 'method' => 'put']) }}
    <div class="form-group">
        {{ Form::label('login', 'Логин') }}
        {{ Form::text('login', null, ['placeholder' => 'kuznetsov', 'class' => 'form-control']) }}
        <small id="loginHelp" class="form-text text-muted">Логин сотрудника, требуется для авторизации в программе.</small>
        <small id="loginHelp" class="text-danger">{{ $errors->first('login') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('rang', 'Должность') }}
        {{ Form::text('rang', null, ['placeholder' => 'Инженер', 'class' => 'form-control']) }}
        <small id="rangHelp" class="form-text text-muted">Занимаемая должность сотрудника.</small>
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Эл. почта') }}
        {{ Form::text('email', null, ['placeholder' => 'info@serov112.ru', 'class' => 'form-control']) }}
        <small id="emailHelp" class="form-text text-muted">Электроная почта сотрудника, необходима для оповещения.</small>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Ф.И.О.') }}
        {{ Form::text('name', null, ['placeholder' => 'Кузнецов А.А.', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Фамилия и инициалы сотрудника.</small>
    </div>
    <div class="form-group">
        {{ Form::label('birthdate', 'Дата рождения') }}
        {{ Form::date('birthdate', null, ['class' => 'form-control']) }}
        <small id="birthdateHelp" class="form-text text-muted">Дата рождения сотрудника, необходима для автонапоминания о дне рождении.</small>
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Пароль') }}
        {{ Form::password('password', ['placeholder' => '******', 'class' => 'form-control']) }}
        <small id="birthdateHelp" class="form-text text-muted">Пароль от учетной записи сатрудника, рекомендуется предупредить сотрудника о необходимости смены стандартного пароля.</small>
    </div>
    <div class="form-group">
        {{ Form::label('photo', 'Фотография') }}
        {{ Form::file('photo', ['class' => 'form-control']) }}
        <small id="photoHelp" class="form-text text-muted">Фотография сотрудника, будет отображена в профиле.</small>
    </div>
    {{ Form::submit('Зарегистрировать', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
{{ $errors }}
@endsection
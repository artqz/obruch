@extends('layouts.app')

@section('title', 'Редактор пользователя')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.users.show', $user) !!}
    <h1>Редактор пользователя - {{ $user->login }}</h1>
    <hr>
    @if(!$user->is_hide)
    <a name="info"></a>
    <h2>Информация о пользователе</h2>
    {{ Form::open(['url' => 'admin/users/'. $user->id .'/update_info', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('login', 'Логин') }}
            {{ Form::text('login', $user->login, ['placeholder' => 'kuznetsov', 'class' => 'form-control']) }}
            <small id="loginHelp" class="form-text text-muted">Логин сотрудника, требуется для авторизации в программе.</small>
            <small id="loginHelp" class="text-danger">{{ $errors->first('login') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('rang', 'Должность') }}
            {{ Form::text('rang', $user->rang, ['placeholder' => 'Инженер', 'class' => 'form-control']) }}
            <small id="rangHelp" class="form-text text-muted">Занимаемая должность сотрудника.</small>
            <small id="rangHelp" class="text-danger">{{ $errors->first('rang') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Эл. почта') }}
            {{ Form::text('email', $user->email, ['placeholder' => 'info@serov112.ru', 'class' => 'form-control']) }}
            <small id="emailHelp" class="form-text text-muted">Электроная почта сотрудника, необходима для оповещения.</small>
            <small id="emailHelp" class="text-danger">{{ $errors->first('email') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('name', 'Ф.И.О.') }}
            {{ Form::text('name', $user->name, ['placeholder' => 'Кузнецов А.А.', 'class' => 'form-control']) }}
            <small id="nameHelp" class="form-text text-muted">Фамилия и инициалы сотрудника.</small>
            <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('birthdate', 'Дата рождения') }}
            {{ Form::date('birthdate', $user->birthdate, ['class' => 'form-control']) }}
            <small id="birthdateHelp" class="form-text text-muted">Дата рождения сотрудника, необходима для автонапоминания о дне рождении.</small>
            <small id="birthdateHelp" class="text-danger">{{ $errors->first('birthdate') }}</small>
        </div>
        <div class="form-group">
            {{ Form::button('<i class="fa fa-check-circle-o" aria-hidden="true"></i> Изменить', ['type' => 'submit', 'class' => 'btn btn-success']) }}
        </div>
    {{ Form::close() }}
    <hr>
    <a name="password"></a>
    <h2>Пароль пользователя</h2>
    {{ Form::open(['url' => 'admin/users/'. $user->id .'/update_password', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('password', 'Пароль') }}
            {{ Form::password('password', ['placeholder' => '******', 'class' => 'form-control']) }}
            <small id="passwordHelp" class="form-text text-muted">Пароль от учетной записи сатрудника, рекомендуется предупредить сотрудника о необходимости смены стандартного пароля.</small>
            <small id="passwordHelp" class="text-danger">{{ $errors->first('password') }}</small>
        </div>
        <div class="form-group">
            {{ Form::button('<i class="fa fa-check-circle-o" aria-hidden="true"></i> Изменить', ['type' => 'submit', 'class' => 'btn btn-success']) }}
        </div>
    {{ Form::close() }}
    <hr>
    <a name="photo"></a>
    <h2>Фотография пользователя</h2>
    {{ Form::open(['url' => 'admin/users/'. $user->id .'/update_photo', 'method' => 'post', 'files' => 'true', 'enctype'=>'multipart/form-data']) }}
    <div class="row">
        <div class="col-xl-3">
            <img src="/images/users/{{ $user->photo }}" alt="{{ $user->login }}" class="rounded-circle">
        </div>
        <div class="col-xl-9">
            <div class="form-group">
                {{ Form::label('photo', 'Фотография') }}
                {{ Form::file('photo', ['class' => 'form-control']) }}
                <small id="passwordHelp" class="form-text text-muted">Фотография пользователя.</small>
                <small id="passwordHelp" class="text-danger">{{ $errors->first('photo') }}</small>
            </div>
            <div class="form-group">
                {{ Form::button('<i class="fa fa-check-circle-o" aria-hidden="true"></i> Загрузить', ['type' => 'submit', 'class' => 'btn btn-success']) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}
    <hr>
    <div class="form-group">
        <a href="{{ url('admin/users/') }}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Вернуться назад</a>
        @if($user->is_hide)
            <a href="{{ url('admin/users/'. $user->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить профиль этого пользователя?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
        @else
            <a href="{{ url('admin/users/'. $user->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
        @endif
    </div>
    @else
        <p>Данный пользователь удален!</p>
    <div class="form-group">
        <a href="{{ url('admin/users/') }}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Вернуться назад</a>
        @if($user->is_hide)
            <a href="{{ url('admin/users/'. $user->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить профиль этого пользователя?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
        @else
            <a href="{{ url('admin/users/'. $user->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
        @endif
    </div>
    @endif
@endsection
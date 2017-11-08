Добавить пользователя
{{ Form::token() }}
{{ Form::open(['url' => 'admin/users', 'method' => 'put']) }}
    {{ Form::label('login', 'Логин') }}
    {{ Form::text('login', null, ['placeholder' => 'kuznetsov']) }}
    {{ Form::label('rang', 'Должность') }}
    {{ Form::text('rang', null, ['placeholder' => 'Инженер']) }}
    {{ Form::label('email', 'Эл. почта') }}
    {{ Form::text('email', null, ['placeholder' => 'info@serov112.ru']) }}
    {{ Form::label('name', 'Ф.И.О.') }}
    {{ Form::text('name', null, ['placeholder' => 'Кузнецов А.А.']) }}
    {{ Form::label('birthdate', 'Дата рождения') }}
    {{ Form::date('birthdate') }}
    {{ Form::label('password', 'Пароль') }}
    {{ Form::password('password', null, ['placeholder' => 'password']) }}
    {{ Form::label('photo', 'Пароль') }}
    {{ Form::file('photo') }}
    {{ Form::submit('Зарегистрировать') }}
{{ Form::close() }}
{{ $errors }}
@extends('layouts.app')

@section('title', 'Редактор организации - '. $organization->short_name)

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.organizations.show', $organization) !!}
    <h1>Редактор организации - {{ $organization->short_name }}</h1>
    <hr>
    @if(!$organization->is_hide)
    <a name="info"></a>
    <h2>Информация о пользователе</h2>
    {{ Form::open(['url' => 'admin/organizations/'. $organization->id .'/update_info', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('name', 'Наименование') }}
            {{ Form::text('name', $organization->name, ['placeholder' => 'МБУ "Управление гражданской защиты Серовского городского округа"', 'class' => 'form-control']) }}
            <small id="nameHelp" class="form-text text-muted">Наименование организации</small>
            <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
        </div>

        <div class="form-group">
            {{ Form::label('short_name', 'Наименование') }}
            {{ Form::text('short_name', $organization->short_name, ['placeholder' => 'МБУ "УГЗ СГО"', 'class' => 'form-control']) }}
            <small id="shortNameHelp" class="form-text text-muted">Короткое наименование организации</small>
            <small id="shortNameHelp" class="text-danger">{{ $errors->first('short_name') }}</small>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Эл. почта') }}
            {{ Form::text('email', $organization->email, ['placeholder' => 'info@serov112.ru', 'class' => 'form-control']) }}
            <small id="emailHelp" class="form-text text-muted">Электроная почта сотрудника, необходима для оповещения.</small>
            <small id="emailHelp" class="text-danger">{{ $errors->first('email') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Адрес') }}
            {{ Form::text('address', $organization->address, ['placeholder' => 'г. Серов, ул. Ленина, 140', 'class' => 'form-control']) }}
            <small id="addressHelp" class="form-text text-muted">Адрес организации.</small>
            <small id="addressHelp" class="text-danger">{{ $errors->first('address') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('coordinates', 'Координаты') }}
            {{ Form::text('coordinates', $organization->coordinates, ['placeholder' => '59.600202, 60.564895', 'class' => 'form-control']) }}
            <small id="coordinatesHelp" class="form-text text-muted">Координаты, необходимы для отображения на карте.</small>
            <small id="coordinatesHelp" class="text-danger">{{ $errors->first('coordinates') }}</small>
        </div>
        <div class="form-group">
            {{ Form::button('<i class="fa fa-check-circle-o" aria-hidden="true"></i> Изменить', ['type' => 'submit', 'class' => 'btn btn-success']) }}
        </div>
    {{ Form::close() }}
    <hr>
    <h2>Отделы</h2>
    <div class="card">
        <div class="card-header">Featured</div>
        <div class="card-body">
            <h4 class="card-title">Special title treatment</h4>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <a href="{{ url('admin/organizations/') }}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Вернуться назад</a>
        @if($organization->is_hide)
            <a href="{{ url('admin/organizations/'. $organization->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить эту организацию?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
        @else
            <a href="{{ url('admin/organizations/'. $organization->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
        @endif
    </div>
    @else
        <p>Данная организация удалена!</p>
    <div class="form-group">
        <a href="{{ url('admin/organizations/') }}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Вернуться назад</a>
        @if($organization->is_hide)
            <a href="{{ url('admin/organizations/'. $organization->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить эту организацию?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
        @else
            <a href="{{ url('admin/organizations/'. $organization->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
        @endif
    </div>
    @endif
@endsection
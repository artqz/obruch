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
        {{ Form::text('reg_number', $inbox_next_number, ['placeholder' => '1', 'class' => 'form-control']) }}
        <small id="regNumberHelp" class="form-text text-muted">Регистрационный номер документа.</small>
        <small id="regNumberHelp" class="text-danger">{{ $errors->first('reg_number') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('reg_date', 'Дата регистрации') }}
        {{ Form::date('reg_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
        <small id="regDateHelp" class="form-text text-muted">Дата регистрации входящегно документа.</small>
        <small id="regDateHelp" class="text-danger">{{ $errors->first('reg_date') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Тема документа') }}
        {{ Form::text('name', null, ['placeholder' => 'О внесении изменений', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Тема входящего документа.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('number', 'Номер документа') }}
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
    <div class="form-group">
        {{ Form::label('organization', 'Откого') }}
        <select name="organization" id="organization_list" class="form-control">
            @if($organization = old('organization'))
                <option value="{{old('organization')}}">{{ \App\Organization::where('id', $organization)->first()->name }}</option>
            @endif
        </select>
        <small id="organizationHelp" class="form-text text-muted">От какой организации пришел документ?</small>
        <small id="organizationHelp" class="text-danger">{{ $errors->first('organization') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('tags', 'Тэги') }}
        <select name="tags[]" id="tag_list" class="form-control" multiple="multiple">
            @if (is_array(old('tags')))
                @foreach (old('tags') as $tag)
                    <option value="{{ $tag }}" selected="selected">{{ \App\Tag::where('id', $tag)->first()->name }}</option>
                @endforeach
            @endif
        </select>
        <small id="tagsHelp" class="form-text text-muted">Позволяют находить быстрее информацию.</small>
        <small id="tagsHelp" class="text-danger">{{ $errors->first('tags') }}</small>
    </div>
    <a href="{{ url('admin/edoc/inbox/') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Зарегистрировать', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
@endsection

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#organization_list').select2({
            placeholder: 'Выберите организацию',
            language: {
                noResults: function (params) {
                    return "Нет такой организации.";
                },
                searching: function () {
                    return 'Поиск…';
                }
            },
            ajax: {
                dataType: 'json',
                url: '{{ url("api/organizations") }}',
                type: 'POST',
                delay: 400,
                data: function(params) {
                    return {
                        "_token": "{{ csrf_token() }}",
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                slug: item.short_name,
                                id: item.id
                            }
                        })
                    };
                },
            }
        });
    </script>
    <script>
        $('#tag_list').select2({
            //tags: true,
            tokenSeparators: [',', ' '],
            multiple: true,
            placeholder: 'Введите тэги',
            language: {
                searching: function () {
                    return 'Поиск…';
                }
            },
            ajax: {
                dataType: 'json',
                url: '{{ url("api/tags") }}',
                type: 'POST',
                delay: 400,
                data: function(params) {
                    return {
                        "_token": "{{ csrf_token() }}",
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                slug: item.short_name,
                                id: item.id
                            }
                        })
                    };
                },
            }
        });
    </script>
@endsection
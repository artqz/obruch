@extends('layouts.app')

@section('title', $user->name)

@section('content')
    {{ $user }}
@endsection
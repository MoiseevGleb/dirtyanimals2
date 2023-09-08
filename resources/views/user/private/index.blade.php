@extends('layouts.user_private')
@section('title', 'Личный кабинет')

@section('content')
    <h2>Здравствуйте, {{ auth()->user()->name }}</h2>
@endsection

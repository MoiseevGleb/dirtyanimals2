@extends('layouts.private')

@section('content')
    <h2>Здравствуйте, {{ auth()->user()->name }}</h2>
@endsection

@extends('layouts.user_private')
@section('title', 'Редактировать профиль')

@section('content')
    <h2 class="mb-5">Редактировать профиль</h2>
    <form action="{{ route('user.private.update') }}" class="form-group w-25" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="name">Имя</label>
        <input name="name" id="name" class="form-control" value="{{ $user->name }}">
        @error('name')
        <div id="emailError" class="form-text text-danger">{{$message}}</div>
        @enderror

        <label for="email" class="mt-3">Электронная почта</label>
        <input name="email" id="email" class="form-control" value="{{ $user->email }}">
        @error('email')
        <div id="emailError" class="form-text text-danger">{{$message}}</div>
        @enderror

        <!--        <label for="name" class="mt-3">Пароль</label>
                <input name="name" id="name" class="form-control">-->

        <label for="pfp" class="mt-3">Фотография профиля</label>
        <img class="img-fluid rounded-3" src="{{ asset('storage/images/avatars/' . $user->pfp) }}" alt="{{ $user->pfp }}">
        <input type="file" name="pfp" id="pfp" class="form-control mt-3">
        @error('pfp')
        <div id="emailError" class="form-text text-danger">{{$message}}</div>
        @enderror

        <button class="btn btn-outline-success mt-3" type="submit">Сохранить</button>
    </form>
@endsection

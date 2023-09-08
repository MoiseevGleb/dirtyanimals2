@extends('layouts.admin_private')
@section('title', 'Создать новость')

@section('content')
    <h2 class="mb-5">Создать новость</h2>
    <form class="form-group w-50" action="{{ route('admin.news.store') }}" method="POST">
        @csrf

        <label for="title">Заголовок</label>
        <input name="title" id="title" class="form-control" value="{{ old('title') }}">
        @error('title')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror

        <label for="content" class="mt-3">Текст</label>
        <textarea rows="7" name="content" id="content" class="form-control">{{ old('content') }}</textarea>
        @error('content')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror

        <div class="form-check mt-3">

            <input name="show_author" class="form-check-input" type="checkbox" value="1"
                   id="show_author" {{ old('show_author') ? 'checked' : '' }}>
            <label class="form-check-label" for="show_author">
                Показать автора
            </label>
            @error('show_author')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

        <a href="{{ route('admin.news.index') }}" class="mt-3 btn btn-outline-primary">Назад</a>
        <button type="submit" class="mt-3 btn btn-outline-success">Создать</button>
    </form>
@endsection

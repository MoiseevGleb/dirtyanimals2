@extends('layouts.admin_private')
@section('title', 'Редактировать новость')

@section('content')
    <h2 class="mb-5">Редактировать новость</h2>
    <form class="form-group w-50" action="{{ route('admin.news.update', [$news]) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="title">Заголовок</label>
        <input name="title" id="title" class="form-control" value="{{ $news->title }}">
        @error('title')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror

        <label for="content" class="mt-3">Текст</label>
        <textarea rows="7" name="content" id="content" class="form-control">{{ $news->content }}</textarea>
        @error('content')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror

        <div class="form-check mt-3">
            <input name="show_author" class="form-check-input" type="checkbox" value="1"
                   id="show_author" {{ $news->show_author ? 'checked' : '' }}>
            <label class="form-check-label" for="show_author">
                Показать автора
            </label>
            @error('show_author')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

        <a href="{{ route('admin.news.index') }}" class="mt-3 btn btn-outline-primary">Назад</a>
        <button type="submit" class="mt-3 btn btn-outline-success">Изменить</button>
    </form>
@endsection

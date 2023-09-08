@extends('layouts.admin_private')
@section('title', 'Все новости')

@section('content')
    <h2 class="mb-5">Новости</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Дата изменения</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $news_item)
            <tr>
                <th scope="row">{{ $news_item->id }}</th>
                <td>{{ $news_item->title }}</td>
                <td>{{ $news_item->created_at }}</td>
                <td>{{ $news_item->updated_at }}</td>

                <td>
                    <a href="{{ route('admin.news.edit', [$news_item]) }}" class="btn btn-outline-primary">Изменить</a>
                </td>

                <td>
                    <form action="{{ route('admin.news.destroy', [$news_item]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

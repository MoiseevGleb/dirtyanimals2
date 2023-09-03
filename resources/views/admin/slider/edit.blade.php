@extends('layouts.private')
@section('title', 'Редактировать слайды')

@section('content')
    <h2 class="mb-5">Редактировать слайды</h2>
    @if(empty($slides))
        <p>У вас не добавлено ни одного слайда, вы можете это сделать <a href="{{ route('admin.slider.create') }}">здесь</a></p>
    @else
        <div class="d-flex flex-wrap row-cols-4 gap-3">
            @foreach($slides as $k => $slide)
                <div class="card p-3 col d-flex flex-column justify-content-between" style="width: 346px">
                    <h3>{{ $k+1 }} слайд: {{ substr(basename($slide), strpos(basename($slide), '_') + 1) }}</h3>
                    <img id="slide" class="img-fluid rounded-3 mb-3" width="340" height="300" src="{{ asset($slide)}}" alt="{{ basename($slide) }}">
                    <div class="flex-row-reverse">
                        <form action="{{ route('admin.slider.update', basename($slide)) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h3>Изменить или удалить</h3>
                            <input name='slide' type="file" class="form-control" id="inputGroupFile02">
                            @error('slide')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                            <button type="submit" class="btn btn-outline-primary my-3 col-12">Изменить</button>
                        </form>
                        <form action="{{ route('admin.slider.destroy', basename($slide)) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger col-12">Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

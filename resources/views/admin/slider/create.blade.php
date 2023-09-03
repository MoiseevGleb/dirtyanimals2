@extends('layouts.private')
@section('title', 'Добавить слайд')

@section('content')
    <h2 class="mb-5">Добавить слайд</h2>

    <div class="input-group mb-3">
        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="slide" type="file" class="form-control" id="inputGroupFile02">
            @error('slide')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
        </form>
    </div>
@endsection

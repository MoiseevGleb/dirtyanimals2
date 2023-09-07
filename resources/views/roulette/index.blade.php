@extends('layouts.main')
@section('title', 'Dirty Animals | Roulette')

@section('content')
    <audio autoplay loop>
        <source src="{{ asset('storage/music/' . $music) }}" type="audio/mpeg">
    </audio>
    roulette
@endsection

@extends('layouts.main')

@section('content')
    @if(count($slides) > 0)
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($slides as $k => $slide)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $k }}" class="{{ $k === 0 ? 'active' : '' }}" aria-current="{{ $k === 0 ? 'true' : '' }}" aria-label="Slide {{ $k+1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($slides as $k => $slide)
                    <div class="carousel-item {{ $k === 0 ? 'active' : '' }}" data-bs-interval="3500" style="height: 450px">
                        <img src="{{ asset($slide) }}" class="d-block w-100" alt="{{ basename($slide) }}">
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            @foreach($products as $product)
                <div class="col">
                    <a href="{{ route('market.show', [$product]) }}" class="text-decoration-none text-reset">
                        <img alt="{{ $product->image }}" src="{{ asset(`/storage/images/products/{$product->image}`) }}" class="img-fluid mt-2 rounded-3">
                        <p class="mt-2 m-0">{{ $product->price }} ₽</p>
                        <h5>{{ $product->title }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-4">{{$products->links()}}</div>
    </div>
@endsection

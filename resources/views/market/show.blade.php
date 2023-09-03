@extends('layouts.main')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-6 overflow-hidden">
<!--            <div class="swiper-product">
                <div class="swiper-wrapper">
                    <div class="swiper-slide rounded-3" style="background-image: url(#);"></div>
                    <div class="swiper-slide rounded-3" style="background-image: url(#);"></div>
                </div>
                &lt;!&ndash; If we need pagination &ndash;&gt;
                <div class="swiper-pagination"></div>
            </div>-->

            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- <img src="cat.jpg" class="img-fluid mt-2 rounded-3"> -->
        </div>
        <div class="col-md-6">
            <h2 class="mt-3">{{ $product->title }}</h2>
            <p>{{ $product->price }} ₽</p>
            <p>{{ $product->description }}</p>

            <div class="row gap-3 w-100 m-0">
                <a class="btn btn-outline-primary col-md-5 col-sm-12"><i class="bi bi-cart mx-2"></i>Добавить в корзину</a>
                <a class="btn btn-outline-primary col-md-5 col-sm-12"><i class="bi bi-list-ul mx-2"></i>Добавить в желаемое</a>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <h2>Похожие товары</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <div class="col">
                <a href="" class="text-decoration-none text-reset">
                    <img src="cat.jpg" class="img-fluid mt-2 rounded-3">
                    <p class="mt-2 m-0">999.99 $</p>
                    <h5>Футболка "Грязные Животные"</h5>
                </a>
            </div>
        </div>
    </div>
@endsection

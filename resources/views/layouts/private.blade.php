<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title', 'Панель Администратора')</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
</head>
<body>

<div class="d-flex flex-nowrap">
    <div class="flex-shrink-0 p-3 pt-0 bg-white vh-100 overflow-y-hidden border-end shadow fixed-top" style="width: 280px;">
        <a href="{{ route('home') }}" class="d-flex align-items-center pb-0 mb-3 link-dark text-decoration-none border-bottom">
            <img src="{{ asset('/storage/images/logo.svg') }}" alt="logo.svg" height="60" width="80">
            <span class="fs-5 fw-semibold">Dirty Animals</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    Слайдер
                </button>
                <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('admin.slider.create') }}" class="link-dark d-inline-flex text-decoration-none rounded">Добавить слайд</a></li>
                        <li><a href="{{ route('admin.slider.edit') }}" class="link-dark d-inline-flex text-decoration-none rounded">Редактировать слайды</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Dashboard
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Weekly</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Monthly</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Annually</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Orders
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Processed</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Shipped</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Returned</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Account
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Profile</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Settings</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sign out</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="w-100" style="margin-left: 280px">
        @if(session('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="w-100 p-2 bg-primary text-center text-white">
                {{ session('message') }}
            </div>
        @endif
        <div class="p-5">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

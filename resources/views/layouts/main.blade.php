<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DirtyAnimals</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
</head>
<body>
<div class="d-flex flex-column min-vh-100">
    @if(session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="w-100 p-2 bg-primary text-center text-white">
            {{ session('message') }}
        </div>
    @endif
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="text-decoration-none text-reset d-flex">
                <img src="{{ asset('/storage/images/logo.svg') }}" alt="logo.svg" height="60" width="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('market.*') ? 'active' : '' }}" aria-current="page" href="{{ route('market.index') }}">Магазин</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news') ? 'active' : '' }}" aria-current="page" href="#">Новости</a>
                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('games.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Игры
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#"><i class="bi bi-dice-5 mx-2"></i>Рулетка</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="bi bi-input-cursor mx-2"></i>Ввести промокод</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('cart') ? 'active' : '' }}" aria-current="page" href="#"><i class="bi bi-cart mx-2"></i>Корзина (1)</a>
                        </li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Глеб
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end {{ request()->routeIs('private') ? 'active' : '' }}">
                                    <li>
                                        <a class="dropdown-item" href="#"><i class="bi bi-person-circle mx-2"></i>Личный кабинет</a>
                                    </li>
                                    @if(auth()->user()->role === 'admin')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.index') }}"><i class="bi bi-gear mx-2"></i>Админка</a>
                                        </li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <li>
                                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left mx-2"></i>Выйти</button>
                                        </li>
                                    </form>
                                </ul>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('login.index') }}"><i class="bi bi-box-arrow-in-right mx-2"></i>Войти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('register.index') }}"><i class="bi bi-person-plus mx-2"></i>Регистрация</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div  id="app" class="flex-grow-1">
        @yield('content')
    </div>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid d-block">
            <p class="text-center m-0">DirtyAnimals™<br>Все права защищены</p>
        </div>
    </nav>
</div>
</body>
</html>

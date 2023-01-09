<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Бренд і кнопка «Гамбургер» -->
        <a class="navbar-brand" href="/">Магазин</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbar-example" aria-controls="navbar-example"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Основна частина меню (може мати посилання, форми та інше) -->
        <div class="collapse navbar-collapse" id="navbar-example">
            <!-- Цей блок розташований зліва -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакти</a>
                </li>
            </ul>
            <!-- Цей блок розташований справа -->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search"
                       placeholder="Пошук по категоріям" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0"
                        type="submit">Шукати</button>
            </form>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link @if ($positions) text-success @endif" href="{{ route('basket.index') }}">
                        Кошик
                        @if ($positions) ({{ $positions }}) @endif
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-3">
            @include('layout.part.roots')
            @include('layout.part.brands')
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d2e80c593a.js" crossorigin="anonymous"></script>

@yield('header')

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/other.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hover.css') }}" rel="stylesheet">


</head>
<body>
<div class="layout-wrapper" id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top d-block" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}"><span class="text-primary">S</span>mart<span
                    class="text-primary">X</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('items.index') }}"><i
                                class="fas fa-store"></i> Store</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}"><i
                                    class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item js-scroll-trigger">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <i class="fas fa-plus"></i> {{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @if (Auth::user()->isAdmin())
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class=" text-capitalize nav-link dropdown-toggle" href="#"
                                   role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-crown"></i> Admin <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/category">
                                        <i class="fas fa-list-ul"></i> Categories
                                    </a>
                                    <a class="dropdown-item" href="/admin/items">
                                        <i class="fas fa-store-alt"></i> items
                                    </a>
                                    <a class="dropdown-item" href="{{route('news.index')}}">
                                        <i class="far fa-newspaper"></i> News
                                    </a>
                                    <a class="dropdown-item" href="{{route('ads.index')}}">
                                        <i class="far fa-images"></i> ADS
                                    </a>
                                    <a class="dropdown-item" href="{{route('order.admin_index')}}">
                                        <i class="fas fa-boxes"></i> Orders
                                    </a>

                                </div>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger " href="{{ route('mycart') }}">
                                <i class="fas fa-shopping-cart"></i> My Cart</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class=" text-capitalize nav-link dropdown-toggle" href="#"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-id-badge"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('order.index') }}">
                                    <i class="fas fa-boxes"></i> My Orders
                                </a>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="far fa-user"></i> My Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 mt-4 layout-main">
        @yield('content')
    </main>
    <footer class="bg-dark text-white">
        <div class="container">
            <div class="row text-center d-flex justify-content-center pt-5 mb-3">
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold text-light">
                        <a class="text-white" href="/#aboutus">About us</a>
                    </h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a class="text-white" href="/news">News and Articles</a>
                    </h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a class="text-white" href="/store">Store</a>
                    </h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <a class="text-white" href="/#aboutus">Contact</a>
                    </h6>
                </div>
            </div>

        </div>

        <div class="text-center py-3">© 2020 Copyright:
            <a class="text-white" href="/">SmartX</a>
        </div>
    </footer>

</div>

</body>
</html>

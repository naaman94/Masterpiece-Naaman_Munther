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


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/NavBar.css') }}" rel="stylesheet">


</head>
<body>
<div id="app">
    {{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
    {{--            <div class="container">--}}
    {{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
    {{--                    {{ config('app.name', 'Laravel') }}--}}
    {{--                </a>--}}
    {{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
    {{--                    <span class="navbar-toggler-icon"></span>--}}
    {{--                </button>--}}

    {{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
    {{--                    <!-- Left Side Of Navbar -->--}}
    {{--                    <ul class="navbar-nav mr-auto">--}}

    {{--                    </ul>--}}

    {{--                    <!-- Right Side Of Navbar -->--}}
    {{--                    <ul class="navbar-nav ml-auto">--}}
    {{--                        <!-- Authentication Links -->--}}
    {{--                        @guest--}}
    {{--                            <li class="nav-item">--}}
    {{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
    {{--                            </li>--}}
    {{--                            @if (Route::has('register'))--}}
    {{--                                <li class="nav-item">--}}
    {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
    {{--                                </li>--}}
    {{--                            @endif--}}
    {{--                        @else--}}
    {{--                            <li class="nav-item dropdown">--}}
    {{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
    {{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
    {{--                                </a>--}}

    {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
    {{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
    {{--                                       onclick="event.preventDefault();--}}
    {{--                                                     document.getElementById('logout-form').submit();">--}}
    {{--                                        {{ __('Logout') }}--}}
    {{--                                    </a>--}}

    {{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
    {{--                                        @csrf--}}
    {{--                                    </form>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                        @endguest--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </nav>--}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">  {{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('item.index') }}"><i
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

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/Admin') }}">
                                        <i class="fas fa-crown"></i> Admin Dashboard
                                    </a>

                                    <a class="dropdown-item"  href="/category">
                                        <i class="fas fa-list-ul"></i> Categories
                                    </a>

                                    <a class="dropdown-item"  href="/category">
                                        <i class="fas fa-boxes"></i> Orders
                                    </a>

                                    <a class="dropdown-item"  href="/category">
                                        <i class="fas fa-store-alt"></i> items
                                    </a>

                                </div>

                             </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class=" text-capitalize nav-link dropdown-toggle" href="#"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-id-badge"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

    <main class="py-4 mt-5">
        @yield('content')
    </main>
</div>
</body>
</html>

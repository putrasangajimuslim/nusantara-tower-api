<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nusantara Tower APP</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                   Nusantara Tower
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tenant.index') }}" @if(!empty($currPage) && $currPage == "tenantManagement") style="width: auto; background: #656565; padding: 10px; border-radius: 10px;
                                height: 29px;
                                margin: 4px;
                                line-height: 10px;
                                text-decoration: none;
                                color: #ffff;" @endif>Tenant</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('unit.index') }}" @if(!empty($currPage) && $currPage == "unitManagement") style="width: auto; background: #656565; padding: 10px; border-radius: 10px;
                                height: 29px;
                                margin: 4px;
                                line-height: 10px;
                                text-decoration: none;
                                color: #ffff;" @endif>
                                Unit</a>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                        @endguest

                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" id="App">
            @yield('content')
        </main>

        <script type="text/javascript" src="{{ mix('js/vue_apps/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function () {

            });

            // function logout() {
            //     if(confirm("Are you sure you want to tenant?")) {
            //         console.log('test');
            //     }
            // }
        </script>

    </div>
</body>
</html>

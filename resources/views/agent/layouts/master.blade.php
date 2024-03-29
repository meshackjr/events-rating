<!doctype html>
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
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/fac9382f5c.js" defer></script>

    @livewireStyles

</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Otapp Event Rating') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    </div>
</nav>

<div class="flex">
    <div class="w-1/5">
        <div class="pt-6 flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0">
            <nav  class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 @if(request()->is('agent/dashboard*')) bg-gray-200 @endif rounded-lg" href="{{ route('agent.dashboard') }}">Dashboard</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 @if(request()->is('agent/events*')) bg-gray-200 @endif rounded-lg  " href="{{ route('agent.events.index') }}">Events</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg  " href="{{ route('agent.events.create') }}">Create Event</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 @if(request()->is('agent/ratings*')) bg-gray-200 @endif bg-transparent rounded-lg  " href="{{ route('agent.ratings.index') }}">Ratings & Reviews</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 @if(request()->is('agent/ratings*')) bg-gray-200 @endif bg-transparent rounded-lg  " href="#">Create R</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 @if(request()->is('agent/profile*')) bg-gray-200 @endif bg-transparent rounded-lg  " href="#">Profile</a>

            </nav>
        </div>
    </div>
    <div class="w-4/5 py-6 px-3">
        @include('messages')
        @yield('content')
    </div>
</div>
@livewireScripts
</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 't3-2021110029') | t3-2021110029</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @stack('css_after')
    </head>
    <body>
        {{-- Top Navbar --}}
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <i class="fa fa-film fa-fw" aria-hidden="true"></i>
                <span class="menu-collapsed">t3-2021110029</span>
            </a>
        </nav>
        {{-- Top Navbar END --}}
        <div class="row" id="body-row">
            {{-- Sidebar --}}
            @include('components.sidebar')
            {{-- Sidebar END --}}
            {{-- Content --}}
            <div class="col p-4">
                @yield('content')
                {{-- @include('components.modal') --}}
            </div>
            {{-- Content END --}}
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        @stack('js_after')
    </body>

</html>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-napló</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.css') }}" >
</head>

<body>
<header>
    <div class="menu">
        <nav>
            <ul class="menuUL">
                <li></li>
                <li><a href="{{ route('home') }}">Kilépés</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    @yield('content')
</main>
</body>
</html>

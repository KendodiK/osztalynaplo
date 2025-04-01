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
            <ul>
                <li><a href="{{ route('home') }}">Kilépés</a></li>
                <li><a href="{{route('student.marks')}}">Jegyek listája</a></li>
                <li><a href="{{route('mark.subjects')}}">Tantárgyak</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <div class="content">
        @yield('content')
    </div>
</main>
</body>
</html>

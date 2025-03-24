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
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.css') }}" >
</head>

<body>
<main>
    <div class="login-buttons">
        <a class="student-login-btn" href="{{route('loginStudent')}}">Diák</a>
        <a class="teacher-login-btn" href="{{route('loginTeacher')}}">Tanár</a>
    </div>
</main>
</body>
</html>

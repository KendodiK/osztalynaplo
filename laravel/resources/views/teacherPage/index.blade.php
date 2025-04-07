<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-napló</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.css') }}" >
</head>

<body>
<header>
    <div class="menu">
        <nav>
            <ul>
                @foreach($connections as $connection)
                    <li>
                        <button class="groupBtn" type="button" id="groupBtn" value="{{$connection->group->id}}">
                            {{$connection->group->number}}.{{$connection->group->sign}}
                        </button>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
<main>
    <div class="content" id="teacherContent">
    </div>
</main>
</body>
</html>

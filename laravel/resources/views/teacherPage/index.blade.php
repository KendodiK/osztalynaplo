<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-napló</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.css') }}" >
</head>

<body>

<header>
    <div class="menu">
        <nav>
                <a class="groupBtn" href="{{ route('home') }}">Kilépés</a>
                @foreach($connections as $connection)
                        <button class="groupBtn" type="button" id="groupBtn-{{$connection->id}}"  name="groupBtn" data-value="{{$connection->subject->id}}" value="{{$connection->group->id}}">
                            {{$connection->group->number}}.{{$connection->group->sign}}: {{$connection->subject->subject_name}}
                        </button>
                @endforeach
                <div class="searchDiv">
                    <form action="{{route('student.getByTeacher')}}">
                        <input type="text" name="searched" id="searched">
                        <button class="groupBtn searchBtn" type="submit" name="search" id="search">Kersés</button>
                    </form>
                </div>
        </nav>
    </div>
</header>
<main>
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="content content-teacher" id="teacherContent">
        @yield('content')
    </div>
</main>
</body>
</html>

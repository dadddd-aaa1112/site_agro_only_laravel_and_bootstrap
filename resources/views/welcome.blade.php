<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


</head>
<body>


<nav class="navbar navbar-expand-lg  navbar-dark bg-dark ">
    <div class="d-flex flex-grow-1 ">
        <span class="w-100 d-lg-none d-block">
            <!-- hidden spacer to center brand on mobile --></span>
        <a class="navbar-brand d-none d-lg-inline-block" href="/"> Главная </a>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
        <ul class="navbar-nav ms-auto flex-nowrap">
            @if(auth()->user())
                <form class="" action="{{ route('logout')}} " method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger ">Выйти</button>
                </form>
            @else
                <li class="nav-item">
                    <a class="nav-link m-2 menu-item nav-active" href="{{route('login')}}">Авторизация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-2 menu-item" href="{{route('register')}}">Регистрация</a>
                </li>
            @endif
        </ul>
    </div>
</nav>


</body>
</html>

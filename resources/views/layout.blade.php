<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', config('app.name'))
        @hasSection('title')
            • {{ config('app.name') }}
        @endif
    </title>
    <link rel="icon" href="{{ asset('assets/logo/logo.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<header class="between header">
    <a class="flex gap6 name" href="{{ route('home') }}">
        <img src="{{ asset('assets/logo/logo.png') }}" alt="Лого" width="50" height="50">
        <h1>{{ config('app.name') }}</h1>
    </a>
    <nav class="flex gap6">
        <a class="btn" href="{{ route('partners.index') }}">Партнёры</a>
    </nav>
</header>
<div class="head between">
    <div>
        <h2>@yield('title', '')</h2>
        @hasSection('back')
            <a class="back" href="@yield('back')">Назад</a>
        @endif
    </div>
    <div class="buttons flex gap6">
        @yield('buttons')
    </div>
</div>
<main>
    @yield('content')
</main>
</body>
</html>

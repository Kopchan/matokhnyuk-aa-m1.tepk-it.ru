{{-- Главный шаблон-представление для всех страниц --}}
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{-- Заголовок вкладки браузера. Выводится название организации с заданный заголовок в начале, если есть --}}
        @yield('title', config('app.name'))
        @hasSection('title')
            • {{ config('app.name') }}
        @endif
    </title>
    <link rel="icon" href="{{ asset('assets/logo/logo.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    {{-- Шапка страницы --}}
    <header class="between header">
        {{-- Лого и название организации --}}
        <a class="flex gap6 name" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="Лого" width="50" height="50">
            <h1>{{ config('app.name') }}</h1>
        </a>

        {{-- Место для навигационных ссылок-кнопок --}}
        <nav class="flex gap6">
            <a class="btn" href="{{ route('products.index') }}">Продукты</a>
        </nav>
    </header>

    {{-- Заголовок страницы над осномным содержимым --}}
    <div class="head between">
        <div>
            {{-- Заголовок --}}
            <h2>@yield('title', '')</h2>

            {{-- Отображение кнопка назад, если задан маршрут назад --}}
            @hasSection('back')
                <a class="back link" href="@yield('back')">Назад</a>
            @endif
        </div>
        <div class="buttons flex gap6">
            @yield('buttons')
        </div>
    </div>

    {{-- Основное содержимое --}}
    <main>
        @yield('content')
    </main>
</body>
</html>

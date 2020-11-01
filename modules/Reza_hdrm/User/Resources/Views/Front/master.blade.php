<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css?v={{ uniqid('webamooz', true) }}">
    <link rel="stylesheet" href="{{asset('css/font/font.css')}}">
    <link rel="stylesheet" href="/panel/css/style.css?v={{uniqid('webamooz',true)}}">
    <title>@yield('title')</title>
</head>
<body>
<main>
    <div class="account">
        @yield('content')
    </div>
</main>
@yield('js')
</body>
</html>

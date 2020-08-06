<!Doctype html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<nav>
    <ul>
        <li><a href="{{route('post.index')}}" class="logo"><img src="{{asset('/img/vaity.png')}}">VaITy</a></li>
        <li><a href="{{route('post.create')}}">Создать пост</a></li>
        <li><a href="">Третий</a></li>
        <li><a href="">Четвертый</a></li>
        <li><a href="">Пятый</a></li>
    </ul>
</nav>
<main>

    @yield('content')

</main>
</body>
</html>

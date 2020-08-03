<!Doctype html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}" ></script>
</head>
<body>
<nav>
    <ul>
        <li><a href="" class="logo"><img src="../img/vaity.png">VaITy</a></li>
        <li><a href="">Второй</a></li>
        <li><a href="">Третий</a></li>
        <li><a href="">Четвертый</a></li>
        <li><a href="">Пятый</a></li>
    </ul>
</nav>
<main>
    <div>
        @php
            foreach ($posts as $post){
            print_r($post->article);

}
        @endphp
    </div>

</main>
</body>
</html>

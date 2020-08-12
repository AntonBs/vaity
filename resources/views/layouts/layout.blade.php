<!Doctype html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="container">
        <nav class="nav">
            <ul class="nav-list nav-list-mobile">
                <li class="nav-item">
                    <div class="mobile-menu">
                        <span class="line line-top"></span>
                        <span class="line line-bottom"></span>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{route('post.index')}}" class="nav-link nav-link-apple" ></a>
                </li>
                <li class="nav-item">
                </li>
            </ul>

            <ul class="nav-list nav-list-larger">
                <li class="nav-item nav-item-hidden">
                    <a href="{{route('post.index')}}" class="nav-link nav-link-apple" ></a>
                </li>
                <li class="nav-item nav-mobile-hidden" >
                    <i class="nav-link-search"></i>
                    <input type="text" name="search" class="search-form-mobile" placeholder="Search apple.com" autocorrect="off" autocapitalize="off" autocomplete="off">
                </li>
                <li class="nav-item">
                    <a href="{{route('post.create')}}"  class="nav-link nav-link-h" >Создать пост</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-h" >Логин</a>
                </li>

                <li class="nav-item nav-item-hidden" >
                    <a href="#" id="search" class="nav-link nav-link-search" ></a>
                </li>
            </ul>
        </nav>
        <div class="search-form">
            <form>
                <input type="text" name="search" placeholder="Search apple.com" autocorrect="off" autocapitalize="off" autocomplete="off">
            </form>
        </div>
        <a class="close">
            <i class="fa fa-times"></i>
        </a>
    </div>

</header>


<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>

    const selectElement = (element) => document.querySelector(element);

    selectElement('.mobile-menu').addEventListener('click', () => {
        selectElement('header').classList.toggle('active');
    });


    $(document).ready(function () {
        $('#search').click(function () {
            $('.nav-link-h').addClass('hide-item')
            $('.search-form').addClass('active')
            $('.close').addClass('active')
            $('#search').hide()
        })
        $('.close').click(function () {
            $('.nav-link-h').removeClass('hide-item')
            $('.search-form').removeClass('active')
            $('.close').removeClass('active')
            $('#search').show()
        })
    })
</script>

<main>
    @if($errors->any())
        @foreach($errors->all() as $error)

            <div class="errors-post" onclick = "this.remove()">
                {{ $error }}
                <button class="close" >
                    <span>&#10006;</span>
                </button>
            </div>

        @endforeach
    @endif

    @yield('content')

</main>
</body>
</html>

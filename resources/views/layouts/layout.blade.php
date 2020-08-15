<!Doctype html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">

</head>
<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="{{route('post.create')}}">Создать статью</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{route('post.index')}}">VaITy</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="text-muted" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
                </a>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Поиск</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('post.index') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Найти на сайте:</label>
                                        <input aria-label="Search" name="search" type="search" class="form-control" id="recipient-name">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"> Найти </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#exampleModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var recipient = button.data('whatever') // Extract info from data-* attributes
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('New message to ' + recipient)
                        modal.find('.modal-body input').val(recipient)
                    })
                </script>
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class=" btn btn-sm btn-outline-secondary" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        </li>
                        {{--                    @if (Route::has('register'))--}}
                        {{--                        <li class="nav-item">--}}
                        {{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--                        </li>--}}
                        {{--                    @endif--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="author-name">{{ Auth::user()->name }}</span> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <span class="author-name-mobile dropdown-item ">{{ Auth::user()->name }}</span>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                {{--            <a class="btn btn-sm btn-outline-secondary" href="#">Войти</a>--}}
            </div>
        </div>
    </header>
</div>
<main>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" onclick = "this.remove()">
                {{ $error }}
                <button class="btn"> X Закрыть</button>
            </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @yield('content')
</main>
<footer class="blog-footer">
    <p class="mt-0 mb-0"><a href="#"> ↑ Наверх </a></p>
    <a class="blog-header-logo text-dark d-block fs-4" href="{{route('post.index')}}">VaITy</a>
    <p class="mt-0">2020</p>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

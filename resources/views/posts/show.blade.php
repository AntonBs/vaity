@extends('layouts/layout')
@section('content')
    <div class="container-post">



            <div class="post-index-show">
                <div class="post-title"><h2>{{ $post->title }}</h2></div>
                <div class="post-article">

                    <div >{!! $post->article !!} </div>

                    {{--                    <div class="card-author">Автор: {{ $post->name }}</div>--}}
                    {{--                    <a href="{{ route('post.show', $post) }}" class="btn btn-outline-primary">Посмотреть пост</a>--}}
                </div>
            </div>




    </div>
@endsection

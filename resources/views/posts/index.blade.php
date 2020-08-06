@extends('layouts/layout')
@section('content')
    <article class="container-post">
        @foreach ($posts as $post)



{{--            <div >{{$post->title}}</div>--}}
{{--            <div >{!! $post->article !!} </div>--}}
{{--            <div class="post-img" style="background-image: url({{ $post->img }})"></div>--}}
            <div class="post-index">
                <div class="post-title"><h2>{{ $post->title }}</h2></div>
                <div class="post-article">
                    <div class="post-img" style="background-image: url({{ $post->img }})"></div>
{{--                    <div >{!! $post->article !!} </div>--}}

{{--                    <div class="card-author">Автор: {{ $post->name }}</div>--}}
                    <a href="{{ route('post.show',['id'=>$post->post_id]) }}" class="btn">Посмотреть пост</a>
                </div>
            </div>




        @endforeach
    </article>
@endsection

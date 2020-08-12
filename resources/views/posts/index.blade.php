@extends('layouts/layout')
@section('content')
    @foreach ($posts as $post)

        <article class="article-index">
            <h1>{{ $post->title }}</h1>
            <div class="post-author">
                <h3 class="post-author-name">{{$post->name}}</h3>
                <p class="post-author-date">{{$post->created_at->format('d.m.y')}}</p>
            </div>
            <img  src="{{$post->img}}">

            <p>{{$post->description}}</p>
            <a class="main-button" href="{{ route('post.show',['id'=>$post->post_id]) }}" >Читать далее...</a>

        </article>

    @endforeach
@endsection

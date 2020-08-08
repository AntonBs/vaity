@extends('layouts/layout')
@section('content')
    @foreach ($posts as $post)

        <article class="article-index">
            <div class="article-post">
            <h2 class="post-title">{{ $post->title }}</h2>
             <div class="post-author">
                 <h3 class="post-author-name">{{$post->name}}</h3>
                  <p class="post-author-date">{{$post->created_at->format('d.m.y')}}</p>
             </div>
            <img  src="{{$post->img}}">

            <p class="post-description">{{$post->description}}</p>
            </div>
            <button name="see-post" type="button"><a href="{{ route('post.show',['id'=>$post->post_id]) }}" >Читать далее...</a></button>

        </article>

    @endforeach
@endsection

@extends('layouts/layout')
@section('content')
    <div class="post-show">
    <article class="post-show">
        <h2>{{ $post->title }}</h2>
        <div class="post-author">
            <h3 class="post-author-name">{{$post->name}}</h3>
            <p class="post-author-date">{{$post->created_at->format('d.m.y')}}</p>
        </div>

        <img  src="{{$post->img}}">

        <p>{{$post->description}}</p>
        {!! $post->article !!}

    </article>

    <form action="{{ route('post.destroy', ['id'=>$post->post_id]) }}" method="post"
          onsubmit="if (confirm('Точно удалить?')) {return true} else {return false}">
        @csrf
        @method('DELETE')
        <div class="control-post-btn">
            <input type="submit" class="btn btn-outline-danger" value="Удалить">
            <a href="{{ route('post.edit',['id'=>$post->post_id]) }}" class="btn btn-outline-primary">Редактировать пост</a>
            <a href="{{ route('post.index')}}" class="btn btn-outline-primary">На главную</a>
        </div>
    </form>
    </div>
@endsection

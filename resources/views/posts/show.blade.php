@extends('layouts/layout')
@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <img  src="{{$post->img}}">

        <p>{{$post->description}}</p>
        {!! $post->article !!}

    </article>

                <form action="{{ route('post.destroy', ['id'=>$post->post_id]) }}" method="post"
                      onsubmit="if (confirm('Точно удалить?')) {return true} else {return false}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="main-button" value="Удалить" style="cursor: pointer">
                    <a href="{{ route('post.edit',['id'=>$post->post_id]) }}" class="main-button">Редактировать пост</a>
{{--                    <a href="{{ route('post.index')}}" class="btn btn-outline-primary">На главную</a>--}}
                </form>

@endsection

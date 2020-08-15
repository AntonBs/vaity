@extends('layouts/layout')
@section('content')
    <article class="br-n">
        <h1>{{ $post->title }}</h1>
        <p class="author"><a href="#">{{$post->name}}</a>, {{$post->created_at}}</p>
        <img src="{{$post->img}}">
        <p>{{$post->description}}</p>
        {!! $post->article !!}
    </article>
    @auth
        @if(Auth::user()->id == $post->author_id)
    <form action="{{ route('post.destroy', ['id'=>$post->post_id]) }}" method="post"
          onsubmit="if (confirm('Точно удалить?')) {return true} else {return false}">
        @csrf
        @method('DELETE')
        <a href="{{ route('post.edit',['id'=>$post->post_id]) }}" class="btn mb-3 d-block btn-outline-secondary br-a">Редактировать пост</a>
        <input type="submit" class="btn btn-danger d-block mb-2 bri" value="Удалить">
    </form>
        @endif
    @endauth
@endsection

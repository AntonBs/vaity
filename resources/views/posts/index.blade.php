@extends('layouts/layout')
@section('content')

    @if(isset($_GET['search']))
        @if(count($posts)>0)
            <h2>Результаты поиска по запросу "<?=htmlspecialchars($_GET['search']) ?>"</h2>
            <p class="lead">Всего найдено {{ count($posts) }}</p>
        @else
            <h2>По запросу "<?=htmlspecialchars($_GET['search']) ?>" ничего не найдено</h2>
            <a href="{{route('post.index')}}" class="btn btn-outline-primary sa-4">Ко всем статьям</a>
        @endif
    @endif

    @foreach ($posts as $post)

        <article>
{{--           $post->created_at->diffForHumans()--}}
            <h1><a href="{{ route('post.show',['id'=>$post->post_id]) }}" class="ah-1">{{ $post->title }}</a></h1>
            <p class="author"><a href="{{route('post.index',['search'=>$post->name])}}">{{$post->name}}</a>, {{$post->created_at->format('d.m.y h:i')}}</p>
            <a href="{{ route('post.show',['id'=>$post->post_id]) }}"><img src="{{$post->img}}" alt=""></a>
            <p>{{$post->description}}</p>
            <a class="btn btn-outline-primary btn-lg btn-index" href="{{ route('post.show',['id'=>$post->post_id]) }}" >Читать далее...</a>

        </article>
    @endforeach
    @if(!isset($_GET['search']))
        {{$posts->links()}}
    @endif
@endsection


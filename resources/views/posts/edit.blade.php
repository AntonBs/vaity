@extends('layouts/layout')
@section('content')

    <form action="{{route('post.update',['id'=>$post->post_id])}}" class="form-article" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('layouts/form')
    </form>
@endsection

@extends('layouts/layout')
@section('content')

    <form action="{{route('post.store')}}" class="form-article" method="post" enctype="multipart/form-data">
        @csrf
        @include('layouts/form')
    </form>
@endsection

@extends('layouts.main')
@section('content')
  <div class="list-group">
    @foreach($posts as $post)
    <a href="{{route('post.show', $post->id)}}" class="list-group-item list-group-item-action">{{ $post->title }}</a>
    @endforeach
  </div>
  <div class="mt-3">
    {{$posts->links()}}
  </div>
  <div>
    <div><a class="btn btn-primary mt-4" href="{{route('post.create')}}">Create</a></div>
  </div>
@endsection
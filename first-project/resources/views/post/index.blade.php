@extends('layouts.main')
@section('content')
<div>
  @foreach($posts as $key => $post)
    <div><a href="{{route('post.show', $post->id)}}">{{ $key+1 }}. {{ $post->title }}</a></div>
  @endforeach
  <div><a class="btn btn-primary mt-4" href="{{route('post.create')}}">Create</a></div>
</div>
@endsection
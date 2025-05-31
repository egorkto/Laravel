@extends('layouts.main')
@section('content')
  <div>{{ $post->id }}. {{ $post->title }}</div>
  <div>{{ $post->content }}</div>
  <div class="mt-4">
    <a class="btn btn-primary" href="{{route('post.edit', $post->id)}}">Edit</a>
    <a class="btn btn-primary" href="{{route('posts.index')}}">Back</a>
    <form class="mt-3" action="{{route('post.destroy', $post->id)}}" method="post">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-danger">Delete</a>
    </form>
  </div>
@endsection
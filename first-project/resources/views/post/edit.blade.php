@extends('layouts.main')
@section('content')
  <form action="{{ route('post.update', $post->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea type="text" class="form-control" id="content" name="content">{{$post->content}}</textarea>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" class="form-control" id="file" name="file">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a class="btn btn-primary" href="{{route('post.show', $post->id)}}">Reset</a>
  </form>
@endsection
@extends('layouts.main')
@section('content')
  <form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea type="text" class="form-control" id="content" name="content"></textarea>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" class="form-control" id="file" name="file">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a class="btn btn-primary" href="{{route('posts.index')}}">Reset</a>
  </form>
@endsection
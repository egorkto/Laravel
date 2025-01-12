@extends('layouts.main')
@section('content')
  <form action="{{ route('category.update', $category->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a class="btn btn-primary" href="{{route('categories.index')}}">Reset</a>
  </form>
@endsection
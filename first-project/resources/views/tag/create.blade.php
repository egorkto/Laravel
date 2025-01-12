@extends('layouts.main')
@section('content')
  <form action="{{ route('tag.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a class="btn btn-primary" href="{{route('tags.index')}}">Reset</a>
  </form>
@endsection
@extends('layouts.main')
@section('content')
  <form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">

      @error('title') 
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea type="text" class="form-control" id="content" name="content">{{old('content')}}</textarea>
      @error('content') 
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" class="form-control" id="file" name="file">
      @error('image') 
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <label for="category" class="form-label">Category</label>
    <select class="form-select mb-3" aria-label="category" name="category_id">
      @foreach($categories as $category)
        <option {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
      @endforeach
    </select>
    <label for="category" class="form-label">Tags</label>
    <div class="mb-3">
      <input type="hidden" name="tag_ids">
      @foreach($tags as $tag)
        <input type="checkbox" class="btn-check" id="btn-check-{{$tag->id}}" name="tag_ids[]" autocomplete="off" value="{{$tag->id}}">
        <label class="btn" for="btn-check-{{$tag->id}}">{{ $tag->title }}</label>
      @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a class="btn btn-primary" href="{{route('posts.index')}}">Reset</a>
  </form>
@endsection
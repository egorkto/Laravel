@extends('layouts.main')
@section('content')
<div>
  <ul class="list-group">
    
    @foreach($tags as $tag)
    <li class="list-group-item">
        <div class="row justify-content-between">
          <div class="col-4 text-start">
            <p>{{$tag->title}}</p>
          </div>
          <div class="col-4 d-flex flex-row-reverse">
            <form class="mx-2" action="{{route('tag.destroy', $tag->id)}}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-danger">Delete</button>
            </form>
            <a class="btn btn-primary" href="{{route('tag.edit', $tag->id)}}">Edit</a>
          </div>
        </div>
      </li>
    @endforeach
  </ul>
  <div><a class="btn btn-primary mt-4" href="{{route('tag.create')}}">Create</a></div>
</div>
@endsection
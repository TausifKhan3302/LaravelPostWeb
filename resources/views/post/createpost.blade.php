@extends('post.layout')

@section('title')
    Create-post
@endsection


@section('form')
<form action="{{route('post.store')}}" method="post" class="p-3 d-flex justify-content-center align-items-center flex-column shadow" enctype="multipart/form-data">
    @csrf
<h2 class="mb-4">Create-post</h2>

<div class="mb-3">
  <input type="file" class="form-control" name="image" aria-describedby="emailHelp" placeholder="Upload image" value="{{old('image')}}">
  @error('image')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>


<div class="mb-3">
  <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Title" value="{{old('title')}}">
  @error('title')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

<div class="mb-3">
<textarea name="description" id="" cols="48" rows="1" value="{{old('description')}}" placeholder="Description"></textarea>
    @error('description')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

    <button class="btn btn-danger mt-2">
        Create
    </button>
</form>
@endsection
@extends('layout.app')

@section('title')
    Update-post
@endsection


@section('form')
<form action="{{route('post.update',Auth::user()->id)}}" method="post" class="p-3 d-flex justify-content-center align-items-center bg-dark flex-column shadow rounded m-auto" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h2 class="mb-4 text-light">Update-post</h2>
    
    @foreach ($posts as $post)

<div class="mb-3">
  <input type="file" class="form-control" name="image" aria-describedby="emailHelp" placeholder="Upload image" onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])" class="mb-2" >
  <img class="card-img-top"  src="{{asset('/storage/'.$post->image)}}" alt="Card image cap" style=" height:25rem" id="image">

  @error('image')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>


<div class="mb-3">
  <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Title" value="{{$post->title}}">
  @error('title')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

<div class="mb-3">
<input type="text" name="description" value="{{$post->description}}" class="border border-2 border-danger rounded p-2">
    @error('description')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>


    <button class="btn btn-danger mt-2">
        Update
    </button>
    @endforeach
</form>

@endsection

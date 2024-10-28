@extends('layout.app')

@section('content')
    
<div class="container-fluid h-100 w-100 d-flex gap-4 p-5 flex-wrap">
@foreach ($posts as $post)
    

    <div class="card mt-4 m-auto" style="width: 50rem;">
      <img class="card-img-top"  src="{{asset('/storage/'.$post->image)}}" alt="Card image cap" style=" height:30rem">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->description}}</p>
        <a href="{{route('dashboard')}}" class="btn btn-outline-info w-25">Back</a>
          </div>
    </div>
    @endforeach
  </div> 
@endsection   

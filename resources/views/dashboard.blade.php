@extends('layout.app')



{{-- all-content --}}
@section('content')
<div class="container search" id="search">
  <form action="{{route('search')}}" method="get">
      <input type="search" class="w-50 border border-2 border-danger rounded p-2 font-bold" value="{{@$search}}" name="search">
      <button type="submit" class="border border-2 border-danger rounded p-2 text-bg-dark font-bold">Search</button>
    </form>
    </div>

    @if (isset($posts) && $posts->isNotEmpty())
    <div class="container-fluid d-flex gap-4 p-5 pt-1 flex-wrap">
      @foreach ($posts as $post)
      <div class="card mt-4 shadow" style="width: 21rem;">
        <img class="card-img-top" src="{{asset('/storage/'.$post->image)}}" alt="Card image cap" style="height:30vh">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->description}}</p>
          <a href="{{route('post.show',$post->id)}}" class="btn btn-outline-info">View-Post</a>

        

@can('update', $post)
<a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-warning">Update</a>
@endcan          
          
@can('delete', $post)
<form action="{{route('post.destroy',$post->id)}}" method="post">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-outline-danger post-delete">Delete</button>
</form>
@endcan    
        </div>
      </div>
      @endforeach
    </div>
    
    @else
   <h4 class="searchNoResul">No results found</h4>
  
    @endif
        

    <form action="{{ route('contact.send') }}" method="post" class="h-75 w-100 p-5 m-auto bg-dark border rounded container" id="contect">
      @csrf
      <h1 class="text-danger text-center">Contect me</h1>
      <input type="text" name="name" placeholder="Name" class="p-2 border border-2 rounded w-75  m-1 border-danger">
      @error('name')
          <div class="alert alert-danger">
            {{$message}}
          </div>
      @enderror
      <input type="text" name="email" placeholder="Email" class="p-2 border border-2 rounded w-75  m-1 border-danger">
      @error('email')
      <div class="alert alert-danger">
        {{$message}}
      </div>
  @enderror
      <input type="text" name="subject" placeholder="Subject" class="p-2 border border-2 rounded w-75  m-1 border-danger">
      @error('subject')
      <div class="alert alert-danger">
        {{$message}}
      </div>
  @enderror
      <textarea name="description" id="" cols="30" rows="1" class="p-2 border border-2 rounded w-75  m-1  border-danger" placeholder="Description"></textarea>
      @error('description')
      <div class="alert alert-danger">
        {{$message}}
      </div>
  @enderror
      <button type="submit" class="w-25 btn btn-outline-danger">Submit</button>
    </form>
@endsection




{{-- footer  --}}
@section('footer')

<div class="h-25 bg-dark p-5 mt-3">
  <div class="container-fluid d-flex align-content justify-content-center">
    <div class="footer-logo">
    <h1 class="text-white">Reader</h1>
    </div>
   <div class="f-one ms-5">
     <ul class="text-white ">
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>one</a></li>
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>two</a></li>
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>three</a></li>
     </ul>
    </div>
    <div class="f-two ms-5">
     <ul class="text-white">
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>one</a></li>
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>two</a></li>
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>three</a></li>
     </ul>
    </div>
    <div class="f-three ms-5">
     <ul class="text-white">
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>one</a></li>
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>two</a></li>
       <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>three</a></li>
     </ul>
    </div>
    <div class="f-four ms-5">
      <ul class="text-white">
        <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>one</a></li>
        <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>two</a></li>
        <li class="list-unstyled"><a href="" class='cursor-pointer text-decoration-none text-white'>three</a></li>
      </ul>
    </div>
    <div class="f-four ms-5">
      <h6><a href="#search" class='cursor-pointer text-decoration-none text-danger'>Navbar</a></h6>
  </div>
  </div>
 </div>
@endsection







@extends('layout.app')

{{-- @section('sidebar')
<ul class="mt-3 ms-5">
    <h1 class="text-danger ms-1 mb-5">Admin</h1>
    <li><a href="{{route('post.index')}}" class="text-decoration-none text-danger ">Create-post</a></li>
</ul> --}}
{{-- @endsection --}}


@section('form')
<div class="container-fluid m-0 d-flex flex-row ">
    <div class="bg-dark sidebar">
        <ul class="mt-3 ms-5">
            <h1 class="text-danger ms-1 mb-5">Admin</h1>
            <li><a href="{{route('post.create')}}" class="text-decoration-none text-danger ">Create-post</a></li>
            <li class="mt-3"><a href="{{route('userCrud')}}" class="text-decoration-none text-danger ">User-Data</a></li>
        </ul>
      </div>
<form action="{{route('profile')}}" method="post" class="p-3 d-flex justify-content-center align-items-center flex-column shadow admin-data">
    @csrf

<div class="mb-3">
  <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{Auth::user()->name}}">
  @error('name')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

<div class="mb-3">
  <input type="text" class="form-control" name="email" aria-describedby="emailHelp" value="{{Auth::user()->email}}" disabled>
</div>  

    <button class="btn btn-danger mt-3 shadow">
        Update
    </button>
</form>
@endsection
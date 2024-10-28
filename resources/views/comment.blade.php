@extends('layout.app')

{{-- @if (session('error'))
<div class="alert alert-success" role="alert">
{{session('error')}}  
</div>
@endif
@if (session('success'))
<div class="alert alert-success" role="alert">
 {{session('success')}}
</div>
@endif --}}

  {{-- comment  --}}
    @section('content')
    <div class="contrainer w-100 h-100 p-5 comment-container">
    <div class="contrainer w-50 h-50 p-5 bg-dark m-auto mt-5 opacity-75">
        @foreach ($comments as $comment)
        <div class="contrainer w-100 rounded h-50 bg-light m-auto p-2 mt-1">  
            <h5 class="text-danger" >{{$comment->user->role}}</h5>
            <h5>Title : {{$comment->title}}</h5>
            <h6>Description : {{$comment->description}}</h6>
        </div>
        @endforeach
        <form action="{{route('comment')}}" method="post" class="m-auto d-flex justify-content-center align-items-center flex-column">
            @csrf

            <input type="text" name="title" placeholder="Title" value="{{old('title')}}" class="w-75 p-2 rounded border border-2 border-danger m-1">
            @error('title')
            <div class="alert alert-danger" role="alert">
             {{$message}}
            </div>
            @enderror

            <input type="text" name="description" placeholder="Description" value="{{old('description')}}" class="w-75 p-2 rounded border border-2 border-danger m-1">
            @error('description')
            <div class="alert alert-danger" role="alert">
             {{$message}}
            </div>
            @enderror

            <button type="submit" class="p-2 w-25 btn btn-outline-danger mt-3">Submit</button>
        </form>
    </div>
    </div>
    @endsection

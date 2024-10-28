@extends('layout.app')

@section('content')
    <form action="{{route('singleUpdate',Auth::user()->id)}}" method="post" class="w-50 h-25 d-flex flex-column justify-content-center align-items-center bg-dark p-3  rounded-2 shadow-lg singleUpdateForm">
        
        @csrf
        <h1 class="text-light">Update-Data</h1>
        <input type="text" name="name" placeholder="UserName" class="p-2 w-100 border border-2 rounded border-danger text-light bg-dark
        m-1" value="{{Auth::user()->name}}">
        <input type="text" name="email" placeholder="Email" disabled value="{{Auth::user()->email}}" class="p-2 w-100 border border-2 rounded border-danger text-light bg-dark
        m-1">
      <button class="btn btn-outline-danger w-100">Update</button>   
    </form>
@endsection
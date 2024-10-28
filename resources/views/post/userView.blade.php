@extends('layout.app')

@section('content')
<div class="container p-6 ">
    <div class="container p-4 w-50 h-75 bg-dark shadow border rounded m-auto mt-5">
       <h1 class="text-danger text-center m-1">User Data</h1>
       <h3 class="text-light m-2">Id : {{$users->id}}</h3>
       <h3 class="text-light m-2">Name   - {{$users->name}}</h3>
       <h3 class="text-light m-2">Email  - {{$users->email}}</h3>
       <a href="{{route('userCrud')}}" class="btn btn-outline-danger">Back</a>
    </div>
   </div>
@endsection
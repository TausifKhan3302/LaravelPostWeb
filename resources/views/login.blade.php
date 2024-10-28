@extends('layout.layout')

@section('title')
Login
@endsection


@section('form')
<div class="container-fluid d-flex justify-content-center align-items-center p-5">
<form action="{{route('login')}}" method="post" class="p-4 d-flex justify-content-center align-items-center flex-column shadow login-form ">
    @csrf
<h2 class="mb-2">Login</h2>

<div class="form-row">
  <div class="form-group m-2">
  <input type="text" class="form-control m-auto col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border border-1 border-warning rounded" name="email" placeholder="Email" value="{{old('email')}}">
  @error('email')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

<div class="form-row">
  <div class="form-group m-2">
  <input type="password" class="form-control m-auto col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border border-1 border-warning rounded" name="password" placeholder="password" value="{{old('password')}}">
  @error('password')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

   <div class="container">
    <button class="btn btn-warning">
      Login 
  </button>
  <a href="{{route('register')}}" class="register-link">Register here</a>
   </div>
  </form>
</div>
@endsection
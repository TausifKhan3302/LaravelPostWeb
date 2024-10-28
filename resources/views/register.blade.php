@extends('layout.layout')

@section('title')
    Register
@endsection


@section('form')
<div class="container-fluid d-flex justify-content-center align-items-center p-5">
  <form action="{{route('register')}}" method="post" class="p-1 d-flex justify-content-center align-items-center flex-column shadow register m-auto border border-2 border-success">
    @csrf
<h2 class="mb-4">Register</h2>

  <div class="form-row">
    <div class="form-group m-2">
  <input type="text" class="form-control m-auto border border-1 border-success rounded col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="name"  placeholder="Name"  value="{{ old('name') }}">
  @error('name')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

<div class="form-group m-2">
  <input type="text" class="form-control m-auto border border-1 border-success rounded col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="email"  placeholder="Email" value="{{ old('email') }}">
  @error('email')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

<div class="form-group m-2">
  <input type="password" class="form-control m-auto border border-1 border-success rounded col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="password"  placeholder="password" value="{{ old('password') }}">
  @error('password')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

<div class="form-group m-2">
  <input type="password" class="form-control m-auto border border-1 border-success rounded col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="password_confirmation"  placeholder="Confirme Password" value="{{ old('password_confirmation') }}">
  @error('password_confirmation')
  <div class="alert alert-danger" role="alert">
   {{$message}}
  </div>
  @enderror
</div>

<div class="container">
  <button class="btn btn-success">
    Register 
</button>
<a href="{{route('login')}}" class="register-link">Login here</a>
 </div>
</form>

@endsection
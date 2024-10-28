<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
<style>
 
</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top" id="navbar">
      <div class="container-fluid">
        <a class="navbar-brand text-light ms-3" href="#">Reader </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{route('comment')}}">Comments</a>
            </li>
          </ul>
        </div>
        <div class="btn-group dropstart me-4">
          <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </button>
          <ul class="dropdown-menu">
           
          @can('profile')
          <li><button class="dropdown-item" type="button"><a class="text-decoration-none text-black" href="{{route('profile')}}">View Profile</a></button></li>
          @else
          <li><button class="dropdown-item" type="button"><a class="text-decoration-none text-black" href="{{route('userProfile',Auth::user()->id)}}">View Profile</a></button></li>
          @endcan
          
            <li><button class="dropdown-item" type="button"><a class="text-decoration-none text-black" href="{{route('logout')}}">Logout</a></button></li>
          </ul>
        </div>
      </div>
    </nav>

  {{-- searchbar  --}}
  @yield('search')
         {{-- error  --}}
         @if (session('error'))
         <div class="alert alert-success" role="alert">
         {{session('error')}}  
        </div>
         @endif
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{session('success')}}
        </div>
        @endif

  {{-- all-content   --}}
  @yield('content')
  
      <div class="container-fluid mt-3">


        {{-- form  --}}
       @yield('form')
      </div>
  </div>

  {{-- comment  --}}
  @yield('comment')

 {{-- footer  --}}
 @yield('footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
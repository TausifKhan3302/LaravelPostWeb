<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>
        form{
            border-radius: 10px;
            margin-top: 10rem;
        }
       .mb-3 input ,.mb-3 textarea{
            border: 1px solid red;
            margin: 3px;
            width: 25vw;
            padding: 10px;
            border-radius: 7px;
            cursor: pointer;
            filter: drop-shadow(1px 1px 1px black)
        }
    </style>

  </head>
  <body>

    <div class="container d-flex justify-content-center align-items-center flex-column">
      <div class="container">
        @session('error')
        <div class="alert alert-danger" role="alert">
          {{session('error')}}
         </div>
        @endsession
       </div>
              @yield('form')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
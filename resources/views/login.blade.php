<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>{{$title}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    {{-- <link href="signin.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/singin.css')}}">
  </head>
  <body class="text-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded text-center">
                    <div class="card-body">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                        <form class="form-signin" action="/actionlogin" method="POST" class="row">
                            @csrf
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus autocomplete="off">
                            <input type="password" id="inputPassword" name="password" class="form-control mt-3" placeholder="Password" required>

                            <button class="btn btn-lg btn-outline-info btn-block mt-4" type="submit">Sign in</button>
                            <br>
                            <a class="btn btn-primary" href="/" role="button">Kembali</a>
                            <p class="mt-5 mb-3 text-muted">Time: {{now()}}</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

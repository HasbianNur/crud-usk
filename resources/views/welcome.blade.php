<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/index.css">
  </head>
  <body>
    <div class="card mb-3">
      <img src="/img/beranda4.jpeg" class="card-img-top" alt="...">
      <nav class="navbar navbar-expand-lg navbar-dark navbar-light bg-primary sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand">XII RPL</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house-fill"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login"><i class="bi bi-box-arrow-in-right"></i></a>
              </li>
              @can('isAdmin')
              <li class="nav-item">
                <a class="nav-link" href="home"><i class="bi bi-server"></i></a>
              </li>
              @endcan
            </ul>
          </div>
        </div>
      </nav>
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">
          <table class="table table-bordered mt-1">
            <thead>
                <tr class="text-center">
                    <th scope="col">Judul</th>
                    <th scope="col">Isi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{!! $post->content  !!}</td>
                    <td class="text-center">{{ $post->status == 0 ? 'Draft':'Publish' }}</td>
                    <td class="text-center">{{ $post->created_at->format('d-m-Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </p>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        window.onscroll = function() {myFunction()};
        
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;
        
        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
          } else {
            navbar.classList.remove("sticky");
          }
        }
        </script>
  </body>
</html>
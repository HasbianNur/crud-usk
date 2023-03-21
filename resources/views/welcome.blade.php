<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/index.css">
  </head>
  <body>
    <div class="header">
        <img src="/img/beranda4.jpeg" alt="">
      </div>
      
      <div id="navbar">
        <a class="active" href="javascript:void(0)"><i class="bi bi-house-fill"></i></a>
        <a href="login"><i class="bi bi-box-arrow-in-right"></i></a>
        <a href="javascript:void(0)"><i class="bi bi-person-rolodex"></i></a>
      </div>
      
      <div class="content">
        <br>
        <table class="table table-bordered mt-1">
            <thead>
                <tr class="text-center">
                    <th scope="col">Judul</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td class="text-center">{{ $post->title }}</td>
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
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
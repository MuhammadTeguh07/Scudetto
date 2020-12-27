<html lang=""><!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
  <title>Scudetto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="{{ asset('template/skaxis/layout/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body id="top">
<div class="bgded overlay light"> 
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="/home">Scudetto</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="/home">Home</a></li>
          <li><a class="drop" href="#">Katalog</a>
            <ul>
              @foreach($katalog as $k)
                @if($k->status_katalog == "0")
                  <li><a href="/pilihKatalog/{{ $k->id_katalog }}">{{ $k->nama_katalog }}</a></li>
                @endif
              @endforeach
            </ul>
          </li>
          <li><a class="drop" href="#">Portofolio</a>
            <ul>
              @foreach($katalog as $k)
                @if($k->status_katalog == "0")
                  <li><a href="/pilihKatalog/{{ $k->id_katalog }}">{{ $k->nama_katalog }}</a></li>
                @endif
              @endforeach
            </ul>
          </li>
          <li><a href="#">Tentang Kami</a></li>
        </ul>
      </nav>
    </header>
  </div>
</div>
<!-- Body -->
@yield('konten')

<!-- Footer -->
@include('layout/footer')
</body>
</html>
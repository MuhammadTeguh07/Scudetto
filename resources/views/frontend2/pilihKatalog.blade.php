@extends('frontend/sidebar')

@section('konten')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div id="gallery">
        <figure>
          <header class="heading">Gallery Title Goes Here</header>
          <ul class="nospace group overview">
            <div class="row">
              @foreach($produk as $p)
                @foreach($katalog2 as $k)
                  @if($p->id_katalog == $k->id_katalog)
                    <div class="col-2">
                      <a href="/pilihProduk/{{ $p->id_produk }}"><img id="{{ $p->id_produk }}" src="{{ asset($p->foto_produk) }}" style="height:170px;" alt=""></a>
                      <p><b><center>Rp.{{ $p->harga_produk }}</center></b></p>
                    </div>
                  @endif
                @endforeach
              @endforeach
            </div>
          </ul>
        </figure>
      </div>
      <nav class="pagination" style="margin-left:25%;">
        <ul>
          <li><a href="#">« Previous</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><strong>…</strong></li>
          <li><a href="#">6</a></li>
          <li class="current"><strong>7</strong></li>
          <li><a href="#">8</a></li>
          <li><a href="#">9</a></li>
          <li><strong>…</strong></li>
          <li><a href="#">14</a></li>
          <li><a href="#">15</a></li>
          <li><a href="#">Next »</a></li>
        </ul>
      </nav>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
@endsection
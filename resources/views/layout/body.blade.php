@extends('layout/sidebar')

@section('konten')
<div id="pageintro" class="hoc clear" style="max-width:inherit;"> 
  <img src="{{ asset('template/skaxis/images/demo/gallery/01.png') }}" alt="" style="width:100%; height:40%;">
</div>
<div class="wrapper">
  <div class="hoc clear"> 
    <figure id="introblocks">
      <ul class="nospace group">
        <li class="one_third first"><a href="#"><img src="{{ asset('template/skaxis/images/demo/320x240.png') }}" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="{{ asset('template/skaxis/images/demo/320x240.png') }}" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="{{ asset('template/skaxis/images/demo/320x240.png') }}" alt=""></a></li>
      </ul>
    </figure>
    <p class="center"><a class="btn" href="#">Per conubia nostra</a></p>
    <div class="wrapper row3">
      <main class="hoc container clear">
        <article class="group btmspace-80">
          <div class="two_third first"><img class="borderedbox inspace-10" src="{{ asset('template/skaxis/images/demo/660x360.png') }}" alt=""></div>
          <div class="one_third">
            <h6 class="heading">Per inceptos himenaeos donec lacinia mollis vel</h6>
            <ul class="nospace meta">
              <li><i class="fa fa-user"></i> <a href="#">Admin</a></li>
              <li><i class="fa fa-tag"></i> <a href="#">Tag Name</a></li>
            </ul>
            <p>Aliquam mauris morbi tristique orci sit amet sapien tincidunt ut rutrum dui tincidunt.</p>
            <p class="btmspace-30">Cras eget lacinia magna nunc ut est est cras aliquam erat sem at dapibus lorem luctus sed nunc sagittis leo in…</p>
            <footer class="nospace"><a class="btn" href="#">Full Story »</a></footer>
          </div>
        </article>
        <hr class="btmspace-80">
        <ul class="nospace group overview">
          @foreach($katalog as $k)
            @if($k->status_katalog == "0")
              <li class="one_third">
                <article><a href="/pilihKatalog/{{ $k->id_katalog }}"><img src="{{ asset($k->foto_katalog) }}" id="{{ $k->id_katalog }}" style="width:300px; height:250px;" alt=""></a></article>
              </li>
            @endif
          @endforeach
        </ul>
      </main>
    </div>
  </div>
</div>
@endsection
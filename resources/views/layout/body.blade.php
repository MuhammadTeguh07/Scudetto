<div class="wrapper">
  <div class="hoc clear"> 
    <figure id="introblocks">
      <ul class="nospace group overview">
        @foreach($katalog as $k)
          <li class="one_third">
            <article><a href="#"><img src="{{ asset($k->foto_katalog) }}" id="{{ $k->id_katalog }}" alt="" style="width:300px; height:300px;"></a>
              <h6 class="heading"><b>{{ $k->nama_katalog }}</b></h6>
              <footer class="nospace" style="margin-top:10px;"><a class="btn" href="#">Full Story »</a></footer>
            </article>
          </li>
        @endforeach
      </ul>
    </figure>
  </div>
</div>
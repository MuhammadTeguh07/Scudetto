<html lang=""><!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
  <title>Scudetto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="{{ asset('template/skaxis/layout/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="bgded overlay light" style="background-image:url('template/skaxis/images/demo/backgrounds/01.png');"> 
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="index.html">Skaxis</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="/home">Home</a></li>
          <li><a class="drop" href="#">Katalog</a>
            <ul>
              <li><a href="template/skaxis/pages/gallery.html">Sepak Bola</a></li>
              <li><a href="#">Futsal</a></li>
              <li><a href="#">Volly</a></li>
              <li><a href="#">Bulu Tangkis</a></li>
              <li><a href="#">Baket</a></li>
              <li><a href="#">Sepeda</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#">Portofolio</a>
            <ul>
              <li><a href="#">Sepak Bola</a></li>
              <li><a href="#">Futsal</a></li>
              <li><a href="#">Volly</a></li>
              <li><a href="#">Bulu Tangkis</a></li>
              <li><a href="#">Baket</a></li>
              <li><a href="#">Sepeda</a></li>
            </ul>
          </li>
          <li><a href="#">Tentang Kami</a></li>
        </ul>
      </nav>
    </header>
  </div>
  <div id="pageintro" class="hoc clear" style="max-width:inherit;"> 
    <div class="flexslider basicslider">
      <div class="flex-viewport" style="overflow: hidden; position: relative; height: 15px;">
        <ul class="slides" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-1956px, 0px, 0px);">
          <li class="clone" aria-hidden="true" style="width: 978px; margin-right: 0px; float: left; display: block;">
            <article>
              <footer><a class="btn inverse" href="#">Litora torquent</a></footer>
            </article>
          </li>
          <li style="width: 978px; margin-right: 0px; float: left; display: block;" class="" data-thumb-alt="">
            <article>
              <p>Condimentum</p>
              <h3 class="heading">Ligula at fermentum</h3>
              <p>Sodales sapien donec porttitor dolor nec elit</p>
              <footer><a class="btn" href="#">Luctus suscipit in</a></footer>
            </article>
          </li>
          <li data-thumb-alt="" style="width: 978px; margin-right: 0px; float: left; display: block;" class="flex-active-slide">
            <article>
              <p>Laoreet</p>
              <h3 class="heading">Iaculis interdum</h3>
              <p>Nulla scelerisque posuere convallis</p>
              <footer>
                <form class="group" method="post" action="#">
                  <fieldset>
                    <legend>Sign-Up:</legend>
                    <input type="email" value="" placeholder="Email Here…">
                    <button class="fa fa-sign-in" type="submit" title="Submit"><em>Submit</em></button>
                  </fieldset>
                </form>
              </footer>
            </article>
          </li>
          <li data-thumb-alt="" style="width: 978px; margin-right: 0px; float: left; display: block;">
            <article>
              <p>Phasellus</p>
              <h3 class="heading">Bibendum blandit</h3>
              <p>Lacus non tincidunt class aptent taciti sociosqu</p>
              <footer><a class="btn inverse" href="#">Litora torquent</a></footer>
            </article>
          </li>
          <li style="width: 978px; margin-right: 0px; float: left; display: block;" class="clone" aria-hidden="true">
            <article>
              <p>Condimentum</p>
              <h3 class="heading">Ligula at fermentum</h3>
              <p>Sodales sapien donec porttitor dolor nec elit</p>
              <footer><a class="btn" href="#">Luctus suscipit in</a></footer>
            </article>
          </li>
        </ul>
      </div>
      <ol class="flex-control-nav flex-control-paging">
        <li><a href="#" class="">1</a></li>
        <li><a href="#" class="flex-active">2</a></li>
        <li><a href="#">3</a></li>
      </ol>
      <ul class="flex-direction-nav">
        <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li>
        <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- Body -->
@include('layout/body')

<!-- Footer -->
@include('layout/footer')
</body>
</html>
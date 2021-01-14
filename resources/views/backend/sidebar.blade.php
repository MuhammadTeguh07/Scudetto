<!doctype html>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ asset('template/gentela/production/index.html') }}" class="site_title"><i class="fa fa-paw"></i> <span>Scudetto</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if(\Session::has('laki'))
                                <img src="{{ asset('template/gentela/production/images/laki.png') }}" alt="..." class="img-circle profile_img">
                            @endif
                            @if(\Session::has('perempuan'))
                                <img src="{{ asset('template/gentela/production/images/perempuan.jpg') }}" alt="..." class="img-circle profile_img">
                            @endif
                        </div>
                        @if(\Session::has('nama'))
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>{{ Session::get('nama') }}</h2>
                            </div>
                        @endif
                    </div>
                    <!-- /menu profile quick info -->
                    <br>
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section active">
                            <ul class="nav side-menu" style="">
                                <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                                <li><a href="/pos"><i class="fa fa-shopping-cart"></i>Point Of Sales</a></li>
                                <br>
                                <h3>Data Master</h3> 
                                <li><a href="/user"><i class="fa fa-user"></i>User</a></li>
                                <li><a href="/katalog"><i class="fa fa-tags"></i>Katalog</a></li>
                                <li><a href="/kategori"><i class="fa fa-tag"></i>Kategori</a></li>
                                <li><a><i class="fa fa-briefcase"></i>Produk<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="block;">
                                        @foreach($katalog as $k)
                                            @if($k->status_katalog == "0")
                                                <li><a href="/produk/{{ $k->id_katalog }}">{{ $k->nama_katalog }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <br>
                                <h3>Data Transaksi</h3> 
                                <li><a href="/penjualan"><i class="fa fa-edit"></i>Penjualan</a></li>
                                <li><a href="#"><i class="fa fa-edit"></i>Pemesanan</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                
                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="" href="/logout" data-original-title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <!-- top navigation -->
                @include('backend/header')
            <!-- /top navigation -->
 
            <!-- page content -->
                @yield('konten')
            <!-- /page content -->

            <!-- footer content -->
                @include('backend/footer')
            <!-- /footer content -->
        </div>
    </div>
    <!-- Library Google Platform -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>
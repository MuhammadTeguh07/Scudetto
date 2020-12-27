<!doctype html> 
@extends('admin/sidebar')

@section('konten')
<div class="right_col" role="main" style="min-height: 1000px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h1>Data Produk Sepak Bola</h1>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Modal Insert-->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Tambah Produk</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/sepakbola/insert" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Kategori <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <select name="kategori" required class="form-control mb-3 mb-3">
                                        @foreach($kategori as $k)
                                            @if($k->status_kategori == "0")
                                                @if($k->id_katalog == "KTLG-002")
                                                    <option id="{{ $k->id_kategori }}" value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Nama <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="nama" name="nama" required placeholder="Masukkan Nama" class="form-control col-md-7 col-xs-12">
                                    <input type="hidden" id="tanggal" readonly name="tanggal" style="font-size:20px; font-size:20px; margin-left:400px; margin-top:10px; background:none; outline:none; border:none;">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Harga <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="number" id="harga" name="harga" required placeholder="Masukkan Harga" class="form-control col-md-7 col-xs-12">
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Stok <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-left:50px;">
                                    <input type="number" id="stok" name="stok" required placeholder="Masukkan Stok" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Ukuran <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="ukuran" required name="ukuran" placeholder="Masukkan Ukuran" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Keterangan </label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Status <span class="required">*</span></label>
                                <div class="col-md-4" style="margin-left:60px;">
                                    <select name="status" required class="form-control mb-3 mb-3">
                                        <option value="0">Aktif</option>
                                        <option value="1">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Foto <span class="required">*</span></label>
                                <div class="col-md-9" style="margin-left:60px; margin-top:5px;">
                                    <input type="file" id="foto" name="foto" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Foto -->
        @foreach($produk as $p)
        <div class="modal fade" id="foto{{$p -> id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="text-align:-webkit-center;" role="document">
                <div class="modal-content" style="width:350px;">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Foto {{ $p->nama_produk }}</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="item form-group" style="text-align:center;">
                            <img src="{{ asset($p->foto_produk) }}" style="width:250px; height:250px;">
                        </div>
                        <div class="item form-group" style="text-align:center;">
                            <h2>{{ $p->keterangan_produk }}</h2>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Modal Edit-->
        @foreach($produk as $p)
        <div class="modal fade" id="edit{{$p -> id_produk}}" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Edit Produk</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/sepakbola/edit/{{ $p->id_produk }}" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >ID Produk <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="ID" name="ID" value="{{ $p->id_produk }}" readonly class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Kategori <span class="required">*</span></label>
                                <div class="col-md-9" style="margin-left:60px;">
                                    <select name="kategori"  selected value="{{ $p->id_kategori }}" required class="form-control mb-3 mb-3">
                                    @foreach($kategori as $k)
                                        @if($k->status_kategori == "0")
                                            <option name="kategori" value="{{ $k->id_kategori }}" 
                                                @if($k->id_kategori === $p->id_kategori)
                                                    selected 
                                                @endif 
                                                    id="{{ $k->id_kategori }}">{{ $k->nama_kategori }}
                                            </option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Nama <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="nama" name="nama" value="{{ $p->nama_produk }}" onfocus="select()" required placeholder="Masukkan Nama" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Harga <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="number" id="harga" name="harga" value="{{ $p->harga_produk }}" onfocus="select()" required placeholder="Masukkan Harga" class="form-control col-md-7 col-xs-12">
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Stok <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-left:50px;">
                                    <input type="number" id="stok" name="stok" value="{{ $p->stok_produk }}" onfocus="select()" required placeholder="Masukkan Stok" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Ukuran <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="ukuran" name="ukuran" value="{{ $p->ukuran_produk }}" required onfocus="select()" placeholder="Masukkan Ukuran" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Keterangan </label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="keterangan" name="keterangan" value="{{ $p->keterangan_produk }}" onfocus="select()" placeholder="Masukkan Keterangan" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Status <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="status" required class="form-control mb-3 mb-3">
                                        @if($p->status_produk == "0")
                                            <option selected value="0">Aktif</option>
                                            <option value="1">Tidak Aktif</option>
                                        @else
                                            <option value="0">Aktif</option>
                                            <option selected value="1">Tidak Aktif</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Foto Baru <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px; margin-top:5px;">
                                    <input type="file" id="foto" name="foto">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Foto <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px; margin-top:5px;">
                                    <img src="{{ asset($p->foto_produk) }}" name="foto2" style="width:250px; height:250px;">
                                    <input type="hidden" value="{{$p->foto_produk}}" name="foto2">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                                Tambah Produk
                            </button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if ($message = Session::get('insert'))
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('edit'))
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                <th class="sorting_asc" ><center>ID PRODUK</center></th>
                                                    <th class="sorting" ><center>ID KATEGORI</center></th>
                                                    <th class="sorting" ><center>NAMA</center></th>
                                                    <th class="sorting" ><center>HARGA</center></th>
                                                    <th class="sorting" ><center>STOK</center></th>
                                                    <th class="sorting" ><center>UKURAN</center></th>
                                                    <th class="sorting" ><center>STATUS</center></th>
                                                    <th class="sorting" ><center>AKSI</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>    
                                                @foreach($produk as $p)
                                                @if($p->id_katalog == "KTLG-002")
                                                <tr role="row" class="odd" style="text-align:center;">
                                                    <td class="sorting_1">{{ $p->id_produk }}</td>
                                                    <td>{{ $p->id_kategori }}</td>
                                                    <td>{{ $p->nama_produk }}</td>
                                                    <td>Rp.{{ $p->harga_produk }}</td>
                                                    <td>{{ $p->stok_produk }}</td>
                                                    <td>{{ $p->ukuran_produk }}</td>
                                                    <td>
                                                        @if($p->status_produk == "0")
                                                            Aktif
                                                        @else
                                                            Tidak Aktif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" href="#foto{{$p -> id_produk}}"><button type="button" class="btn btn-info"><i class="fa fa-picture-o" style="margin-right:5px;"></i>Foto</button>
                                                        <a data-toggle="modal" href="#edit{{$p -> id_produk}}"><button type="button" class="btn btn-warning"><i class="fa fa-edit" style="margin-right:5px;"></i>Edit</button>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var bulan = new Array('01','02','03','04','05','06','07','08','09','10','11','12');  
    var now;
    var day = new Date();
    now = day.getFullYear()+"-"+bulan[day.getMonth()]+"-"+day.getDate();
    document.getElementById('tanggal').value = now;
</script>
@endsection
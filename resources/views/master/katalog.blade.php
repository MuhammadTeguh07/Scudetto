<!doctype html>  
@extends('backend/sidebar')

@section('konten')
<div class="right_col" role="main" style="min-height: 1000px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h1>Data Katalog</h1>
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
        <!-- Modal Insert -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Tambah Katalog</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/katalog/insert" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Nama <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="nama" name="nama" required placeholder="Masukkan Nama" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Status <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="status" required class="form-control mb-3 mb-3">
                                        <option value="0">Aktif</option>
                                        <option value="1">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Foto <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px; margin-top:5px;">
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
        @foreach($katalog as $k)
        <div class="modal fade" id="foto{{$k -> id_katalog}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="text-align:-webkit-center;" role="document">
                <div class="modal-content" style="width:350px;">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Foto {{ $k->nama_katalog }}</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="item form-group" style="text-align:center;">
                            <img src="{{ asset($k->foto_katalog) }}" style="width:250px; height:250px;">
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
        @foreach($katalog as $k)
        <div class="modal fade" id="edit{{$k -> id_katalog}}" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Edit Kategori</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/katalog/edit/{{ $k->id_katalog }}" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >ID User <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="ID" name="ID" value="{{ $k->id_katalog }}" readonly class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Nama <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="nama" name="nama" value="{{ $k->nama_katalog }}" onfocus="select()" required placeholder="Masukkan Nama" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Status <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="status" required class="form-control mb-3 mb-3">
                                        @if($k->status_katalog == "0")
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
                                    <img src="{{ asset($k->foto_katalog) }}" name="foto2" style="width:250px; height:250px;">
                                    <input type="hidden" value="{{$k->foto_katalog}}" name="foto2">
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
                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">
                            Tambah Katalog
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
                                                <th class="sorting_asc" style="width: 100px;"><a href="#"><center>ID KATALOG</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>NAMA</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>STATUS</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>AKSI</center></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>    
                                            @foreach($katalog as $k)
                                            <tr role="row" class="odd" style="text-align:center;">
                                                <td class="sorting_1">{{ $k->id_katalog }}</td>
                                                <td>{{ $k->nama_katalog }}</td>
                                                <td>
                                                    @if($k->status_katalog == "0")
                                                        Aktif
                                                    @else
                                                        Tidak Aktif
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-toggle="modal" href="#foto{{$k -> id_katalog}}"><button type="button" class="btn btn-info"><i class="fa fa-picture-o" style="margin-right:5px;"></i>Foto</button>
                                                    <a data-toggle="modal" href="#edit{{$k -> id_katalog}}"><button type="button" class="btn btn-warning"><i class="fa fa-edit" style="margin-right:5px;"></i>Edit</button>
                                                </td>
                                            </tr>
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
@endsection
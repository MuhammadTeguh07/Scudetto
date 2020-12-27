<!doctype html>  
@extends('admin/sidebar')

@section('konten')
<div class="right_col" role="main" style="min-height: 1000px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h1>Data Kategori</h1>
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
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Tambah Kategori</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/kategori/insert" class="form-horizontal form-label-left" methode="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Katalog <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <select name="katalog" required class="form-control mb-3 mb-3">
                                        @foreach($katalog as $k)
                                            @if($k->status_katalog == "0")
                                                <option id="{{ $k->id_katalog }}" value="{{ $k->id_katalog }}">{{ $k->nama_katalog }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit-->
        @foreach($kategori as $k)
        <div class="modal fade" id="edit{{$k -> id_kategori}}" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Edit Kategori</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/kategori/edit" class="form-horizontal form-label-left" methode="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >ID User <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="ID" name="ID" value="{{ $k->id_kategori }}" readonly class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Status <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="katalog"  selected value="{{ $k->id_katalog }}" required class="form-control mb-3 mb-3">
                                    @foreach($katalog as $ka)
                                        @if($ka->status_katalog == "0")
                                            <option name="katalog" value="{{ $ka->id_katalog }}" 
                                                @if($ka->id_katalog === $k->id_katalog)
                                                    selected 
                                                @endif 
                                                    id="{{ $ka->id_katalog }}">{{ $ka->nama_katalog }}
                                            </option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Nama <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="nama" name="nama" value="{{ $k->nama_kategori }}" onfocus="select()" required placeholder="Masukkan Nama" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Status <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="status" required class="form-control mb-3 mb-3">
                                        @if($k->status_kategori == "0")
                                            <option selected value="0">Aktif</option>
                                            <option value="1">Tidak Aktif</option>
                                        @else
                                            <option value="0">Aktif</option>
                                            <option selected value="1">Tidak Aktif</option>
                                        @endif
                                    </select>
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
                            Tambah Kategori
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
                                                <th class="sorting_asc" style="width: 100px;"><a href="#"><center>ID KATEGORI</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>ID KATALOG</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>NAMA</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>STATUS</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>AKSI</center></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>    
                                            @foreach($kategori as $k)
                                            <tr role="row" class="odd" style="text-align:center;">
                                                <td class="sorting_1">{{ $k->id_kategori }}</td>
                                                <td>{{ $k->id_katalog }}</td>
                                                <td>{{ $k->nama_kategori }}</td>
                                                <td>
                                                    @if($k->status_kategori == "0")
                                                        Aktif
                                                    @else
                                                        Tidak Aktif
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-toggle="modal" href="#edit{{$k -> id_kategori}}"><button type="button" class="btn btn-warning"><i class="fa fa-edit" style="margin-right:5px;"></i>Edit</button>
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
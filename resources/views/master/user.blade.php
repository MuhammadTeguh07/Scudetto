<!doctype html> 
@extends('backend/sidebar')

@section('konten')
<div class="right_col" role="main" style="min-height: 1000px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h1>Data User</h1>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Tambah User</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/user/insert" class="form-horizontal form-label-left" methode="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Nama <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="nama" name="nama" required placeholder="Masukkan Nama" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Password <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="password" id="password" name="password" requred placeholder="Masukkan Password" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Email <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="email" id="email" name="email" requred placeholder="Masukkan Email" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >No. Hp <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="number" id="no_tlp" value="0" name="no_tlp" requred placeholder="Masukkan No.Handphone" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Alamat <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="alamat" name="alamat" requred placeholder="Masukkan Alamat" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Jenis Kelamin <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="jk" required class="form-control mb-3 mb-3">
                                        <option value="0">Laki - laki</option>
                                        <option value="1">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Jabatan <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="jabatan" required class="form-control mb-3 mb-3">
                                        <option value="Admin">Admin</option>
                                        <option value="Kasir">Kasir</option>
                                        <option value="Desainer">Desainer</option>
                                    </select>
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
        <!-- Modal Detail-->
        @foreach($user as $u)
        <div class="modal fade" id="detail{{$u -> id_user}}" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Detail</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="margin-left:30px;">
                        <div class="form-group">
                            <label class="col-md-3">ID</label><span>:</span>
                            {{ $u->id_user }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">NAMA</label><span>:</span>
                            {{ $u->nama_user }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">PASSWORD</label><span>:</span>
                            {{ $u->pasword_user }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">NO TLP</label><span>:</span>
                            {{ $u->no_tlp_user }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">EMAIL</label><span>:</span>
                            {{ $u->email_user }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">JENIS KELAMIN</label><span>:</span>
                            @if($u->jk_user == "0")
                                Laki - laki
                            @else
                                Perempuan
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">ALAMAT</label><span>:</span>
                            {{ $u->alamat_user }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">JABATAN</label><span>:</span>
                            {{ $u->jabatan_user }}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">STATUS</label><span>:</span>
                            @if($u->status_user == "0")
                                Aktif
                            @else
                               Tidak Aktif
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary simpan-foto" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Modal Edit-->
        @foreach($user as $u)
        <div class="modal fade" id="edit{{$u -> id_user}}" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Edit User</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/user/edit" class="form-horizontal form-label-left" methode="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >ID User <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="ID" name="ID" value="{{ $u->id_user }}" readonly class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Nama <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="nama" name="nama" value="{{ $u->nama_user }}" onfocus="select()" required placeholder="Masukkan Nama" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Password <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="password" id="password" value="{{ $u->pasword_user }}" name="password" onfocus="select()" requred placeholder="Masukkan Password" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Email <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="email" id="email" name="email" value="{{ $u->email_user }}" onfocus="select()" requred placeholder="Masukkan Email" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >No. Hp <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="number" id="no_tlp" value="{{ $u->no_tlp_user }}" name="no_tlp" onfocus="select()" requred placeholder="Masukkan No.Handphone" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Alamat <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                    <input type="text" id="alamat" name="alamat" value="{{ $u->alamat_user }}" onfocus="select()" requred placeholder="Masukkan Alamat" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> 
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Jenis Kelamin <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="jk" required class="form-control mb-3 mb-3">
                                        @if($u->jk_user == "0")
                                            <option selected value="0">Laki - laki</option>
                                            <option value="1">Perempuan</option>
                                        @else
                                            <option value="0">Laki - laki</option>
                                            <option selected value="1">Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Jabatan <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="jabatan" required class="form-control mb-3 mb-3">
                                        @if($u->jabatan_user == "Admin")
                                            <option selected value="Admin">Admin</option>
                                            <option value="Kasir">Kasir</option>
                                            <option value="Desainer">Desainer</option>
                                        @elseif($u->jabatan_user == "Kasir")
                                            <option value="Admin">Admin</option>
                                            <option selected value="Kasir">Kasir</option>
                                            <option value="Desainer">Desainer</option>
                                        @elseif($u->jabatan_user == "Desainer")
                                            <option value="Admin">Admin</option>
                                            <option value="Kasir">Kasir</option>
                                            <option selected value="Desainer">Desainer</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" style="margin-right:-40px;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Status <span class="required">*</span></label>
                                <div class="col-md-5" style="margin-left:60px;">
                                    <select name="status" required class="form-control mb-3 mb-3">
                                        @if($u->status_user == "0")
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah User
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
                                                <th class="sorting_asc" style="width: 100px;"><a href="#"><center>ID USER</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>NAMA</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>PASSWORD</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>NO TLP</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>STATUS</center></a></th>
                                                <th class="sorting" style="width: 100px;"><a href="#"><center>AKSI</center></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user as $u)    
                                            <tr role="row" class="odd" style="text-align:center;">
                                                <td class="sorting_1">{{ $u->id_user }}</td>
                                                <td>{{ $u->nama_user }}</td>
                                                <td>{{ $u->pasword_user }}</td>
                                                <td>{{ $u->no_tlp_user }}</td>
                                                <td>
                                                    @if($u->status_user == "0")
                                                        Aktif
                                                    @else
                                                        Tidak Aktif
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-toggle="modal" href="#detail{{$u -> id_user}}"><button type="button" class="btn btn-info"><i class="fa fa-exclamation-circle" style="margin-right:5px;"></i>Detail</button></a>
                                                    <a data-toggle="modal" href="#edit{{$u -> id_user}}"><button type="button" class="btn btn-warning"><i class="fa fa-edit" style="margin-right:5px;"></i>Edit</button>
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
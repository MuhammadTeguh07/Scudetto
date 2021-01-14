<!doctype html> 
@extends('backend/sidebar')

@section('konten')
<div class="right_col" role="main" style="min-height: 1000px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h1>Data Penjualan</h1>
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
        <!-- Modal Detail-->
        @foreach($penjualan as $p)
        <div class="modal fade" id="detail{{$p -> id_penjualan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Detail {{ $p->id_penjualan }}</h3>
                        <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th><center>Id Produk</center></th>
                          <th><center>Jumlah Produk</center></th>
                          <th><center>Harga Produk</center></th>
                          <th><center>Diskon</center></th>
                          <th><center>Totak Harga</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($detail_penjualan as $d)
                            @if($p->id_penjualan == $d->id_penjualan)
                                <tr style="text-align:center;">
                                    <td>{{ $d->id_produk }}</td>
                                    <td>{{ $d->jumlah_produk }}</td>
                                    <td>{{ $d->harga_jual_produk }}</td>
                                    <td>{{ $d->diskon_produk }}</td>
                                    <td>{{ $d->total_harga_produk }}</td>
                                </tr>
                            @endif
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row" style="cursor:pointer">
                                                <th class="sorting_asc" ><center>ID PENJUALAN</center></th>
                                                <th class="sorting" ><center>ID USER</center></th>
                                                <th class="sorting" ><center>TANGGAL</center></th>
                                                <th class="sorting" ><center>TOTAL PEMBAYARAN</center></th>
                                                <th class="sorting" ><center>AKSI</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>    
                                            @foreach($penjualan as $p)
                                                    <tr role="row" class="odd" style="text-align:center;">
                                                        <td class="sorting_1">{{ $p->id_penjualan }}</td>
                                                        <td>{{ $p->id_user }}</td>
                                                        <td>{{ $p->tgl_penjualan }}</td>
                                                        <td>Rp.{{ $p->total_pembayaran }}</td>
                                                        <td>
                                                            <a data-toggle="modal" href="#detail{{$p -> id_penjualan}}"><button type="button" class="btn btn-info"><i class="fa fa-exclamation-circle" style="margin-right:5px;"></i>Detail</button>
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
</div>
@endsection
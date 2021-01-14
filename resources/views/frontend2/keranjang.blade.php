@extends('frontend/sidebar')

@section('konten')
<!-- Bootstrap -->
<link href="{{ asset('template/gentela/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content"> 
        <!-- Modal Edit-->
        @foreach($cart as $c => $val)
            <div class="modal fade" id="edit{{ $c }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Form Edit Produk</h3>
                            <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/addKeranjang/{{ $c }}" class="form-horizontal form-label-left" enctype="multipart/form-data" method="GET">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <input type="hidden" value="{{ $c }}" name="id_produk" class="id-produk" name="id">
                                <input type="hidden" value="{{ $val["foto_produk"] }}" name="foto_produk" name="foto">
                                <input type="text" value="{{ $val["nama_produk"] }}" name="nama_produk" readonly style="font-size:40px; font-weight:bold; border:none;"><hr>
                                <table style="border:none;">
                                    <tr style="background:none;">
                                        <td>Harga</td>
                                        <td><input type="hidden" name="harga_produk" value="{{ $val["harga_produk"] }}" readonly style="border:none;">Rp.{{ $val["harga_produk"] }}</td>
                                    </tr>
                                    <tr style="background:none;">
                                        <td>Ukuran</td>
                                        <td>
                                            <select name="ukuran_produk" required style="height:30px;">
                                                @foreach($produk as $p)
                                                @if($uk2 = explode(", ",$p->ukuran_produk))
                                                @if($uk = explode(", ",$val["ukuran_produk"]))
                                                    @if(in_array("S",$uk2))
                                                        <option value="S" selected>S</option>
                                                    @endif
                                                    @if(in_array("M",$uk2))
                                                        <option value="M" selected>M</option>
                                                    @endif
                                                    @if(in_array("L",$uk2))
                                                        <option value="L" selected>L</option>
                                                    @endif
                                                    @if(in_array("XL",$uk2))
                                                        <option value="XL" selected>XL</option>
                                                    @endif
                                                    @if(in_array("XXL",$uk2))
                                                        <option value="XXL" selected>XXL</option>
                                                    @endif
                                                    @if(in_array("XXXL",$uk))
                                                        <option value="XXXL" selected>XXXL</option>
                                                    @endif
                                                @endif
                                                @endif
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr style="background:none;">
                                        <td>Jumlah</td>
                                        <td><input type="number" name="jumlah_produk" value="{{ $val["jumlah_produk"] }}" style="width:50px;"></td>
                                    </tr>
                                </table>
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
        <!-- main body -->
        @if(empty($cart) || count($cart) == 0)
            Tidak ada Produk
        @else
            <table  class="table table-bordered">
                <thead>
                    <tr>
                        <td scope="col">No</td>
                        <td scope="col">Foto</td>
                        <td scope="col">Produk</td>
                        <td scope="col">Ukuran</td>
                        <td scope="col">Harga</td>
                        <td scope="col">Jumlah</td>
                        <td scope="col">Subtotal</td>
                        <td scope="col">Aksi</td>
                    </tr>
                </thead>
                <tbody>    
                    <?php 
                        $no=1; 
                        $total=0;
                    ?>
                    @foreach($cart as $c => $val)
                        <?php 
                            $subtotal = $val["harga_produk"] * $val["jumlah_produk"]
                        ?>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><img src="{{ $val["foto_produk"] }}" style="width:100px; height:100px;"></td>
                            <td>{{ $val["nama_produk"] }}</td>
                            <td>{{ $val["ukuran_produk"] }}</td>
                            <td>Rp.{{ $val["harga_produk"] }}</td>
                            <td>{{ $val["jumlah_produk"] }}</td>
                            <td>{{ $subtotal }}</td>
                            <td>
                                <a href="/hapusKeranjang/{{ $c }}">Hapus</a>
                                <a data-toggle="modal" href="#edit{{ $c }}">Edit</a>
                            </td>
                        </tr>
                        <?php
                            $total += $subtotal;
                        ?>
                    @endforeach
                    <tr>
                        <td colspan="6">TOTAL</td>
                        <td>{{ $total }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
    @endif
    <!-- / main body -->
    <div class="clear"></div>
    </div>
  </main>
</div>


@endsection
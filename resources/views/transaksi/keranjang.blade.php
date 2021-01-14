@extends('frontend/sidebar')

@section('konten')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<div class="wrapper row3">
  <main class="hoc container clear">

    <!-- main body -->
    @if(empty($cart) || count($cart) == 0)
        Tidak ada Produk
    @else
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
                    <form action="/produk/edit/{{ $c }}" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            Modal
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

                    <table  class="table table-bordered">
                        <thead>
                            <tr>
                                <td scope="col">No</td>
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
                                    <td>{{ $val["nama_produk"] }}</td>
                                    <td>{{ $val["ukuran_produk"] }}</td>
                                    <td>Rp.{{ $val["harga_produk"] }}</td>
                                    <td>{{ $val["jumlah_produk"] }}</td>
                                    <td>{{ $subtotal }}</td>
                                    <td>
                                        <a href="/hapusKeranjang/{{ $c }}">Hapus</a>
                                        <a data-toggle="modal" href="#edit{{ $c }}"><button type="button" class="btn btn-warning"><i class="fa fa-edit" style="margin-right:5px;"></i>Edit</button>
                                    </td>
                                </tr>
                                <?php
                                    $total += $subtotal;
                                ?>
                            @endforeach
                            <tr>
                                <td colspan="5">TOTAL</td>
                                <td>{{ $total }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>


    @endif
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
@endsection
@extends('frontend/sidebar')

@section('konten')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="sidebar one_quarter first" style="width:30%;"> 
        @foreach($produk as $p)
            <img src="{{ asset($p->foto_produk) }}" style="width:100%;">
        @endforeach
    </div>
    <div class="content three_quarter" style="width:60%;"> 
        @foreach($produk as $p)
            <form action="/addKeranjang/{{ $p->id_produk }}" method="GET">
                <input type="hidden" value="{{ $p->id_produk }}" name="id_produk" class="id-produk" name="id">
                <input type="hidden" value="{{ $p->foto_produk }}" name="foto_produk" name="foto">
                <input type="text" value="{{ $p->nama_produk }}" name="nama_produk" readonly style="font-size:40px; font-weight:bold; border:none;"><hr>
                <table style="border:none;">
                        <tr style="background:none;">
                            <td>Harga</td>
                            <td><input type="hidden" name="harga_produk" value="{{ $p->harga_produk }}" readonly style="border:none;">Rp.{{ $p->harga_produk }}</td>
                        </tr>
                        <tr style="background:none;">
                            <td>Stok</td>
                            <td>{{ $p->stok_produk }}</td>
                        </tr>
                        <tr style="background:none;">
                            <td>Ukuran</td>
                            <td>
                                <select name="ukuran_produk" required style="height:30px;">
                                    @if($uk = explode(", ",$p->ukuran_produk))
                                        @if(in_array("S",$uk))
                                            <option value="S">S</option>
                                        @endif
                                        @if(in_array("M",$uk))
                                            <option value="M">M</option>
                                        @endif
                                        @if(in_array("L",$uk))
                                            <option value="L">L</option>
                                        @endif
                                        @if(in_array("XL",$uk))
                                            <option value="XL">XL</option>
                                        @endif
                                        @if(in_array("XXL",$uk))
                                            <option value="XXL">XXL</option>
                                        @endif
                                        @if(in_array("XXXL",$uk))
                                            <option value="XXXL">XXXL</option>
                                        @endif
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr style="background:none;">
                            <td>Jumlah</td>
                            <td><input type="number" name="jumlah_produk" value="1" name="jumlah_produk" style="width:50px;"></td>
                        </tr>
                        <tr style="background:none;">
                            <td>Keterangan</td>
                            <td>{{ $p->keterangan_produk }}</td>
                        </tr>
                </table>
                <div class="form-group row" style="margin-top:100px;">
                    <div class="col-md-12 col-sm-6 col-xs-12" style="text-align:end;">
                        <button tyoe="submit" class="btn add-to-cart-btn" style="background-color:#D55A77; color:white; height:40px;"><i class="fa fa-shopping-cart" style="margin-right:5px;"></i>Keranjang</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
@endsection
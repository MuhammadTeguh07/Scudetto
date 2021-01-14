<!doctype html> 
@extends('backend/sidebar')

@section('konten')
<div class="right_col" role="main" style="min-height: 1000px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h1>Point Of Sales</h1>
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
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document" style="width:75%;">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Produk</h3>
            <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                    <thead>
                      <tr role="row" style="cursor:pointer">
                        <th class="sorting_asc" >Nama</th>
                        <th class="sorting" >Harga</th>
                        <th class="sorting" >Stok</th>
                        <th class="sorting" >Ukuran</th>
                      </tr>
                    </thead>
                    <tbody>    
                      @foreach($produk as $p)
                        <tr role="row" class="odd" style="cursor:pointer" onclick="pilihProduk('{{ $p->id_produk }}')">
                          <td class="sorting_1">{{ $p->nama_produk }}</td>
                          <td>Rp.{{ $p->harga_produk }}</td>
                          <td>{{ $p->stok_produk }}</td>
                          <td>{{ $p->ukuran_produk }}</td>
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
    <div class="clearfix"></div>
    <div class="row">
      <form action="/pos/insert" methode="post">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button type="button" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary">
                Pilih Produk
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
              @if(\Session::has('id'))
                <input type="hidden" value="{{ Session::get('id') }}" id="user" name="user">
              @endif
              <table class="table table-bordered" id="table">
                <thead>
                  <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Diskon</th>
                    <th>Subtotal (Rp)</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
              </table>
              <input type="hidden" name="tanggal" id="tanggal">
              <div style="float:right;">
                <div class="row form-group" style="margin-left:20px;margin-right:20px;">
                  <label style="margin-top:6px;">Total Pembayaran (Rp)</label>
                  <div class="col-5">
                    <input id="total_pembayaran" name="total_pembayaran" style="text-align:center;height:110px;font-size:30px;background:none;outline:none;" value="0" type="number" readonly class="form-control">
                  </div>
                  <div style="float:right;margin-top:10px;">
                    <button type="submit" class="btn btn-success" style="height:40px; margin-top:10px; width:100px;">
                      <i class="fa fa-credit-card" style="margin-right:5px;"></i>Bayar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  var barang = <?php echo json_encode($produk); ?>;
  console.log(barang[0]["nama_produk"]);

  var colnum=0;

  function pilihProduk(id)
  {
      for(var i=0; i<barang.length; i++)
      {
          if(barang[i]["id_produk"]==id){
              console.log(barang[i]);
              break;
          }
      }
      $("#tambahModal").modal("hide");

      var table = document.getElementById('table');
      var row = table.insertRow(table.rows.length);
      var idrow = 'col'+colnum;
      row.setAttribute('id',idrow);
      colnum++;

      var cel_1 = row.insertCell(0);
      var cel_2 = row.insertCell(1);
      var cel_3 = row.insertCell(2);
      var cel_4 = row.insertCell(3);
      var cel_5 = row.insertCell(4);
      var cel_6 = row.insertCell(5);

      cel_1.innerHTML = '<input type="hidden" readonly style="background:none; outline:none; border:none; width:100px; height:20px; text-align:center;" name="id['+barang[i]["id_produk"]+']" value="'+barang[i]["id_produk"]+'">'+barang[i]["nama_produk"];
      cel_2.innerHTML = '<input id="harga'+barang[i]["id_produk"]+'" type="number" readonly style="background:none; outline:none; border:none; height:20px;" name="harga['+barang[i]["id_produk"]+']" value="'+barang[i]["harga_produk"]+'">';
      cel_3.innerHTML = '<input id="qty'+barang[i]["id_produk"]+'" type="number" style="width:50px;" name="qty['+barang[i]["id_produk"]+']" value="1" onfocus="select()" oninput="perkalian(\''+barang[i]["id_produk"]+'\')">';
      cel_4.innerHTML = '<input type="number" name="diskon['+barang[i]["id_produk"]+']" oninput="perkalian(\''+barang[i]["id_produk"]+'\')"  value="0" onfocus="select()" id="diskon'+barang[i]["id_produk"]+'">';	
      cel_5.innerHTML = '<input id="subtotal'+barang[i]["id_produk"]+'" class="subtotal" type="number" readonly style="background:none; outline:none; border:none; height:20px;" name="subtotal['+barang[i]["id_produk"]+']" value="'+barang[i]["harga_produk"]+'">';
      cel_6.innerHTML = '<center><button onclick="hapusEl(\''+idrow+'\')" class="btn btn-secondary" style="background:transparent; border:none; color: black;" type="button"><i class="fa fa-times"></i></button></center>';
      total();
  }

  function hapusEl(idRow)
  {
      document.getElementById(idRow).remove();
      total();
  }

  function perkalian(id)
  {
      var discount = document.getElementById("diskon"+id).value;
      var val1 = document.getElementById("harga"+id).value;
      var val2 = document.getElementById("qty"+id).value;
      var subtotal = Number(val1*val2)-discount;
      document.getElementById("subtotal"+id).value = subtotal;
      total();
  }

  function total()
  {
    var subtotals = document.getElementsByClassName("subtotal");
    var total = 0;
    for(var i=0; i<subtotals.length;++i){
      total += Number(subtotals[i].value); 
    }
    document.getElementById("total_pembayaran").value = total;
  }
</script>
<script>
  var bulan = new Array('01','02','03','04','05','06','07','08','09','10','11','12');  
  var now;
  var day = new Date();
  now = day.getFullYear()+"-"+bulan[day.getMonth()]+"-"+day.getDate();
  document.getElementById('tanggal').value = now;
</script>
@endsection
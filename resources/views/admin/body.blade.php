@extends('admin/sidebar')

@section('konten')
<div class="right_col" role="main" style="min-height: 1704px;">
  <div class="row tile_count" style="margin-left:10px;">
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-shopping-cart" style="margin-right:10px;"></i>Total Penjualan/Hari</span>
      <div class="count">2500</div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-shopping-cart" style="margin-right:10px;"></i>Total Pemesanan/Hari</span>
      <div class="count">123.50</div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-dollar" style="margin-right:10px;"></i>Total Pendapatan/Hari</span>
      <div class="count">123.50</div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-dollar" style="margin-right:10px;"></i>Total Pendapatan/Bulan</span>
      <div class="count">123.50</div>
    </div>
  </div>
  <!-- /top tiles -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph x_panel" style="height:360px;">
        <div class="row x_title">
          <div class="col-md-6">
            <h3>Network Activities <small>Graph title sub-title</small></h3>
          </div>
          <div class="col-md-6">
            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
              <span>November 15, 2020 - December 14, 2020</span> <b class="caret"></b>
            </div>
          </div>
        </div>
        <div class="x_content">
          <div class="demo-container" style="height:250px">
            <div id="chart_plot_03" class="demo-placeholder" style="padding: 0px; position: relative;">
              <canvas class="flot-base" width="1047" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1047px; height: 280px;"></canvas>
              <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px; display: block;">
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 15px; text-align: center;">0</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 143px; text-align: center;">2</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 270px; text-align: center;">4</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 398px; text-align: center;">6</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 526px; text-align: center;">8</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 650px; text-align: center;">10</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 778px; text-align: center;">12</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 905px; text-align: center;">14</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 116px; top: 264px; left: 1033px; text-align: center;">16</div>
                </div>
                <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px; display: block;">
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 252px; left: 7px; text-align: right;">0</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 220px; left: 7px; text-align: right;">5</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 189px; left: 1px; text-align: right;">10</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 157px; left: 1px; text-align: right;">15</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 126px; left: 1px; text-align: right;">20</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 95px; left: 1px; text-align: right;">25</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 63px; left: 1px; text-align: right;">30</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 32px; left: 1px; text-align: right;">35</div>
                  <div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">40</div>
                </div>
              </div>
              <canvas class="flot-overlay" width="1047" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1047px; height: 280px;"></canvas>
              <div class="legend">
                <div style="position: absolute; width: 78px; height: 15px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                  <table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454">
                    <tbody>
                      <tr>
                        <td class="legendColorBox">
                          <div style="border:1px solid #ccc;padding:1px">
                            <div style="width:4px;height:0;border:5px solid rgb(38,185,154);overflow:hidden"></div>
                          </div>
                        </td>
                        <td class="legendLabel">Registrations</td>
                      </tr>
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

<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
		  document.getElementById('result').innerHTML = '';
    });
  }
</script>
@endsection

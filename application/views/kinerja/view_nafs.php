<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-user"></i> &nbsp; Hifdz An Nafs (Pemeliharaan Jiwa)</h4>
        </div> 
         <div class="col-md-6">   
          <a href="<?=base_url('/kinerja/individu/nafs'); ?>" class="btn btn-success btn-md pull-right">Tambah Data</a>
        </div>      
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h4>Grafik Hifdz An Nafs </h4>

        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-bodys"> 

          <?php foreach ($tahun as $tahun) { ?>
            <a href="<?=base_url('kinerja/individu/detail/nafs/'. $tahun['periode_thn']); ?>" class="btn btn-warning btn-sm"><?=$tahun['periode_thn']; ?></a>

          <?php } ?>
          <br><br> 

            <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
            </div>
          
            <div style="padding-top:20px;padding-bottom:20px;">
              <p>Legenda:</p>
              <p><i class="fa fa-circle" style="color:#ED8A1D"></i> Frekuensi olah raga waktu /bulan</p>
              <p><i class="fa fa-circle" style="color:rgba(186,63,196,0.8)"></i> Frekuensi Kehadiran Tepat Waktu /bulan</p>
            </div>

            <table class="table-striped table table-bordered">
                <thead>
                  <tr>
                    <th style="width:30%;vertical-align: middle;" rowspan="2" >Kinerja</th>
                   
                    <th colspan="<?=count($result); ?>" style="text-align:center">Bulan</th>
                  </tr>

                <tr>
                   <?php foreach ($result as $row) { ?><th style="width:5%;text-align: center;"><?=$row['bulan'] ?> </th><?php } ?>
                </tr>
                 </thead>
                <tr>
                  <td><strong>Frekuensi olah raga</strong> (kali / bulan)</td>
                  <?php foreach ($result as $row) { ?><td style="width:5%;text-align: center;"><?=$row['olah_raga'] ?> </td><?php } ?>
                </tr>

                <tr>
                  <td><strong>Frekuensi kehadiran tepat waktu</strong> (kali / bulan)</td>
                  <?php foreach ($result as $row) { ?><td style="width:5%;text-align: center;"><?=$row['tepat_waktu'] ?> </td><?php } ?>
                </tr>

                <tr>
                  <td></td>
                  <?php foreach ($result as $row) { ?><td style="width:5%;text-align: center;"> <a title="Hapus" class="delete btn btn-sm btn-danger" data-href="<?= base_url('kinerja/individu/hapus_nafs/'. $row['id'] ); ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a></td><?php } ?>
                </tr>

                
              </table>

             
        </div>
         

      </div>
          <!-- /.box-body -->
     
    </div><!-- /.col  -->
  </div><!-- /.row  -->
  
</section> 

     

<!-- ChartJS 1.0.1 -->
<script src="<?= base_url() ?>public/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>public/plugins/fastclick/fastclick.js"></script>
<!-- page script -->
<script>
  $(function () {

    var fillColor_ = "rgba(255,255,255,0)";
    var pointStrokeColor_ = "#fff";
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: [
      <?php foreach ($result as $row) { ?>
      "<?=$row['bulan'] ?>",
      <?php } ?>
      ],
      datasets: [
        {
          label: "Frekuensi Olah Raga",
          fillColor: fillColor_,
          strokeColor: "#ED8A1D",
          pointColor: "#ED8A1D",
          pointStrokeColor: pointStrokeColor_,
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(140,198,62,1)",
          data: [
          <?php foreach ($result as $row) { ?>
            "<?=$row['olah_raga'] ?>",
          <?php } ?>
          ]
        },
        {
          label: "Frekuensi Kehadiran Tepat Waktu",
          fillColor: fillColor_,
          strokeColor: "rgba(186,63,196,0.8)",
          pointColor: "rgba(186,63,196,0.8)",
          pointStrokeColor: pointStrokeColor_,
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(140,198,62,1)",
          data: [
          <?php foreach ($result as $row) { ?>
            "<?=$row['tepat_waktu'] ?>",
          <?php } ?>
          ]
        }
       
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: false,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: true,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

  
   

   
  });
</script>

<script>
  $("#kinerja_individu").addClass('active');
  $("#kinerja_individu .submenu_nafs").addClass('active');
</script>

!-- Modal -->
<div id="confirm-delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus</h4>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <a class="btn btn-danger btn-ok">Hapus</a>
      </div>
    </div>

  </div>
</div>
  
<script type="text/javascript">
  $('#confirm-delete').on('show.bs.modal', function(e) {
  $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
</script>
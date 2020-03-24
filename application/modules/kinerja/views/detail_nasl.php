<?php include('sidebar_detail.php'); ?>
  		<div class="col-md-9">
  			<div class="box box-body">

  				<h4><i class="fa fa-gear"></i> &nbsp; Hifdz An Nasl / Penjagaan Keturunan
  					<?php if($this->session->userdata('role')== 3) { ?>
  					<a title="Edit" class="delete btn btn-sm btn-success pull-right" data-toggle="modal"
  						data-target="#tambah_data" data-href="<?php echo base_url(); ?>"> <i class="fa fa-plus"></i>
  						Tambah Data</a>
  					<?php } ?>
  				</h4>
  				<hr>
  				<select id="select_menu" class="form-control">
  					<option value="#">Pilih Kinerja</option>
  					<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>">Hifdz Ad Din /
  						Penjagaan Agama</option>
  					<option value="<?= base_url('kinerja/individu/detail_nafs/' . $user['id']) ?>"
  						class="btn btn-default btn-md">Hifdz An Nafs / Penjagaan Jiwa</option>
  					<option value="<?= base_url('kinerja/individu/detail_aql/' . $user['id']) ?>"
  						class="btn btn-default btn-md">Hifdz Al 'Aql / Penjagaan Pikiran</option>
  					<option value="<?= base_url('kinerja/individu/detail_nasl/' . $user['id']) ?>"
  						class="btn btn-default btn-md" selected="selected">Hifdz An Nasl / Penjagaan Keturunan
  					</option>
  					<option value="<?= base_url('kinerja/individu/detail_mal/' . $user['id']) ?>"
  						class="btn btn-default btn-md">Hifdz Al Mal / Penjagaan Harta</option>
  				</select>

  			</div>
  			<!-- About Me Box -->
  			<div class="box box-primary">
  				<div class="box-body">
  					<div class="btn-group" role="group" style="margin-bottom:20px;">
  						<?php
						$last = $this->uri->total_segments();
						$year = $this->uri->segment($last);
						if ($tahun_nasl) {
							foreach ($tahun_nasl as $tahun_nasl) { ?>
  						<a href="<?= base_url('kinerja/individu/detail_nasl/' . $user['id'] . '/' . $tahun_nasl['periode_thn']); ?>"
  							class="btn <?=($year == $tahun_nasl['periode_thn']) ? "btn-warning": "btn-success";?>"><?= $tahun_nasl['periode_thn']; ?></a>
  						<?php }
						} ?>
  					</div>

  					<?php 
					 
						if (count($nasl) > 0) {

							foreach ($nasl as $key => $row) {
								foreach ($row as $field => $value) {
									$recNew[$field][] = $value;
								}
							}

							echo "<table class='table table-bordered table-striped'>\n";
							$i = 1;
							foreach ($recNew as $key => $values) // For every field name (id, name, last_name, gender)
							{
								if ($i == 1) {
									echo "<tr>\n"; // start the row
									echo "\t<th>" . $key . "</th>\n"; // create a table cell with the field name
									foreach ($values as $cell) // for every sub-array iterate through all values
									{
										echo "\t<th class='text-center'>" . konversiBulanAngkaKeNama_short($cell) . "</th>\n"; // write cells next to each other
									}
									echo "</tr>\n"; // end row
								} else {
									echo "<tr>\n"; // start the row
									echo "\t<td>" . $key . "</td>\n"; // create a table cell with the field name
									foreach ($values as $cell) // for every sub-array iterate through all values
									{
										echo "\t<td class='text-center'>" . $cell . "</td>\n"; // write cells next to each other
									}
									echo "</tr>\n"; // end row

								}
								$i++;
							}

							echo "</table>";
						 

						?>

  					<div class="chart" style="margin:20px 0;">

  						<canvas id="lineChart_din" style="height:250px"></canvas>

  					</div>

					<?php }  ?>
					<hr>
  					<h4>Data Pendidikan Anak</h4>
  					
  					<table class="table table-striped table-bordered">
  						<tr>
  							<th>Nama Anak</th>
  							<th>Tanggal Lahir</th>
  							<th>Pendidikan</th>
  							<?php foreach($anak as $anak) { ?>
  						<tr>
  							<td><?=$anak['nama_keluarga']; ?></td>
  							<td><?=$anak['tgl_lahir']; ?></td>
  							<td><?=$anak['kelas']; ?> <?=$anak['pendidikan']; ?> di <?=$anak['sekolah']; ?></td>

  						</tr>
  						<?php } ?>
  					</table>


  				</div>
  				<!-- /.box-body -->
  			</div>
  			<!-- /.box -->


  		</div>
  		<!-- /.col -->
  	</div>
  	<!-- /.row -->

  </section>

  <div class="modal fade" id="tambah_data">
  	<div class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Hifdz Ad-Din (Pemeliharaan Agama)</h4>
  			</div>
  			<div class="modal-body">
			<?php echo form_open(base_url('kinerja/individu/nasl'), 'class="form-horizontal"' )?> 
           
		   <?php
			 //get current month
			 $this_month= date("n");
			
		   ?>
			 <div class="form-group">
			   <label for="periode" class="col-sm-6 control-label">Periode</label>
			   <div class="col-sm-5">
				 <div class="row">
				   <div class="col-sm-6">
					 <div class="input-group">
					   <select name="periode_bln" class="form-control" id="periode_bln" >
						 <option value="1" <?php if($this_month == 1 ) { echo "selected";} ?> >Januari</option>
						 <option value="2" <?php if($this_month == 2 ) { echo "selected";} ?>>Februari</option>
						 <option value="3" <?php if($this_month == 3 ) { echo "selected";} ?>>Maret</option>
						 <option value="4" <?php if($this_month == 4 ) { echo "selected";} ?>>April</option>
						 <option value="5" <?php if($this_month == 5 ) { echo "selected";} ?>>Mei</option>
						 <option value="6" <?php if($this_month == 6 ) { echo "selected";} ?>>Juni</option>
						 <option value="7" <?php if($this_month == 7 ) { echo "selected";} ?>>Juli</option>
						 <option value="8" <?php if($this_month == 8 ) { echo "selected";} ?>>Agustus</option>
						 <option value="9" <?php if($this_month == 9 ) { echo "selected";} ?>>September</option>
						 <option value="10" <?php if($this_month == 10 ) { echo "selected";} ?>>Oktober</option>
						 <option value="11" <?php if($this_month == 11 ) { echo "selected";} ?>>November</option>
						 <option value="12" <?php if($this_month == 12 ) { echo "selected";} ?>>Desember</option>
					   </select>
					 </div>
				   </div>
				   <div class="col-sm-6">
					 <div class="input-group">
					  <select name="periode_thn" class="form-control" id="periode_thn" >                          
						 <option value="2020">2020</option> 
						 <option value="2021">2021</option>    
						 <option value="2022">2022</option>  
						 <option value="2023">2023</option>  
						 <option value="2024">2024</option>                     
					   </select>
					 </div>
				   </div>
				 </div>
			   </div>
			 </div>  

			 <div class="form-group">
			   <label for="kesehatan_keluarga" class="col-sm-6 control-label">Kesehatan anggota keluarga<span class="help-block"> (Jumlah hari anggota keluarga yang sakit dalam sebulan dan sembuh)</span></label>
			   <div class="col-sm-3">
				 <div class="input-group">            
				   <input type="text" name="kesehatan_keluarga" class="form-control" value="<?php if(validation_errors()) {echo set_value('kesehatan_keluarga'); }  ?>" placeholder="">
				   <span class="input-group-addon"> / bulan</span>
				 </div>
			   </div>
			 </div>  

			 <div class="form-group">
			   <label for="partisipasi_keluarga" class="col-sm-6 control-label">Partisipasi keluarga besar di kegiatan BMT </label>
			   <div class="col-sm-3">
				 <div class="input-group">         
				   <input type="number" name="partisipasi_keluarga" class="form-control" value="<?php if(validation_errors()) {echo set_value('partisipasi_keluarga'); }  ?>"><span class="input-group-addon"> / bulan</span>
				 </div>
			   </div>
			 </div>   
			 <hr>
			 
			 <div class="form-group">
			   <div class="col-md-11">
				 <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
			   </div>
			 </div>
		   <?php echo form_close(); ?>
  		</div>
  		<!-- /.modal-content -->
  		<?php echo form_close(); ?>
  	</div>
  	<!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <script>
  	$("#kinerja_individu").addClass('active');
	$("#kinerja_individu .submenu_nasl").addClass('active');

  	$(document).ready(function () {
  		$('#select_menu').change(function () {
  			location.href = $(this).val();
  		});
  	});

  </script>

  <!-- ChartJS 1.0.1 -->
  <script src="<?= base_url() ?>public/plugins/chartjs/Chart.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>public/plugins/fastclick/fastclick.js"></script>
  <!-- page script -->
  <script>
  	$(function () {
  		var areaChartData_din = {
  			labels: [ <?php foreach($nasl as $nasl) {
  					echo '"'.konversiBulanAngkaKeNama_short($nasl['Bulan']).
  					'",';
  				} ?>

  			],
  			datasets: [ <?php
  				foreach($nasl_grafik as $key => $row) {
  					foreach($row as $field => $value) {
  						$recNew2[$field][] = $value;
  					}
  				};


  				$i = 1;
  				foreach($recNew2 as $key => $values) {

  					?> {
  						label: "<?= $key; ?>",
  						fillColor: "<?php printf("#%06X", mt_rand(0, 0xFFFFFF)); ?>",
  						strokeColor: "<?php printf("#%06X", mt_rand(0, 0xFFFFFF)); ?>",
  						pointColor: "<?php printf("#%06X", mt_rand(0, 0xFFFFFF)); ?>",
  						pointStrokeColor: "#c1c7d1",
  						pointHighlightFill: "#fff",
  						pointHighlightStroke: "rgba(220,220,220,1)",
  						data: [

  							<?php foreach($values as $cell) {
  								echo $cell.
  								",";
  							} ?>


  						]
  					}, <?php $i++;
  				} ?>

  			]

  		};

  		var areaChartOptions = {
  			//Boolean - If we should show the scale at all
  			showScale: true,
  			//Boolean - Whether grid lines are shown across the chart
  			scaleShowGridLines: false,
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
  			pointDotRadius: 5,
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
  		//-------------
  		//- LINE CHART -
  		//--------------
  		var lineChartCanvas = $("#lineChart_din").get(0).getContext("2d");
  		var lineChart = new Chart(lineChartCanvas);
  		var lineChartOptions = areaChartOptions;
  		lineChartOptions.datasetFill = false;
  		lineChart.Line(areaChartData_din, lineChartOptions);

  	});

  </script>

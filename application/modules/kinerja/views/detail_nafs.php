<?php include('sidebar_detail.php'); ?>
  		<div class="col-md-9">
  			<div class="box box-body">

				<h4><i class="fa fa-gear"></i> &nbsp; Hifdz An Nafs / Penjagaan Jiwa
					<?php if($this->session->userdata('role')== 3) { ?>
						<a title="Edit" class="delete btn btn-sm btn-success pull-right" href="<?php echo base_url('kinerja/individu/nafs'); ?>"> <i class="fa fa-plus"></i> Tambah Data</a>
				  	<?php } ?>
				</h4>
				
  				<hr>
  				<select id="select_menu" class="form-control">
  					<option value="#">Pilih Kinerja</option>
  					<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>">Hifdz Ad Din / Penjagaan Agama</option>
  					<option value="<?= base_url('kinerja/individu/detail_nafs/' . $user['id']) ?>" class="btn btn-default btn-md" selected="selected">Hifdz An Nafs / Penjagaan Jiwa</option>
  					<option value="<?= base_url('kinerja/individu/detail_aql/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz Al 'Aql / Penjagaan Pikiran</option>
  					<option value="<?= base_url('kinerja/individu/detail_nasl/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz An Nasl / Penjagaan Keturunan</option>
  					<option value="<?= base_url('kinerja/individu/detail_mal/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz Al Mal / Penjagaan Harta</option>
  				</select>
  			</div>
  			<!-- About Me Box -->
  			<div class="box box-primary">

  				<div class="box-body">

  					<div class="btn-group" role="group" style="margin-bottom:20px;">
  						<?php if ($tahun_nafs) {
								foreach ($tahun_nafs as $tahun_nafs) { ?>
  								<a href="<?= base_url('kinerja/individu/detail_nafs/' . $user['id'] . '/' . $tahun_nafs['periode_thn']); ?>" class="btn btn-success"><?= $tahun_nafs['periode_thn']; ?></a>
  						<?php }
							} ?>
  					</div>


					  <?php 
					 
						if (count($nafs) > 0) {

							foreach ($nafs as $key => $row) {
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

  				</div>
  				<!-- /.box-body -->
  			</div>
  			<!-- /.box -->


  		</div>
  		<!-- /.col -->
  	</div>
  	<!-- /.row -->

  </section>

  <script>
	  
	$("#kinerja_individu").addClass('active');
	$("#kinerja_individu .submenu_nafs").addClass('active');
	  
  	$(document).ready(function() {
  		$('#select_menu').change(function() {
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
  	$(function() {
  		var areaChartData_din = {
  			labels: [<?php foreach ($nafs as $nafs) {
							echo '"' . konversiBulanAngkaKeNama_short($nafs['Bulan']) .
								'",';
						} ?>

  			],
  			datasets: [<?php
							foreach ($nafs_grafik as $key => $row) {
								foreach ($row as $field => $value) {
									$recNew2[$field][] = $value;
								}
							}


							$i = 1;
							foreach ($recNew2 as $key => $values) {
								//if ($i>1) {
							?> {
  						label: "<?= $key; ?>",
  						fillColor: "<?php printf("#%06X", mt_rand(0, 0xFFFFFF)); ?>",
  						strokeColor: "<?php printf("#%06X", mt_rand(0, 0xFFFFFF)); ?>",
  						pointColor: "<?php printf("#%06X", mt_rand(0, 0xFFFFFF)); ?>",
  						pointStrokeColor: "#c1c7d1",
  						pointHighlightFill: "#fff",
  						pointHighlightStroke: "rgba(220,220,220,1)",
  						data: [

  							<?php foreach ($values as $cell) {
									echo $cell .
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
<?php include('sidebar_detail.php'); ?>
<div class="col-md-12">
	<div class="box box-body">

		<h4><i class="fa fa-gear"></i> &nbsp; Hifdz An Nasl / Penjagaan Keturunan
			<?php if ($this->session->userdata('role') == 3) { ?>
				<a title="Edit" class="delete btn btn-sm btn-success pull-right" href="<?php echo base_url('kinerja/individu/nasl'); ?>"> <i class="fa fa-plus"></i>
					Tambah Data</a>
			<?php } ?>
		</h4>
		<hr>
		<select id="select_menu" class="form-control">
			<option value="#">Pilih Kinerja</option>
			<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>">Hifdz Ad Din /
				Penjagaan Agama</option>
			<option value="<?= base_url('kinerja/individu/detail_nafs/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz An Nafs / Penjagaan Jiwa</option>
			<option value="<?= base_url('kinerja/individu/detail_aql/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz Al 'Aql / Penjagaan Pikiran</option>
			<option value="<?= base_url('kinerja/individu/detail_nasl/' . $user['id']) ?>" class="btn btn-default btn-md" selected="selected">Hifdz An Nasl / Penjagaan Keturunan
			</option>
			<option value="<?= base_url('kinerja/individu/detail_mal/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz Al Mal / Penjagaan Harta</option>
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
						<a href="<?= base_url('kinerja/individu/detail_nasl/' . $user['id'] . '/' . $tahun_nasl['periode_thn']); ?>" class="btn <?= ($year == $tahun_nasl['periode_thn']) ? "btn-warning" : "btn-success"; ?>"><?= $tahun_nasl['periode_thn']; ?></a>
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

				echo "<div class='table-responsive'><table class='table table-bordered table-striped'>\n";
				$i = 1;
				foreach ($recNew as $key => $values) // For every field name (id, name, last_name, gender)
				{
					if ($i == 1) {
						echo "<tr>\n"; // start the row
						echo "\t<th>" . $key . "</th>\n"; // create a table cell with the field name
						foreach ($values as $cell) // for every sub-array iterate through all values
						{
							echo "\t<th class='text-center'>" . konversiBulanAngkaKeNama_short($cell) . "  </th>\n"; // write cells next to each other
						}
						echo "</tr>\n"; // end row
					} elseif ($i == 2) {
						echo "<tr>\n"; // start the row
						echo "\t<th> Aksi</th>\n"; // create a table cell with the field name
						foreach ($values as $cell) // for every sub-array iterate through all values
						{
							echo "\t<th class='text-center'><a title='Hapus' class='delete btn btn-xs btn-danger' data-toggle='modal' data-target='#confirm-delete' data-href='" . base_url('kinerja/individu/hapus_nasl/' . $cell) . "'> <i class='fa fa-trash-o'></i></a> <a title='Edit' class='btn btn-xs btn-info' href='" . base_url('kinerja/individu/nasl/' . $cell) . "'> <i class='fa fa-pencil'></i></a></th>\n"; // write cells next to each other
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

				echo "</table></div>";


			?>

				<div class="chart" style="margin:20px 0;">

					<canvas id="lineChart_din" style="height:250px"></canvas>

				</div>

			<?php }  ?>


			<h4>Data Pendidikan Anak</h4>
			<hr>
			<div class='table-responsive'>
				<table class="table table-striped table-bordered">
					<tr>
						<th>Nama Anak</th>
						<!--	<th>Pendidikan</th>-->
						<th>Raport</th>
						<th>Aksi</th>
					</tr>
					<?php if ($anak) {
						foreach ($anak as $anak) { ?>
							<?php echo form_open_multipart(base_url('kinerja/individu/tambah_raport/'), 'class="form-horizontal"') ?>
							<tr>
								<td><?php echo $anak['nama_keluarga']; ?><br>TTL : <?php echo $anak['tgl_lahir']; ?></td>

								<!--	<td><?php echo $anak['pendidikan']; ?></td>-->
								<td>
									<?php if (!get_raport($anak['id'])) { ?>

										<span>Anda belum mengunggah raport</span>

									<?php } else {

										echo '<img src="' . base_url(get_raport($anak['id'])['raport']) . '" style="width:200px; height:auto;">';
									} ?>

								</td>
								<td><?php if (!get_raport($anak['id'])) { ?>
										<input type="hidden" name="id_keluarga" value="<?php echo $anak['id']; ?>">
										<input type="file" required name="raport" value="" class="form-control" id="nama_pemateri" placeholder=""><br />
										<input type="submit" name="submit" value="Unggah raport" class="btn btn-info">
									<?php } else { ?>
										<a title="Edit" class="delete btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url('kinerja/individu/del_raport/' . get_raport($anak['id'])['id']); ?>"> <i class="fa fa-trash-o"></i> Hapus</a>
									<?php }  ?>
								</td>
							</tr>
							<?php echo form_close(); ?>
					<?php }
					} else {
						echo "<tr><td colspan=3>";
						echo 'Tidak ada data anak. Silakan isi data anak <a href="' . base_url('profile/keluarga') . '">di sini</a>.';
						echo "</td></tr>";
					} ?>
				</table>
			</div>


		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->


</div>
<!-- /.col -->
</div>
<!-- /.row -->

</section>


<!-- Modal -->
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


<script>
	$("#kinerja_individu").addClass('active');
	$("#kinerja_individu .submenu_nasl").addClass('active');

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
			labels: [<?php foreach ($nasl as $nasl) {
									echo '"' . konversiBulanAngkaKeNama_short($nasl['Bulan']) .
										'",';
								} ?>

			],
			datasets: [<?php
									foreach ($nasl_grafik as $key => $row) {
										foreach ($row as $field => $value) {
											$recNew2[$field][] = $value;
										}
									};


									$i = 1;
									foreach ($recNew2 as $key => $values) {

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
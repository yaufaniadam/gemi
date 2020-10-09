<?php include('sidebar_detail.php'); ?>
<div class="col-md-12">
	<div class="box box-body">

		<h4><i class="fa fa-gear"></i> &nbsp; Hifdz Al 'Aql / Penjagaan Pikiran
			<?php if ($this->session->userdata('role') == 3) { ?>
				<a title="Edit" class="delete btn btn-sm btn-success pull-right" href="<?php echo base_url('kinerja/individu/aql'); ?>"> <i class="fa fa-plus"></i> Tambah Data</a>
			<?php } ?>
		</h4>
		<hr>
		<select id="select_menu" class="form-control">
			<option value="#">Pilih Kinerja</option>
			<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>">Hifdz Ad Din /
				Penjagaan Agama</option>
			<option value="<?= base_url('kinerja/individu/detail_nafs/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz An Nafs / Penjagaan Jiwa</option>
			<option value="<?= base_url('kinerja/individu/detail_aql/' . $user['id']) ?>" class="btn btn-default btn-md" selected="selected">Hifdz Al 'Aql / Penjagaan Pikiran</option>
			<option value="<?= base_url('kinerja/individu/detail_nasl/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz An Nasl / Penjagaan Keturunan</option>
			<option value="<?= base_url('kinerja/individu/detail_mal/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz Al Mal / Penjagaan Harta</option>
		</select>

	</div>
	<!-- About Me Box -->
	<div class="box box-primary">

		<div class="box-body">

			<div class="btn-group" role="group" style="margin-bottom:20px;">
				<?php if ($tahun_aql) {
					foreach ($tahun_aql as $tahun_aql) { ?>
						<a href="<?= base_url('kinerja/individu/detail_aql/' . $user['id'] . '/' . $tahun_aql['periode_thn']); ?>" class="btn btn-success"><?= $tahun_aql['periode_thn']; ?></a>
				<?php }
				} ?>
			</div>

			<h4>Pelatihan</h4>
			<div class='table-responsive'>
				<table class="table table-striped table-bordered">
					<tr>
						<th width="20">No</th>
						<th width="300">Nama Kegiatan</th>
						<th width="150">Pembicara</th>
						<th width="100">Tempat</th>
						<th width="100">Tanggal</th>
						<th width="100">&nbsp;</th>
					</tr>
					<?php

					if (count($aql_pelatihan) > 0) {
						$i = 1;
						foreach ($aql_pelatihan as $row) {
							echo "<tr>";
							echo "<td>" . $i++ . "</td>";
							echo "<td>" . $row['nama_kegiatan'] . "</td>";
							echo "<td>" . $row['pembicara'] . "</td>";
							echo "<td>" . $row['tempat'] . "</td>";
							echo "<td>" . $row['tanggal'] . "</td>";
							echo "<td><a title='Hapus' class='delete btn btn-xs btn-danger' data-toggle='modal' data-target='#confirm-delete' data-href='" . base_url('kinerja/individu/hapus_aql/' . $row['id']) . "'> <i class='fa fa-trash-o'></i></a> <a title='Edit' class='btn btn-xs btn-info' href='" . base_url('kinerja/individu/aql/' . $row['id']) . "'> <i class='fa fa-pencil'></i></a></td>";
							echo "</tr>";
						}
					} else {
						echo '<tr><td colspan="5">Belum ada data.</td></tr>';
					}

					?>

				</table>
			</div>
			<br>
			<h4>Pengajian</h4>
			<div class='table-responsive'>
				<table class="table table-striped table-bordered">
					<tr>
						<th width="20">No</th>
						<th width="300">Nama Kegiatan</th>
						<th width="150">Pembicara</th>
						<th width="100">Tempat</th>
						<th width="100">Tanggal</th>
						<th width="100">&nbsp;</th>
					</tr>
					<?php

					if (count($aql_pengajian) > 0) {
						$i = 1;
						foreach ($aql_pengajian as $row) {
							echo "<tr>";
							echo "<td>" . $i++ . "</td>";
							echo "<td>" . $row['nama_kegiatan'] . "</td>";
							echo "<td>" . $row['pembicara'] . "</td>";
							echo "<td>" . $row['tempat'] . "</td>";
							echo "<td>" . $row['tanggal'] . "</td>";
							echo "<td><a title='Hapus' class='delete btn btn-xs btn-danger' data-toggle='modal' data-target='#confirm-delete' data-href='" . base_url('kinerja/individu/hapus_aql/' . $row['id']) . "'> <i class='fa fa-trash-o'></i></a> <a title='Edit' class='btn btn-xs btn-info' href='" . base_url('kinerja/individu/aql/' . $row['id']) . "'> <i class='fa fa-pencil'></i></a></td>";
							echo "</tr>";
						}
					} else {
						echo '<tr><td colspan="5">Belum ada data.</td></tr>';
					}

					?>

				</table>
			</div>
			<br>
			<h4>Usulan Inovasi Kepada BMT</h4>

			<div class='table-responsive'>
				<table class="table table-striped table-bordered">
					<tr>
						<th width="20">No</th>
						<th width="500">Usulan</th>
						<th width="500">Status</th>
						<th width="100">Tanggal</th>
						<th width="100">&nbsp;</th>
					</tr>
					<?php

					if (count($aql_inovasi) > 0) {
						$i = 1;
						foreach ($aql_inovasi as $row) {
							$status = ($row['status'] == 1) ? 'Ditindaklanjuti' : 'Tidak ditindaklanjuti';
							echo "<tr>";
							echo "<td>" . $i++ . "</td>";
							echo "<td>" . $row['inovasi_kepada_bmt'] . "</td>";
							echo "<td>" . $status . "</td>";
							echo "<td>" . $row['tanggal'] . "</td>";
							echo "<td><a title='Hapus' class='delete btn btn-xs btn-danger' data-toggle='modal' data-target='#confirm-delete' data-href='" . base_url('kinerja/individu/hapus_aql/' . $row['id']) . "'> <i class='fa fa-trash-o'></i></a> <a title='Edit' class='btn btn-xs btn-info' href='" . base_url('kinerja/individu/aql/' . $row['id']) . "'> <i class='fa fa-pencil'></i></a></td>";
							echo "</tr>";
						}
					} else {
						echo '<tr><td colspan="5">Belum ada data.</td></tr>';
					}

					?>

				</table>
				</ </div> <!-- /.box-body -->
			</div>
			<!-- /.box -->


		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	</section>

	<script>
		$("#kinerja_individu").addClass('active');
		$("#kinerja_individu .submenu_aql").addClass('active');

		$(document).ready(function() {
			$('#select_menu').change(function() {
				location.href = $(this).val();
			});
		});
	</script>


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
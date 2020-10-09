<?php include('sidebar_detail.php'); ?>
<div class="col-md-12">
	<div class="box box-body">

		<h4><i class="fa fa-gear"></i> &nbsp; Hifdz Al Mal / Penjagaan Harta
			<?php if ($this->session->userdata('role') == 3) { ?>
				<a title="Edit" class="delete btn btn-sm btn-success pull-right" href="<?php echo base_url('kinerja/individu/mal'); ?>"> <i class="fa fa-plus"></i>
					Tambah Data</a>
			<?php } ?>
		</h4>
		<hr>
		<select id="select_menu" class="form-control">
			<option value="#">Pilih Kinerja</option>
			<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>">Hifdz Ad Din / Penjagaan Agama</option>
			<option value="<?= base_url('kinerja/individu/detail_nafs/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz An Nafs / Penjagaan Jiwa</option>
			<option value="<?= base_url('kinerja/individu/detail_aql/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz Al 'Aql / Penjagaan Pikiran</option>
			<option value="<?= base_url('kinerja/individu/detail_mal/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz An mal / Penjagaan Keturunan</option>
			<option value="<?= base_url('kinerja/individu/detail_mal/' . $user['id']) ?>" class="btn btn-default btn-md" selected="selected">Hifdz Al Mal / Penjagaan Harta</option>
		</select>

	</div>
	<!-- About Me Box -->
	<div class="box box-primary">

		<div class="box-body">

			<div class="btn-group" role="group" style="margin-bottom:20px;">
				<?php if ($tahun_mal) {
					foreach ($tahun_mal as $tahun_mal) { ?>
						<a href="<?= base_url('kinerja/individu/detail_mal/' . $user['id'] . '/' . $tahun_mal['periode_thn']); ?>" class="btn btn-success"><?= $tahun_mal['periode_thn']; ?></a>
				<?php }
				} ?>
			</div>


			<?php



			if (count($mal) > 0) {

				foreach ($mal as $key => $row) {
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
							echo "\t<th class='text-center'><a title='Hapus' class='delete btn btn-xs btn-danger' data-toggle='modal' data-target='#confirm-delete' data-href='" . base_url('kinerja/individu/hapus_mal/' . $cell) . "'> <i class='fa fa-trash-o'></i></a> <a title='Edit' class='btn btn-xs btn-info' href='" . base_url('kinerja/individu/mal/' . $cell) . "'> <i class='fa fa-pencil'></i></a></th>\n"; // write cells next to each other
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
			} ?>



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
	$("#kinerja_individu .submenu_mal").addClass('active');

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
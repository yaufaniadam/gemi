<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body">
				<div class="col-md-6">
					<h4><i class="fa fa-pencil"></i> &nbsp; Minat dan Keahlian</h4>
				</div>


			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body m-form-body">
					<?php if (isset($msg) || validation_errors() !== '') : ?>
						<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-warning"></i> Alert!</h4>
							<?= validation_errors(); ?>
							<?= isset($msg) ? $msg : ''; ?>
						</div>
					<?php endif; ?>


					<?php

					echo form_open(base_url('profile/minat'), 'class="form-horizontal"');  ?>
					<p>Pilih beberapa minat dan keahlian yang Anda kuasai di bawah ini lalu
						tekan tombol <strong>Simpan</strong></p><br>
					<?php foreach ($kategori_minat as $row) { ?>

						<div class="col-md-3">
							<div class="panel panel-default">
								<div class="panel-heading"><?= $row['kategori_minat']; ?></div>
								<div class="panel-body">
									<?php
									if ($minat) {
										$ada =	explode(",", $minat['minat']);
									}

									foreach (get_sub_kategori_minat($row['id']) as $key => $sub_minat) { ?>
										<input name="minat[]" type="checkbox" value="<?= $sub_minat['id']; ?>" <?= ($minat) ? (in_array($sub_minat['id'], $ada)) ? "checked" : "" : ""; ?>>
										<?= $sub_minat['sub_kategori_minat']; ?> <br>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>

					<div class="form-group">
						<div class="col-md-12">
							<input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
						</div>
					</div>

					<?php echo form_close(); ?>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>

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
	$("#pribadi").addClass('active');
	$("#pribadi .submenu_minat").addClass('active');
</script>
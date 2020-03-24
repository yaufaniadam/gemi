<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body with-border">
				<div class="col-md-6">
					<h4><i class="fa fa-user"></i> &nbsp; Hifdz Al’Aql (Pemeliharaan Akal) </h4>
				</div>
				<div class="col-md-6">
					<a title="Edit" class="delete btn btn-sm btn-success pull-right" data-toggle="modal"
						data-target="#confirm-delete" data-href="<?php echo base_url(); ?>"> <i class="fa fa-plus"></i> Tambah
						Data</a>
				</div>
			</div>

			<div class="box">
				<div class="box-header with-border">


				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body my-form-body">



				</div>
				<!-- /.box-body -->
			</div>
		</div><!-- /.col  -->
	</div><!-- /.row  -->

</section>

<div class="modal fade" id="confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Hifdz Al’Aql (Pemeliharaan Akal)</h4>

			</div>
			<div class="modal-body">
				<?php echo form_open(base_url('kinerja/individu/aql'), 'class="form-horizontal"' )?>

				
				<div class="form-group">
					<label for="periode" class="col-sm-6 control-label">Periode</label>
					<div class="col-sm-5">
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group">
									<?php option_bulan(); ?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<?php option_tahun(); ?>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="nama_prodi" class="col-sm-6 control-label">Jumlah Pelatihan yang diikuti</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input type="text" name="pelatihan" class="form-control"
								value="<?php if(validation_errors()) {echo set_value('pelatihan'); } else { echo $individu_aql['pelatihan']; }  ?>"
								placeholder="">
							<span class="input-group-addon"> / bulan</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="inovasi_kepada_bmt" class="col-sm-6 control-label">Inovasi yang disampaikan kepada BMT</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input type="number" name="inovasi_kepada_bmt" class="form-control"
								value="<?php if(validation_errors()) {echo set_value('inovasi_kepada_bmt'); } else { echo $individu_aql['inovasi_kepada_bmt']; }  ?>"><span
								class="input-group-addon"> / bulan</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="usulan_dipakai" class="col-sm-6 control-label">Usulan Inovasi yang dipakai oleh BMT</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input type="number" name="usulan_dipakai" class="form-control"
								value="<?php if(validation_errors()) {echo set_value('usulan_dipakai'); } else { echo $individu_aql['usulan_dipakai']; }  ?>"><span
								class="input-group-addon"> / bulan</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="kajian_rutin" class="col-sm-6 control-label">Kajian rutin mingguan dalam sebulan</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input type="number" name="kajian_rutin" class="form-control"
								value="<?php if(validation_errors()) {echo set_value('kajian_rutin'); } else { echo $individu_aql['kajian_rutin']; }  ?>"><span
								class="input-group-addon"> / bulan</span>
						</div>
					</div>
				</div>



			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
			</div>
		</div>
		<!-- /.modal-content -->
		<?php echo form_close(); ?>
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
	$("#kinerja_individu").addClass('active');
	$("#kinerja_individu .submenu_aql").addClass('active');

	//modal
	$('#confirm-delete').on('show.bs.modal', function (e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});

	<
	/script

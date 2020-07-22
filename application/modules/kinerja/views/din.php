<section class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="box box-body">

				<h4><i class="fa fa-gear"></i> &nbsp; Tambah Hifdz Ad Din / Pemeliharaan Agama
					<a title="Edit" class="delete btn btn-sm btn-success pull-right" href="<?php echo base_url('kinerja/individu/detail_din'); ?>"> <i class="fa fa-chevron-left"></i>
						Kembali</a>
				</h4>
				<hr>

				<!-- form start -->
				<div class="box-body my-form-body">
					<?php if (isset($msg) || validation_errors() !== '') : ?>
						<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-warning"></i> Alert!</h4>
							<?= validation_errors(); ?>
							<?= isset($msg) ? $msg : ''; ?>
						</div>
					<?php endif; ?>

					<?php echo form_open(base_url('kinerja/individu/din'), 'class="form-horizontal"') ?>

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
						<label for="nama_prodi" class="col-sm-6 control-label">Frekuensi melaksanakan shalat wajib
							berjamaah di awal
							waktu</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="text" name="sholat_awal_waktu" class="form-control" value="<?php if (validation_errors()) {
																											echo set_value('sholat_awal_waktu');
																										}  ?>" placeholder="">
								<span class="input-group-addon"> / hari</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="nama_prodi" class="col-sm-6 control-label">Frekuensi shalat berjamaah di
							masjid</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" name="jamaah_masjid" class="form-control" value="<?php if (validation_errors()) {
																											echo set_value('jamaah_masjid');
																										}   ?>"><span class="input-group-addon" min="1" max="5"> / hari</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="nama_prodi" class="col-sm-6 control-label">Jumlah halaman tilawah qur’an</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" name="tilawah_quran" class="form-control" value="<?php if (validation_errors()) {
																											echo set_value('tilawah_quran');
																										}  ?>"><span class="input-group-addon" min="1" max="500"> / bulan</span>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label for="nama_prodi" class="col-sm-6 control-label">Frekuensi shalat tahajjud</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" name="tahajjud" class="form-control" value="<?php if (validation_errors()) {
																										echo set_value('tahajjud');
																									} ?>"><span class="input-group-addon" min="1" max="30"> / bulan</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="nama_prodi" class="col-sm-6 control-label">Puasa sunnah Senin Kamis</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" name="puasa_sunnah" class="form-control" value="<?php if (validation_errors()) {
																											echo set_value('puasa_sunnah');
																										} ?>"><span class="input-group-addon" min="1" max="8"> / bulan</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="nama_prodi" class="col-sm-6 control-label">Shalat dhuha sebelum beraktivitas</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" name="dhuha" class="form-control" value="<?php if (validation_errors()) {
																									echo set_value('dhuha');
																								} ?>"><span class="input-group-addon" min="1" max="30">
									/ bulan</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
						</div>
					</div>

				</div>

			</div>
			<!-- /.modal-content -->
			<?php echo form_close(); ?>
		</div>
		<!-- /.box-body -->
	</div>
	</div>
	<!-- /.col -->
	</div>
	<!-- /.row -->

</section>


<script>
	$("#kinerja_individu").addClass('active');
	$("#kinerja_individu .submenu_din").addClass('active');
</script>
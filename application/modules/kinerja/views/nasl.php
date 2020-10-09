<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body with-border">
				<div class="col-md-6">
					<h4><i class="fa fa-user"></i> &nbsp; Kinerja Individu</h4>
				</div>
				<div class="col-md-6">
					<a href="<?= base_url('kinerja/individu/detail_nasl'); ?>" class="btn btn-success btn-md pull-right">Lihat
						Data</a>
				</div>
			</div>

			<div class="box">
				<div class="box-header with-border">
					<h4>Hifdz An Nasl (Pemeliharaan Keluarga) </h4>

				</div>

				<!-- /.box-header -->
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

					<?php echo form_open(base_url('kinerja/individu/nasl'), 'class="form-horizontal"') ?>


					<input type="hidden" name="id" value="<?= (isset($id) ? $id : ''); ?>">
					<div class="form-group">
						<label for="periode" class="col-sm-6 control-label">Periode</label>
						<div class="col-sm-5">
							<div class="row">
								<div class="col-xs-6">
									<div class="input-group">
										<?php option_bulan((isset($id) ? $id : ''), (isset($individu_nasl)) ? $individu_nasl['periode_bln'] : ''); ?>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="input-group">
										<?php option_tahun((isset($id) ? $id : ''), (isset($individu_nasl)) ? $individu_nasl['periode_thn'] : ''); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="kesehatan_keluarga" class="col-sm-6 control-label">Kesehatan anggota keluarga<span class="help-block"> (Jumlah hari anggota keluarga yang sakit dalam sebulan dan sembuh)</span></label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="text" name="kesehatan_keluarga" class="form-control" value="<?= (validation_errors()) ?  set_value('kesehatan_keluarga') : ((isset($individu_nasl)) ? $individu_nasl['kesehatan_keluarga'] : ""); ?>" placeholder="">
								<span class="input-group-addon"> / bulan</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="partisipasi_keluarga" class="col-sm-6 control-label">Partisipasi keluarga besar di kegiatan BMT </label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="number" name="partisipasi_keluarga" class="form-control" value="<?= (validation_errors()) ?  set_value('partisipasi_keluarga') : ((isset($individu_nasl)) ? $individu_nasl['partisipasi_keluarga'] : ""); ?>"><span class="input-group-addon"> / bulan</span>
							</div>
						</div>
					</div>
					<hr>

					<div class="form-group">
						<div class="col-md-12">
							<input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.box-body -->
			</div>
		</div><!-- /.col  -->
	</div><!-- /.row  -->

</section>

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
	$("#kinerja_individu").addClass('active');
	$("#kinerja_individu .submenu_nasl").addClass('active');
</script>
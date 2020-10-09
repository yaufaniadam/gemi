<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body with-border">
				<div class="col-md-6">
					<h4><i class="fa fa-user"></i> &nbsp; Kinerja Individu</h4>
				</div>
				<div class="col-md-6">
					<a href="<?= base_url('kinerja/individu/detail_mal'); ?>" class="btn btn-success btn-md pull-right">Lihat Data</a>
				</div>
			</div>

			<div class="box">
				<div class="box-header with-border">
					<h4>Hifdz Al-Maal (Pemeliharaan Harta) </h4>

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

					<?php echo form_open(base_url('kinerja/individu/mal'), 'class="form-horizontal"') ?>
					<input type="hidden" name="id" value="<?= (isset($id) ? $id : ''); ?>">
					<div class="form-group">
						<label for="periode" class="col-sm-6 control-label">Periode</label>
						<div class="col-sm-5">
							<div class="row">
								<div class="col-xs-6">
									<div class="input-group">
										<?php option_bulan((isset($id) ? $id : ''), (isset($mal)) ? $mal['periode_bln'] : ''); ?>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="input-group">
										<?php option_tahun((isset($id) ? $id : ''), (isset($mal)) ? $mal['periode_thn'] : ''); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="saving" class="col-sm-6 control-label">Jumlah saving untuk pendidikan anak</label>
						<div class="col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"> Rp</span>
								<input type="number" name="saving" class="form-control" value="<?= (validation_errors()) ?  set_value('saving') : ((isset($mal)) ? $mal['saving'] : ""); ?>" placeholder="">
								<span class="input-group-addon"> / bulan</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="hutang" class="col-sm-6 control-label">Jumlah hutang/pembiayaan yang ditanggung keluarga jika
							ada</label>
						<div class="col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"> Rp</span>
								<input type="number" name="hutang" class="form-control" value="<?= (validation_errors()) ?  set_value('hutang') : ((isset($mal)) ? $mal['hutang'] : ""); ?>"><span class="input-group-addon">
									/ bulan</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="hutang" class="col-sm-6 control-label">Tempat /lembaga tempat berhutang</label>
						<div class="col-sm-6">
							<div class="input-group">

								<input type="text" name="tempat_hutang" class="form-control" value="<?= (validation_errors()) ?  set_value('tempat_hutang') : ((isset($mal)) ? $mal['tempat_hutang'] : ""); ?>">
							</div>
						</div>
					</div>

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
	$("#kinerja_individu .submenu_mal").addClass('active');
</script>

<section class="content">

  	<div class="row">
<div class="col-md-12">
	<div class="box box-body">

		<h4><i class="fa fa-gear"></i> &nbsp; Tambah Hifdz Al’Aql / Pemeliharaan Akal
		<a title="Edit" class="delete btn btn-sm btn-success pull-right" href="<?php echo base_url('kinerja/individu/detail_aql'); ?>"> <i class="fa fa-chevron-left"></i> Kembali</a>
		</h4>
        <hr>		
        
		<!-- form start -->
		<div class="box-body my-form-body">
			<?php if(isset($msg) || validation_errors() !== ''): ?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-warning"></i> Alert!</h4>
				<?= validation_errors();?>
				<?= isset($msg)? $msg: ''; ?>
			</div>
			<?php endif; ?>

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
								value="<?php if(validation_errors()) {echo set_value('pelatihan');  }  ?>"
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
								value="<?php if(validation_errors()) {echo set_value('inovasi_kepada_bmt'); }   ?>"><span
								class="input-group-addon"> / bulan</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="usulan_dipakai" class="col-sm-6 control-label">Usulan Inovasi yang dipakai oleh BMT</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input type="number" name="usulan_dipakai" class="form-control"
								value="<?php if(validation_errors()) {echo set_value('usulan_dipakai'); } ?>"><span
								class="input-group-addon"> / bulan</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="kajian_rutin" class="col-sm-6 control-label">Kajian rutin mingguan dalam sebulan</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input type="number" name="kajian_rutin" class="form-control"
								value="<?php if(validation_errors()) {echo set_value('kajian_rutin'); } ?>"><span
								class="input-group-addon"> / bulan</span>
						</div>
					</div>
				</div>

			<div class="form-group">
				<div class="col-md-11">
					<input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
				</div>
			</div>
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
	$("#kinerja_individu .submenu_nafs").addClass('active');

</script>

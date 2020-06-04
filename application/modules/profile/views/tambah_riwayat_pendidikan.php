<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body">
				<div class="col-md-6">
					<h4><i class="fa fa-graduation-cap"></i> &nbsp; Tambah Riwayat Pendidikan</h4>
				</div>
				<div class="col-md-6 text-right">

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
					<?php if(isset($msg) || validation_errors() !== ''): ?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-warning"></i> Alert!</h4>
						<?= validation_errors();?>
						<?= isset($msg)? $msg: ''; ?>
					</div>
					<?php endif; ?>
					<?php echo form_open_multipart(base_url('profile/tambah_riwayat_pendidikan/'), 'class="form-horizontal"' )?>

					<div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Jenjang</label>
						<div class="col-sm-3">
							<select name="jenjang" class="form-control">
								<option value="" <?php echo  set_select('jenjang', '', TRUE); ?>>Pilih Jenjang</option>
								<option value="SMA" <?php echo  set_select('jenjang', 'SMA'); ?>>
									SMA</option>
								<option value="SMK" <?php echo  set_select('jenjang', 'SMK'); ?>>
                                    SMK</option>
                                <option value="Diploma" <?php echo  set_select('jenjang', 'Diploma'); ?>>
									Diploma</option>
								<option value="S1" <?php echo  set_select('jenjang', 'S1'); ?>>
									S1</option>
								<option value="S2" <?php echo  set_select('jenjang', 'S2'); ?>>
									S2</option>
								<option value="S3" <?php echo  set_select('jenjang', 'S3'); ?>>
									S3</option>

							</select>
						</div>

					</div>

					<div class="form-group">
						<label for="lembaga" class="col-sm-2 control-label">Lembaga Pendidikan</label>

						<div class="col-sm-9">
							<input type="text" name="lembaga" value="<?= set_value('lembaga'); ?>" class="form-control"
								id="lembaga" placeholder="">
						</div>
					</div>

					<div class="form-group">
						<label for="jurusan" class="col-sm-2 control-label">Jurusan/Program Studi</label>

						<div class="col-sm-9">
							<input type="text" name="jurusan" value="<?= set_value('jurusan'); ?>" class="form-control"
								id="jurusan" placeholder="">
						</div>
					</div>

					<div class="form-group">
						<label for="tahun_lulus" class="col-sm-2 control-label">Tahun Lulus</label>

						<div class="col-sm-9">
							<input type="number" style="width:100px" min="2000" max="2030" name="tahun_lulus" value="<?= set_value('tahun_lulus'); ?>"
								class="form-control" id="tahun_lulus" placeholder="">
						</div>
                    </div>
                    
					<div class="form-group">
						<label for="tahun_lulus" class="col-sm-2 control-label">File Ijazah</label>

						<div class="col-sm-9">
							<input type="file" min="2010" max="2030" name="file_ijazah" 					class="form-control" >
						</div>
					</div>



					<div class="form-group">
						<div class="col-md-11">
							<input type="submit" name="submit" value="Simpan"
								class="btn btn-info pull-right">
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>

</section>

<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script>
	$("#pribadi").addClass('active');
	$("#pribadi .submenu_tambah_keluarga").addClass('active');

	$("#tgl_lahir").inputmask("yyyy/mm/dd", {
		"placeholder": "yyyy/mm/dd"
	});

</script>

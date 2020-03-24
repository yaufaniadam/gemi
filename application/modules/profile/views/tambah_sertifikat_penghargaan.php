<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body">
				<div class="col-md-6">
					<h4><i class="fa fa-certificate"></i> &nbsp; Tambah Sertifikat & Penghargaan</h4>
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
					<?php echo form_open_multipart(base_url('profile/tambah_sertifikat_penghargaan/'), 'class="form-horizontal"' )?>

					<div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Jenis</label>
						<div class="col-sm-3">
							<select name="jenis" class="form-control">
								<option value="" <?php echo  set_select('jenis', '', TRUE); ?>>Pilih Jenis</option>
								<option value="Sertifikat" <?php echo  set_select('jenis', 'Sertifikat'); ?>>
                                Sertifikat</option>
								<option value="Piagam" <?php echo  set_select('jenjang', 'Piagam'); ?>>
                                Piagam</option>x
							</select>
						</div>

					</div>

					<div class="form-group">
						<label for="keterangan" class="col-sm-2 control-label">Keterangan</label>

						<div class="col-sm-9">
							<input type="text" name="keterangan" value="<?= set_value('keterangan'); ?>" class="form-control"
								id="keterangan" placeholder="Nama Kegiatan atau nama Piagam Penghargaan">
						</div>
					</div>

					<div class="form-group">
						<label for="yang_menerbitkan" class="col-sm-2 control-label">Yang Menerbitkan</label>

						<div class="col-sm-9">
							<input type="text" name="yang_menerbitkan" value="<?= set_value('yang_menerbitkan'); ?>" class="form-control"
								id="yang_menerbitkan" placeholder="">
						</div>
					</div>

					<div class="form-group">
						<label for="tahun" class="col-sm-2 control-label">Tahun</label>

						<div class="col-sm-9">
							<input type="number" style="width:100px" min="2010" max="2030" name="tahun" value="<?= set_value('tahun'); ?>"
								class="form-control" id="tahun" placeholder="">
						</div>
                    </div>
                    
					<div class="form-group">
						<label for="tahun_lulus" class="col-sm-2 control-label">File Sertifikat/Piagam</label>

						<div class="col-sm-9">
							<input type="file" min="2010" max="2030" name="file_sertifikat" 					class="form-control" >
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

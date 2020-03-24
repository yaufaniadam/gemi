<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body">
				<div class="col-md-6">
					<h4><i class="fa fa-certificate"></i> &nbsp; Edit Sertifikat & Penghargaan</h4>
				</div>
				<div class="col-md-6 text-right">

				</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
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
					<?php echo form_open_multipart(base_url('profile/edit_sertifikat_penghargaan/'.$sertifikat_penghargaan['id']), 'class="form-horizontal"' )?>

					<div class="form-group">
						<label for="gender" class="col-sm-3 control-label">Jenis</label>
						<div class="col-sm-3">
							<select name="jenis" class="form-control">
								<option value="" <?php echo  set_select('jenis', '', TRUE); ?>>Pilih Jenis</option>
								<option value="Sertifikat" <?php echo (validation_errors()) ? set_select('jenis', 'Sertifikat') : ""; echo ($sertifikat_penghargaan['jenis'] == 'Sertifikat') ? "selected" : ""; ?>>
                                Sertifikat</option>
								<option value="Piagam" <?php echo (validation_errors()) ? set_select('jenis', 'Piagam') : ""; echo ($sertifikat_penghargaan['jenis'] == 'Piagam') ? "selected" : ""; ?>>
                                Piagam</option>x
							</select>
						</div>

					</div>

					<div class="form-group">
						<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>

						<div class="col-sm-9">
							<input type="text" name="keterangan" value="<?= (validation_errors()) ? set_value('keterangan') : $sertifikat_penghargaan['keterangan']; ?>" class="form-control"
								id="keterangan" placeholder="Nama Kegiatan atau nama Piagam Penghargaan">
						</div>
					</div>

					<div class="form-group">
						<label for="yang_menerbitkan" class="col-sm-3 control-label">Yang Menerbitkan</label>

						<div class="col-sm-9">
							<input type="text" name="yang_menerbitkan" value="<?= (validation_errors()) ? set_value('yang_menerbitkan') : $sertifikat_penghargaan['yang_menerbitkan']; ?>" class="form-control"
								id="yang_menerbitkan" placeholder="">
						</div>
					</div>

					<div class="form-group">
						<label for="tahun" class="col-sm-3 control-label">Tahun</label>

						<div class="col-sm-9">
							<input type="number" style="width:100px" min="2010" max="2030" name="tahun" value="<?= (validation_errors()) ? set_value('tahun') : $sertifikat_penghargaan['tahun']; ?>"
								class="form-control" id="tahun" placeholder="">
						</div>
                    </div>
                    
					<div class="form-group">
						<label for="tahun_lulus" class="col-sm-3 control-label">File Sertifikat/Piagam</label>

						<div class="col-sm-9">
							<input type="file" name="file_sertifikat" class="form-control" >
							<input type="hidden" name="file_sertifikat_hidden" value="<?= (validation_errors()) ? set_value('file_sertifikat_hidden') : $sertifikat_penghargaan['file_sertifikat']; ?>" >
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
        <div class="col-md-4">
			<div class="box">
				<div class="box-header with-border">
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body m-form-body">
                    <img style="width:100%;height:auto;" src="<?=base_url( $sertifikat_penghargaan['file_sertifikat']); ?>" />
                </div>
            </div>
        </div>
	</div>

</section>

<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script>
	$("#pribadi").addClass('active');
	$("#pribadi .submenu_sertifikat_penghargaan").addClass('active');

	$("#tgl_lahir").inputmask("yyyy/mm/dd", {
		"placeholder": "yyyy/mm/dd"
	});

</script>

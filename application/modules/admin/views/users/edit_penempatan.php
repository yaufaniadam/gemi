  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

  <section class="content">
  	<div class="row">
  		<div class="col-md-12">
  			<div class="box box-body with-border">
  				<div class="col-md-6">
  					<h4><i class="fa fa-plus"></i> &nbsp; Edit SK</h4>
  				</div>
  				<div class="col-md-6 text-right">
  					<a href="<?= base_url('admin/users/penempatan'); ?>" class="btn btn-success"><i class="fa fa-list"></i>
  						Semua SK</a>
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
  				<div class="box-body mys-form-body">
  					<?php if (isset($msg) || validation_errors() !== '') : ?>
  						<div class="alert alert-warning alert-dismissible">
  							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  							<h4><i class="icon fa fa-warning"></i> Alert!</h4>
  							<?= validation_errors(); ?>
  							<?= isset($msg) ? $msg : ''; ?>
  						</div>
  					<?php endif; ?>

  					<?php

						echo form_open_multipart(base_url('admin/users/edit_penempatan/' . $penempatan['id']), 'class="form-horizontal"');  ?>
  					<div class="form-group">
  						<label for="id_unit" class="col-sm-3 control-label">Nomor SK Pegawai</label>
  						<div class="col-sm-9">
  							<input type="text" name="no_sk_penempatan" class="form-control" value="<?php echo (validation_errors()) ? set_value('no_sk_penempatan') : $penempatan['no_sk_penempatan'];  ?>">

  						</div>
  					</div>

  					<div class="form-group">
  						<label for="awal_penempatan" class="col-sm-3 control-label">Periode (Bulan/Tanggal/Tahun)</label>

  						<div class="col-sm-9">
  							<div class="row">
  								<div class="col-sm-5">
  									<div class="input-group date">
  										<div class="input-group-addon">
  											<i class="fa fa-calendar"></i>
  										</div>
  										<?php $awal = date_format(date_create($penempatan['awal_penempatan']), 'd-M-Y');
											$akhir = date_format(date_create($penempatan['akhir_penempatan']), 'd-M-Y');

											?>
  										<input name="awal_penempatan" value="<?php echo (validation_errors()) ? set_value('awal_penempatan') : $awal; ?>" type="text" class="form-control pull-right" id="awal_penempatan">
  									</div>
  								</div>
  								<div class="col-sm-2"> <span style="padding-top:7px;display:inline-block;" class="text-center">hingga</span> </div>
  								<div class="col-sm-5">
  									<div class="input-group date">
  										<div class="input-group-addon">
  											<i class="fa fa-calendar"></i>
  										</div>
  										<input name="akhir_penempatan" value="<?php echo (validation_errors()) ? set_value('akhir_penempatan') :  $akhir;  ?>" type="text" class="form-control pull-right" id="akhir_penempatan">
  									</div>

  								</div>
  							</div>
  						</div>
  					</div>

  					<div class="form-group">
  						<label for="role" class="col-sm-3 control-label">Pilih Pegawai</label>

  						<div class="col-sm-9">
  							<select name="user_id" class="form-control">
  								<option value="">Pilih Pegawai
  									<?php !form_error('user_id') ? $val = set_value('user_id') : $val = $penempatan['user_id']; ?>
  								</option>
  								<?php foreach ($staf as $staf) { ?>
  									<option value="<?php echo $staf['id']; ?>" <?php echo ($penempatan['user_id'] == $staf['id']) ? "selected=true" : ""; ?>>
  										<?php echo $staf['firstname']; ?></option>
  								<?php } ?>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label for="role" class="col-sm-3 control-label">Pilih Kantor</label>

  						<div class="col-sm-9">
  							<select name="id_kantor" class="form-control">
  								<option value="">Pilih Kantor
  									<?php echo !form_error('id_kantor') ? $val = set_value('id_kantor') : $val = ''; ?></option>
  								<?php foreach ($kantor as $kantor) { ?>
  									<option value="<?php echo $kantor['id']; ?>" <?php echo ($penempatan['id_kantor'] == $kantor['id']) ? "selected=true" : ""; ?>>
  										<?php echo $kantor['kantor']; ?></option>
  								<?php } ?>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label for="id_unit" class="col-sm-3 control-label">Pilih Unit Kerja</label>
  						<div class="col-sm-9">
  							<select name="id_unit" class="form-control">
  								<option value="">Pilih Unit Kerja
  									<?php !form_error('id_unit') ? $val = set_value('id_unit') : $val = ''; ?></option>
  								<?php foreach ($unit_kerja as $unit_kerja) : ?>
  									<option value="<?= $unit_kerja['id']; ?>" <?php echo ($penempatan['id_unit'] == $unit_kerja['id']) ? "selected=true" : ""; ?>>
  										<?= $unit_kerja['nama_unit'];  ?></option>
  								<?php endforeach; ?>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label for="id_unit" class="col-sm-3 control-label">Keterangan</label>
  						<div class="col-sm-9">
  							<select name="keterangan" class="form-control">
  								<option value="">Pilih Keterangan
  									<?php !form_error('keterangan') ? $val = set_value('keterangan') : $val = ''; ?></option>
  								<?php foreach ($ket_penempatan as $ket_penempatan) : ?>
  									<option value="<?= $ket_penempatan['id']; ?>" <?php echo ($penempatan['keterangan'] == $ket_penempatan['id']) ? "selected=true" : ""; ?>>
  										<?= $ket_penempatan['keterangan'];  ?></option>
  								<?php endforeach; ?>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label for="id_unit" class="col-sm-3 control-label">Jabatan</label>
  						<div class="col-sm-9">
  							<select name="jabatan" class="form-control">
  								<option value="">Pilih Jabatan
  									<?php !form_error('jabatan') ? $val = set_value('jabatan') : $val = ''; ?></option>
  								<option value="pegawai" <?php echo ($penempatan['jabatan'] == 'pegawai') ? "selected=true" : ""; ?>>
  									Pegawai</option>
  								<option value="manager" <?php echo ($penempatan['jabatan'] == 'manager') ? "selected=true" : ""; ?>>
  									Manager</option>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label for="id_unit" class="col-sm-3 control-label">File SK Pegawai</label>
  						<div class="col-sm-9">

  							<input type="file" name="file_sk_penempatan" class="form-control">
  							<input type="hidden" name="file_sk_hidden" class="form-control" value="<?= $penempatan['file_sk_penempatan']; ?>">
  						</div>
  					</div>



  					<div class="form-group">
  						<div class="col-md-12">
  							<input type="submit" name="submit" value="Ubah SK" class="btn btn-info pull-right">
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
  					<img style="width:100%;height:auto;" src="<?= base_url($penempatan['file_sk_penempatan']); ?>" />
  				</div>
  			</div>
  		</div>
  	</div>

  </section>
  <script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script>
  	$("#pengguna").addClass('active');
  	$("#pengguna .submenu_useradd").addClass('active');

  	//Date picker
  	$('#awal_penempatan').datepicker({
  		autoclose: true,
  		format: 'dd-M-yyyy',
  	});
  	//Date picker
  	$('#akhir_penempatan').datepicker({
  		autoclose: true,
  		format: 'dd-M-yyyy',

  	});
  </script>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body">
				<div class="col-md-6">
					<h4><i class="fa fa-pencil"></i> &nbsp; Ubah Data Pribadi Saya</h4>
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
					<?php echo form_open_multipart(base_url('profile/edit'), 'class="form-horizontal"') ?>

					<div class="form-group">


						<div class="col-sm-12">

							<span style="display:block; text-align: center;">

								<?php if ($user['photo'] == '') { ?>

								<img style="width:130px;height:auto;" class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>public/dist/img/user1-128x128.jpg"
									alt="User profile picture">

								<?php } else { ?>

								<img style="width:130px;height:auto;" class="profile-user-img img-fluid img-circle" src="<?= base_url($user['photo']); ?>">

								<?php } ?>

							</span>

						</div>
					</div>

					<div class="form-group">
						<label for="foto_profil" class="col-sm-2 control-label">Foto Profil</label>

						<div class="col-sm-9">
							<input type="file" name="foto_profil" class="form-control">
							<input type="hidden" name="foto_profil_hidden" value="<?= $user['photo']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>

						<div class="col-sm-9">

							<span class="btn btn-md btn-default"
								style="display:block; text-align: left;"><?= $user['username']; ?></span>

						</div>
					</div>

					<div class="form-group">
						<label for="firstname" class="col-sm-2 control-label">Nama Lengkap</label>

						<div class="col-sm-9">
							<input type="text" name="firstname" value="<?php if (validation_errors()) {
                                                            echo set_value('firstname');
                                                          } else {
                                                            echo $user['firstname'];
                                                          }  ?>" class="form-control" id="firstname" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>

						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" name="tempat_lahir" value="<?php if (validation_errors()) {
                                                                  echo set_value('tempat_lahir');
                                                                } else {
                                                                  echo $user['tempat_lahir'];
                                                                }  ?>" class="form-control" id="tempat_lahir"
										placeholder="">
								</div>
								<div class="col-sm-6">
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i> Tanggal Lahir
										</div>
										<input name="tgl_lahir" value="<?php if (validation_errors()) {
                                                      echo set_value('tgl_lahir');
                                                    } else {
                                                      echo $user['tgl_lahir'];
                                                    }  ?>" type="text" class="form-control pull-right" id="tgl_lahir">
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Jenis Kelamin</label>

						<div class="col-sm-3">
							<select name="jenis_kelamin" class="form-control">
								<option value="" <?php echo set_select('jenis_kelamin', '', TRUE); ?>>Pilih Jenis Kelamin</option>
								<option value="Laki-laki" <?php if (validation_errors()) {
                                            echo set_select('jenis_kelamin', 'Laki-laki');
                                          } else {
                                            if ($user['jenis_kelamin'] == 'Laki-laki') {
                                              echo "selected";
                                            }
                                          } ?>>
									Laki-laki</option>
								<option value="Perempuan" <?php if (validation_errors()) {
                                            echo set_select('jenis_kelamin', 'Perempuan');
                                          } else {
                                            if ($user['jenis_kelamin'] == 'Perempuan') {
                                              echo "selected";
                                            }
                                          } ?>>
									Perempuan</option>
							</select>
						</div>

					</div>
					<div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Agama</label>

						<div class="col-sm-3">
							<select name="agama" class="form-control">
								<option value="" <?php echo set_select('agama', '', TRUE); ?>>Pilih Agama</option>
								<option value="Islam" <?php if (validation_errors()) {
                                            echo set_select('agama', 'Islam');
                                          } else {
                                            if ($user['agama'] == 'Islam') {
                                              echo "selected";
                                            }
                                          } ?>>
									Islam</option>
								<option value="Katolik" <?php if (validation_errors()) {
                                            echo set_select('agama', 'Katolik');
                                          } else {
                                            if ($user['agama'] == 'Katolik') {
                                              echo "selected";
                                            }
                                          } ?>>
									Katolik</option>
								<option value="Kristen" <?php if (validation_errors()) {
                                            echo set_select('agama', 'Kristen');
                                          } else {
                                            if ($user['agama'] == 'Kristen') {
                                              echo "selected";
                                            }
                                          } ?>>
									Kristen</option>
								<option value="Hindu" <?php if (validation_errors()) {
                                            echo set_select('agama', 'Hindu');
                                          } else {
                                            if ($user['agama'] == 'Hindu') {
                                              echo "selected";
                                            }
                                          } ?>>
									Hindu</option>
								<option value="Budha" <?php if (validation_errors()) {
                                            echo set_select('agama', 'Budha');
                                          } else {
                                            if ($user['agama'] == 'Budha') {
                                              echo "selected";
                                            }
                                          } ?>>
									Budha</option>
								<option value="Konghuchu" <?php if (validation_errors()) {
                                            echo set_select('agama', 'Konghuchu');
                                          } else {
                                            if ($user['agama'] == 'Konghuchu') {
                                              echo "selected";
                                            }
                                          } ?>>
									Konghuchu</option>
							</select>
						</div>

					</div>

					<div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Status Perkawinan</label>

						<div class="col-sm-3">
							<select name="status" class="form-control">
								<option value="" <?php echo set_select('status', '', TRUE); ?>>Pilih Status Perkawinan</option>
								<option value="Kawin" <?php if (validation_errors()) {
                                            echo set_select('status', 'Kawin');
                                          } else {
                                            if ($user['status'] == 'Kawin') {
                                              echo "selected";
                                            }
                                          } ?>>
									Kawin</option>
								<option value="Tidak Kawin" <?php if (validation_errors()) {
                                            echo set_select('status', 'Tidak Kawin');
                                          } else {
                                            if ($user['status'] == 'Tidak Kawin') {
                                              echo "selected";
                                            }
                                          } ?>>
									Tidak Kawin</option>
								<option value="Duda" <?php if (validation_errors()) {
                                            echo set_select('status', 'Duda');
                                          } else {
                                            if ($user['status'] == 'Duda') {
                                              echo "selected";
                                            }
                                          } ?>>
									Duda</option>
								<option value="Janda" <?php if (validation_errors()) {
                                            echo set_select('status', 'Janda');
                                          } else {
                                            if ($user['status'] == 'Janda') {
                                              echo "selected";
                                            }
                                          } ?>>
									Janda</option>
							</select>
						</div>

					</div>

					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>

						<div class="col-sm-9">
							<input type="email" name="email" value="<?php if (validation_errors()) {
                                                        echo set_value('email');
                                                      } else {
                                                        echo $user['email'];
                                                      }  ?>" class="form-control" id="email" placeholder="">
						</div>
					</div>

					<div class="form-group">
						<label for="mobile_no" class="col-sm-2 control-label">Telepon</label>

						<div class="col-sm-9">
							<input style="width:350px" type="number" name="mobile_no" value="<?php if (validation_errors()) {
                                                                                  echo set_value('mobile_no');
                                                                                } else {
                                                                                  echo $user['mobile_no'];
                                                                                }  ?>" class="form-control"
								id="mobile_no" placeholder="">
						</div>
					</div>
					

					<div class="form-group">
						<label for="alamat" class="col-sm-2 control-label">Alamat</label>

						<div class="col-sm-9">
							<textarea name="alamat" class="form-control" id="alamat" placeholder=""><?php if (validation_errors()) {
                                                                                            echo set_value('alamat');
                                                                                          } else {
                                                                                            echo $user['alamat'];
                                                                                          }  ?></textarea>
						</div>
          </div>
          <div class="form-group">
						<label for="mobile_no" class="col-sm-2 control-label">Password</label>

						<div class="col-sm-9">
							<input type="password" name="password" class="form-control" id="password" placeholder="">
							<input type="hidden" name="password_hidden" value="<?=$user['password']; ?>">
						</div>
					</div>

					<hr>


					<div class="form-group">
						<div class="col-md-11">
							<input type="submit" name="submit" value="Ubah Data Pribadi" class="btn btn-info pull-right">
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
	$("#pribadi .submenu_user_edit").addClass('active');

	$("#tgl_lahir").inputmask("yyyy/mm/dd", {
		"placeholder": "yyyy/mm/dd"
	});

</script>

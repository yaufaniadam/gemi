<section class="content">

	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">

					<?php if ($user['photo'] == '') { ?>

					<img style="width:130px;height:auto;" class="profile-user-img img-responsive img-circle"
						src="<?= base_url(); ?>public/dist/img/user1-128x128.jpg" alt="User profile picture">

					<?php } else { ?>

					<img style="width:130px;height:auto;" class="profile-user-img img-responsive img-circle"
						src="<?= base_url($user['photo']); ?>">

					<?php } ?>

					<h3 class="profile-username text-center"><?= $user['firstname']; ?></h3>
					<?php
					  if($penempatan) { ?>
					<p class="text-muted text-center"><b><?=get_unit_kerja_by_id($penempatan['id_unit']); ?></b> di
						<?=get_kantor_by_id($penempatan['id_kantor']); ?></p>
					<?php } else { ?>
					<p class="text-muted text-center">Belum ada Penempatan.<br> <a
							href="<?=base_url('/admin/users/tambah_penempatan'); ?>">Kelola Penempatan</a>.</p>
					<?php } ?>
					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>Email</b> <a class="pull-right"><?= $user['email']; ?></a>
						</li>
						<li class="list-group-item">
							<b>Mobile</b> <a class="pull-right"><?= $user['mobile_no']; ?></a>
						</li>
						<li class="list-group-item">
							<b>Alamat</b> <a class="pull-right"><?= $user['alamat']; ?></a>
						</li>
					</ul>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- About Me Box --
  			<div class="box box-primary">
  				<div class="box-header with-border">
  					<h3 class="box-title">Anggota Keluarga</h3>
  				</div>
  				<!-- /.box-header --
  				<div class="box-body" style="padding-top:0">

  					<ul class="list-group list-group-unbordered">


  						<?php foreach ($data_keluarga as $keluarga) { ?>
  							<?php if ($keluarga['status_keluarga'] != 'anak') { ?>

  								<li class="list-group-item"><b><?= $keluarga['nama_keluarga'] ?></b> <a class="pull-right">
  										<?php if ($keluarga['jenis_kelamin'] == "Perempuan") {
												echo "Istri";
											} else {
												echo "Suami";
											} ?>
  									</a></li>

  							<?php  } else { ?>
  								<li class="list-group-item"><b><?= $keluarga['nama_keluarga'] ?></b> <a class="pull-right">Anak
  										(<?= $keluarga['anak_ke'] ?>)</a> </li>
  							<?php }
								?>
  						<?php } ?>

  					</ul>
  				</div>
  				<!-- /.box-body --
  			</div>
  			<!-- /.box -->
		</div>
		<!-- /.col -->

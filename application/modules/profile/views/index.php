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
					<?php if ($penempatan) { ?>
					<p class="text-muted text-center"><b><?= get_unit_kerja_by_id($penempatan['id_unit']); ?></b> di
						Kantor <?= get_kantor_by_id($penempatan['id_kantor']); ?></p>
					<?php } else { ?>
					<p class="text-muted text-center">Belum ada Penempatan.<br> <a
							href="<?= base_url('/admin/users/tambah_penempatan'); ?>">Kelola Penempatan</a>.</p>
					<?php } ?>
					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>Email</b> <a class="pull-right"><?= $user['email']; ?></a>
						</li>
						<li class="list-group-item">
							<b>Mobile</b> <a class="pull-right"><?= $user['mobile_no']; ?></a>
						</li>

					</ul>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<?php if ($user['status'] == "Menikah") { ?>
			<!-- About Me Box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-child"></i> &nbsp; Anggota Keluarga</h3>
				</div>
				<!-- /.box-header -->
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
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			<?php } ?>
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-id-card-o"></i> &nbsp; Profil Lengkap Pegawai</h3>
				</div>
				<div class="box-body" style="padding-top:0">

					<table class="table table-striped table-bordered">
						<tr>
							<td width="200">Nama Lengkap</td>
							<td><?= $user['firstname']; ?></td>
						</tr>
						<tr>
							<td width="200">Jenis Kelamin</td>
							<td><?= $user['jenis_kelamin']; ?></td>
						</tr>
						<tr>
							<td width="200">Tempat/Tgl Lahir</td>
							<td><?= $user['tempat_lahir']; ?>/<?= $user['tgl_lahir']; ?></td>
						</tr>
						<tr>
							<td width="200">Agama</td>
							<td><?= $user['agama']; ?></td>
						</tr>
						<tr>
							<td width="200">Status</td>
							<td><?= $user['status']; ?></td>
						</tr>
						<tr>
							<td width="200">Alamat</td>
							<td><?= $user['alamat']; ?></td>
						</tr>

					</table>

				</div>
			</div>


			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-id-card"></i> &nbsp; Catatan SK Pegawai</h3>
				</div>
				<div class="box-body" style="padding-top:0">

					<?php
					if ($penempatan) {
					?>
					<table class="table table-striped table-bordered">
						<tr>
							<th>No</th>
							<th>SK Penempatan</th>
							<th>Jabatan</th>
							<th>Unit kerja</th>
							<th>Kantor</th>
							<th>Periode</th>
							<th>Keterangan</th>
							<th>File SK</th>
						</tr>

						<?php $i = 1;
							foreach ($sk_penempatan as $row) { ?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $row['no_sk_penempatan']; ?></td>
							<td><?= $row['jabatan']; ?></td>
							<td><?= $row['nama_unit']; ?></td>
							<td><?= $row['kantor']; ?></td>
							<td><?= $row['awal_penempatan'] . ' - ' . $row['akhir_penempatan']; ?></td>
							<td><?= $row['keterangan']; ?></td>
							<td><a target="_blank" href="<?= base_url($row['file_sk_penempatan']); ?>">Unduh SK</a></td>
						</tr>

						<?php $i++;
							} ?>
					</table>
					<?php } else {
						echo "Belum ada data";
					}
					?>
				</div>
			</div>

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-graduation-cap"></i> &nbsp; Riwayat Pendidikan</h3>
				</div>
				<div class="box-body" style="padding-top:0">

					<?php
					if ($riwayat_pendidikan) {
					?>
					<table class="table table-striped table-bordered">
						<tr>
							<th>No</th>
							<th>Jenjang</th>
							<th>Lembaga Pendidikan</th>
							<th>Jurusan/Program Studi</th>
							<th>Tahun Lulus</th>
							<th>Ijazah</th>
						</tr>

						<?php $i = 1;
							foreach ($riwayat_pendidikan as $row) { ?>

						<tr>
							<td><?= $i; ?></td>
							<td><?= $row['jenjang']; ?></td>
							<td><?= $row['jurusan']; ?></td>
							<td><?= $row['lembaga']; ?></td>
							<td><?= $row['tahun_lulus']; ?></td>
							<td><a href="<?= base_url($row['file_ijazah']); ?>" target="_blank">Download</a></td>

						</tr>
						<?php $i++;
							} ?>
					</table>
					<?php } else {
						echo "Belum ada data";
					}
					?>
				</div>
			</div>

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-certificate"></i> &nbsp; Minat dan keahlian</h3>
				</div>
				<div class="box-body" style="padding-top:0">
					<?php foreach ($kategori_minat as $row) { ?>
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-heading"><?= $row['kategori_minat']; ?></div>
							<div class="panel-body">
								<?php
									$ada = explode(",", $minat['minat']);

									foreach (get_sub_kategori_minat($row['id']) as $key => $sub_minat) { ?>
								<input name="minat[]" type="checkbox" disabled="disabled" value="<?= $sub_minat['id']; ?>"
									<?= (in_array($sub_minat['id'], $ada)) ? "checked" : ""; ?>>
								<?= $sub_minat['sub_kategori_minat']; ?> <br>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-certificate"></i> &nbsp; Sertifikat dan Penghargaan</h3>
				</div>
				<div class="box-body" style="padding-top:0">

					<?php
					if ($sertifikat_penghargaan) {
					?>
					<table class="table table-striped table-bordered">
						<tr>
							<th>No</th>
							<th>Jenis</th>
							<th>Keterangan</th>
							<th>Yang Menerbitkan</th>
							<th>Tahun</th>
							<th>Sertifikat</th>

						</tr>

						<?php $i = 1;
							foreach ($sertifikat_penghargaan as $row) { ?>

						<tr>
							<td><?= $i; ?></td>

							<td><?= $row['jenis']; ?></td>
							<td><?= $row['keterangan']; ?></td>
							<td><?= $row['yang_menerbitkan']; ?></td>
							<td><?= $row['tahun']; ?></td>
							<td><a href="<?= base_url($row['file_sertifikat']); ?>" target="_blank">Download</a></td>


						</tr>
						<?php $i++;
							} ?>
					</table>
					<?php } else {
						echo "Belum ada data";
					}
					?>
				</div>
			</div>

			<div class="box box-body">

				<h4><i class="fa fa-gear"></i> &nbsp; Kinerja Individu Berdasarkan Maqasid Syariah</h4>
				<select id="select_menu" class="form-control">
					<option value="#">Pilih Kinerja</option>
					<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>">Hifdz Ad Din /
						Penjagaan Agama</option>
					<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>"
						class="btn btn-default btn-md">Hifdz An Nafs / Penjagaan Jiwa</option>
					<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>"
						class="btn btn-default btn-md">Hifdz Al 'Aql' / Penjagaan Pikiran</option>
					<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>"
						class="btn btn-default btn-md">Hifdz An Nasl / Penjagaan Keturunan</option>
					<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>"
						class="btn btn-default btn-md">Hifdz Al Mal / Penjagaan Harta</option>
				</select>
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

</section>

<script>
	$("#pribadi").addClass('active');
	$("#pribadi .submenu_user_detail").addClass('active');

	$(document).ready(function () {
		$('#select_menu').change(function () {
			location.href = $(this).val();
		});
	});

</script>

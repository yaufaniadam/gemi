<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body">
				<div class="col-md-6">
					<h4><i class="fa fa-pencil"></i> &nbsp; Riwayat Pendidikan</h4>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= base_url('profile/tambah_riwayat_pendidikan'); ?>" class="btn btn-success"><i
							class="fa fa-list"></i> Tambah Riwayat Pendidikan</a>
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
					<table id="standar" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenjang</th>
								<th>Lembaga Pendidikan</th>
								<th>Jurusan/Program Studi</th>
								<th>Tahun Lulus</th>
								<th>Ijazah</th>
								<th style="text-align:center;">Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php if ($riwayat_pendidikan) {
								$i = 1;
								foreach ($riwayat_pendidikan as $row) { ?>
							<tr>
								<td><?= $i; ?></td>
								<td><?= $row['jenjang']; ?></td>
								<td><?= $row['lembaga']; ?></td>
								<td><?= $row['jurusan']; ?></td>								
								<td><?= $row['tahun_lulus']; ?></td>
								<td><a href="<?=base_url($row['file_ijazah']); ?>" target="_blank">Download</a></td>

								<td style="text-align:center;">
									<a title="Edit" class="update btn btn-sm btn-success"
										href="<?php echo base_url('profile/edit_riwayat_pendidikan/' . $row['id']); ?>">
										<i class="fa fa-pencil-square-o"></i></a>
									<a title="Hapus" class="delete btn btn-sm btn-danger"
										data-href="<?= base_url('profile/hapus_riwayat_pendidikan/' . $row['id']); ?>"
										data-toggle="modal" data-target="#confirm-delete"> <i
											class="fa fa-trash-o"></i></a>


								</td>
							</tr>

							<?php $i++;
								}
							} ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>

</section>

<!-- Modal -->
<div id="confirm-delete" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Hapus</h4>
			</div>
			<div class="modal-body">
				<p>Anda yakin ingin menghapus data ini?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<a class="btn btn-danger btn-ok">Hapus</a>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	$('#confirm-delete').on('show.bs.modal', function (e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});

</script>

<script>
	$("#pribadi").addClass('active');
	$("#pribadi .submenu_riwayat_pendidikan").addClass('active');

</script>

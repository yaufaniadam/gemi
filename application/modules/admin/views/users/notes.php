<!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body with-border">
				<div class="col-md-6">
					<h4><i class="fa fa-plus"></i> &nbsp; Catatan & Rekomendasi Tentang Karyawan</h4>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= base_url('admin/users/tambah_notes/'.$user['id']); ?>" class="btn btn-success"><i
							class="fa fa-plus"></i> Tambah Catatan</a>
				</div>
			</div>
		</div>
	</div>


	<div class="box">
		<div class="box-header">
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive">
            <p class="alert alert-info">Catatan dan rekomendasi dari Manajemen, HRD dan Pimpinan kepada <strong><?=$user['firstname']; ?></strong></p>
            <?php foreach ($notes as $note) { ?>
			<div class="media">
				<div class="media-left">
					<a href="#">
						<?php if ($note['photo'] == '') { ?>

						<img style="width:70px;height:auto;" 
							src="<?= base_url(); ?>public/dist/img/user1-128x128.jpg" alt="User profile picture">

						<?php } else { ?>

						<img style="width:70px;height:auto;" 
							src="<?= base_url($note['photo']); ?>">

						<?php } ?>

					</a>
				</div>
				<div class="media-body">
                    <h4 class="media-heading"><?=$note['user_management']; ?></h4>
					<?=$note['notes']; ?>
				</div>
            </div>
            <?php } ?>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</section>


<div class="modal fade" id="confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Perhatian</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Tutuo">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Yakin ingin menghapus data ini?&hellip;</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<a class="btn btn-danger btn-ok">Hapus</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
	//datatable
	var table = $("#prodi").DataTable({
		order: [
			[1, "asc"]
		],
		language: {
			searchPlaceholder: "Cari data"
		}
	});

	//for nav
	$("#pengguna").addClass('active');
	$("#pengguna .submenu_penempatan").addClass('active');

	//modal
	$('#confirm-delete').on('show.bs.modal', function (e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});

</script>

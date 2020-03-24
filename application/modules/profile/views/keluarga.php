<!-- Main content -->
<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-body">
			<div class="col-md-6">
				<h4><i class="fa fa-pencil"></i> &nbsp; Anggota Keluarga</h4>
			</div>
			<div class="col-md-6 text-right">
				<a href="<?= base_url('profile/tambah_keluarga?id=anak'); ?>" class="btn btn-success"><i class="fa fa-list"></i>
					Tambah Anak</a> <a href="<?= base_url('profile/tambah_keluarga?id=pasutri'); ?>" class="btn btn-success"><i
						class="fa fa-list"></i> Tambah Pasutri</a>
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
							<th>Nama</th>
							<th>Status Keluarga</th>
							<th>Tanggal Lahir</th>
							<th>Jenis Kelamin</th>

							<!--  <th style="text-align: center">Pendidikan</th>-->

							<th style="text-align:center;">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php if($data_keluarga) {
              $i=1; foreach ($data_keluarga as $keluarga ) { ?>
						<tr>
							<td><?=$i; ?></td>
							<td><?php if(  $keluarga['status_keluarga'] != 'anak' ) {
                          echo "<strong>". $keluarga['nama_keluarga'] . "</strong><br /><em> ( " . $keluarga['pekerjaan'] . " di " . $keluarga['tempat_bekerja'] . " )</em>";
                        } else { 
                          echo "<strong>". $keluarga['nama_keluarga'] . "</strong>"; 
                        } 
                  ?>

							</td>
							<td>

								<?php if(  $keluarga['status_keluarga'] == 'anak' ) {
                          echo $keluarga['status_keluarga'] . " ke " . $keluarga['anak_ke'];
                        } else { 
                          if ($keluarga['jenis_kelamin'] == 'Perempuan' ) {
                            echo "Istri"; 
                          } else {
                            echo "Suami";
                          }
                        } 
                  ?>

							</td>
							<td><?=$keluarga['tempat_lahir']; ?> / <?=$keluarga['tgl_lahir']; ?></td>
							<td><?=$keluarga['jenis_kelamin']; ?></td>

							<!--  <td style="text-align: center"><?php 
                                    if( $keluarga['kelas'] > 0) {
                                        echo $keluarga['pendidikan'] .", Kelas/Tingkat" . $keluarga['kelas'];
                                      } else {
                                        echo $keluarga['pendidikan']; } ?></td>-->

							<td style="text-align:center;">
								<a title="Edit" class="update btn btn-sm btn-success"
									href="<?php echo base_url('profile/edit_'. $keluarga['status_keluarga'].'/' . $keluarga['id']); ?>">
									<i class="fa fa-pencil-square-o"></i></a>
								<a title="Hapus" class="delete btn btn-sm btn-danger"
									data-href="<?= base_url('profile/hapus_keluarga/'. $keluarga['id'] ); ?>" data-toggle="modal"
									data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a>


							</td>
						</tr>

						<?php $i++; }
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
	$("#pribadi .submenu_keluarga").addClass('active');

</script>

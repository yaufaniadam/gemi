  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

  <section class="content">
  	<div class="row">
  		<div class="col-md-12">
  			<div class="box box-body with-border">
  				<div class="col-md-6">
  					<h4><i class="fa fa-id-card"></i> &nbsp; Lihat SK Pegawai</h4>
  				</div>
  				<!-- <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Semua Staf</a>
        </div>-->
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
  				<div class="box-body mys-form-body">

  				<?php        
                if(count($penempatan) > 0) {
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

  						<?php $i=1; foreach ($penempatan as $row) { ?>
  						<tr>
  							<td><?=$i;?></td>
  							<td><?=$row['no_sk_penempatan'];?></td>
  							<td><?=$row['jabatan'];?></td>
  							<td><?=$row['nama_unit'];?></td>
  							<td><?=$row['kantor'];?></td>  							
  							<td><?=$row['awal_penempatan'].' - '.$row['akhir_penempatan'];?></td>
  							<td><?=$row['keterangan'];?></td>
  							<td><a target="_blank" href="<?=base_url($row['file_sk_penempatan']);?>">Unduh SK</a></td>
  						</tr>

  						<?php $i++; } ?>
  					</table>
  					<?php } else {
                        echo "Belum ada SK Penempatan";
                    
                }
            ?>

  				</div>
  				<!-- /.box-body -->
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
  		autoclose: true
  	});
  	//Date picker
  	$('#akhir_penempatan').datepicker({
  		autoclose: true,

  	});

  </script>

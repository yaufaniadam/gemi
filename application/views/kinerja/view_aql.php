<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-user"></i> &nbsp; Hifdz Al-Aql (Pemeliharaan Akal) </h4>
        </div>  
         <div class="col-md-6">   
          <a href="<?=base_url('/kinerja/individu/aql'); ?>" class="btn btn-success btn-md pull-right">Tambah Data</a>
        </div>       
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h4>Pengajian Rutin (<?=count($pengajian); ?>x) </h4>

        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-bodys">   
          

            <table class="table table-striped table-bordered">
              <tr>
                <th style="width:50px">No.</th>
                <th style="width:100px">Tanggal</th>
                <th style="width:45%">Nama Kegiatan</th>
                <th style="width:25%">Pembicara</th>
                <th style="width:25%">Tempat Kegiatan</th>
                <th>Aksi</th>
              </tr>  
          
             <?php  $i=1; foreach($pengajian as $row ) { ?>
              <tr>
                 <td><?=$i++; ?></td>
                <td><?=$row['tanggal']; ?></td>
                <td><?=$row['nama_kegiatan']; ?></td>
                <td><?=$row['pembicara']; ?></td>
                <td><?=$row['tempat']; ?></td>
                <td> <a title="Hapus" class="delete btn btn-sm btn-danger" data-href="<?= base_url('kinerja/individu/hapus_kegiatan/'. $row['id'] ); ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a></td>
              </tr>


             <?php } ?>

            </table>
          
            
           

        </div>
          <!-- /.box-body -->
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h4>Pelatihan (<?=count($pelatihan); ?>x) </h4>

        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-bodys">   
              
             <table class="table table-striped table-bordered">
              <tr>

                <th style="width:50px">No.</th>
                <th style="width:100px">Tanggal</th>
                <th style="width:45%">Nama Kegiatan</th>
                <th style="width:25%">Pembicara</th>
                <th style="width:25%">Tempat Kegiatan</th>
                <th>Aksi</th>
              </tr>  
          
             <?php $i=1; foreach($pelatihan as $row ) { ?>
              <tr>
                <td><?=$i++; ?></td>
                <td><?=$row['tanggal']; ?></td>                 
                <td><?=$row['nama_kegiatan']; ?></td>
                <td><?=$row['pembicara']; ?></td>
                <td><?=$row['tempat']; ?></td>
                <td> <a title="Hapus" class="delete btn btn-sm btn-danger" data-href="<?= base_url('kinerja/individu/hapus_kegiatan/'. $row['id'] ); ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a></td>
              </tr>


             <?php } ?>

            </table>
          

        </div>
          <!-- /.box-body -->
      </div>

       <div class="box">
        <div class="box-header with-border">
          <h4>Usulan Inovasi Kepada BMT (<?=count($usulan); ?>x) </h4>

        </div>

      <div class="box-body my-form-bodys">   
       
          <table class="table table-striped table-bordered">
              <tr>

                <th style="width:50px">No.</th>
                <th style="width:100px">Tanggal</th>
                <th style="width:60%">Usulan kepada BMT</th>
                <th style="width:25%">Status</th> 
                <th>Aksi</th>            
              </tr>  
          
             <?php $i=1; foreach($usulan as $row ) { ?>
              <tr>
                <td><?=$i++; ?></td>
                <td><?=$row['tanggal']; ?></td>                 
                <td><?=$row['inovasi_kepada_bmt']; ?></td>
                <td><?php $status = $row['status']; 
                  if($status == '0') { echo 'Tidak ditindak lanjuti';} else { echo 'Ditindak lanjuti';}
                ?></td>
                <td> <a title="Hapus" class="delete btn btn-sm btn-danger" data-href="<?= base_url('kinerja/individu/hapus_kegiatan/'. $row['id'] ); ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a></td>
              </tr>


             <?php } ?>

            </table>

        </div>
          <!-- /.box-body -->
      </div>
    </div><!-- /.col  -->
  </div><!-- /.row  -->
  
</section> 

<script>
  $("#kinerja_individu").addClass('active');
  $("#kinerja_individu .submenu_aql").addClass('active');
</script>

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
  $('#confirm-delete').on('show.bs.modal', function(e) {
  $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
</script>

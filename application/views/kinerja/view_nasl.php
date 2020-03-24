<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-user"></i> &nbsp; Hifdz An Nasl(Pemeliharaan Keturunan) </h4>
        </div>  
        <div class="col-md-6">   
          <a href="<?=base_url('/kinerja/individu/nasl'); ?>" class="btn btn-success btn-md pull-right">Tambah Data</a> 
           <a style="margin-right:20px;" href="<?=base_url('/kinerja/individu/tambah_raport'); ?>" class="btn btn-default btn-md pull-right">Tambah Raport Anak</a> 
        </div>         
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h4>Keluarga</h4>

        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">     

          <?php foreach ($tahun as $tahun) { ?>
            <a href="<?=base_url('kinerja/individu/detail/nasl/'. $tahun['periode_thn']); ?>" class="btn btn-warning btn-sm"><?=$tahun['periode_thn']; ?></a>
          
          <?php }?>  
          <br><br>

            <table class="table-striped table table-bordered">
                <thead><tr>
                  <th style="width:30%;vertical-align: middle;" rowspan="2" >Kinerja</th>
                 
                  <th colspan="<?php echo count($keluarga); ?>" style="text-align:center">Bulan</th>
                </tr>
                 <tr>
                   <?php foreach ($keluarga as $row) { ?><th style="width:5%;text-align: center;"><?=$row['bulan'] ?></th><?php } ?>
                </tr>
                </thead>

                <tr>
                  <td>Kesehatan anggota keluarga (Jumlah hari anggota keluarga yang sakit dalam sebulan dan sembuh)</td>
                  
                   <?php foreach ($keluarga as $row) { ?><td style="width:5%;text-align: center;"><?=$row['kesehatan_keluarga'] ?></td><?php } ?>
                </tr>
                 <tr>
                  <td>Partisipasi keluarga besar di kegiatan BMT</td>
                  
                   <?php foreach ($keluarga as $row) { ?><td style="width:5%;text-align: center;"><?=$row['partisipasi_keluarga'] ?></td><?php } ?>
                </tr>  
                <tr>
                  <td></td>
                  <?php foreach ($keluarga as $row) { ?><td style="width:5%;text-align: center;"> <a title="Hapus" class="delete btn btn-sm btn-danger" data-href="<?= base_url('kinerja/individu/hapus_nasl/'. $row['id'] ); ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a></td><?php } ?>
                </tr>            
            </table> 

        </div>
          <!-- /.box-body -->
      </div>

      <div class="box" id="pendidikan-anak">
        <div class="box-header with-border">
          <h4>Pendidikan Anak</h4>

        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

              <?php foreach ($data_keluarga as $anak_row) { ?>
              <?php if($anak_row['status_keluarga'] == 'anak') { ?>
                <h3><?=$anak_row['nama_keluarga'] ?></h3> 

                <table class="table table-bordered table-striped">
                  <thead><tr>
                      <th style="width:60px;">Tahun</th>
                      <th style="width:60px;">Semester</th>
                      <th style="width:60px;">Kelas</th>
                      <th>Sekolah</th>
                      <th style="width:100px;">Raport</th>
                      <th style="width:50px;">Aksi</th>
                  </tr></thead>
                <?php $pendidikan = get_pendidikan($anak_row['id']);

                  foreach ($pendidikan as $row) {?>
                    <tr>
                      <td><?=$row['tahun']; ?></td>
                      <td><?=$row['semester']; ?></td>
                      <td style="text-align: center;"><?=$row['kelas']; ?></td>                      
                      <td><?=$row['sekolah']; ?></td>
                      <td><a href="<?=base_url($row['raport']); ?>">Download</a></td>
                      <td><a title="Hapus" class="delete btn btn-sm btn-danger" data-href="<?= base_url('kinerja/individu/del_raport/'. $row['id'] ); ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a></td>
                    </tr>

                  <?php } // end foreach ?>

                  </table>

              <?php } //endif
              } //endforeach ?>  

        </div>
          <!-- /.box-body -->
      </div>

    </div><!-- /.col  -->
  </div><!-- /.row  -->
  
</section> 

<script>
  $("#kinerja_individu").addClass('active');
  $("#kinerja_individu .submenu_nasl").addClass('active');
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


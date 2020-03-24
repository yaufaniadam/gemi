  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Penempatan Staf</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users/tambah_penempatan'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Tambah Penempatan</a>
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
        <div class="box-body myd-form-body">
            
              <table class="table table-bordered table-striped">
                <tr>
                  <th>No</th>
                  <th>Nama Staf</th>
                  <th>Unit kerja</th>
                  <th>Kantor</th>
                  <th>Periode Penempatan</th>
                </tr>
                 <?php $i=1; foreach($penempatan as $penempatan) { ?>
                  <tr>
                    <td><?=$i++ ?></td>
                    <td><?=get_stafname_by_id($penempatan['user_id']); ?></td>
                    <td><?=get_unit_kerja_by_id($penempatan['id_unit']); ?></td>
                    <td><?=get_kantor_by_id($penempatan['id_kantor']); ?></td>
                    <td><?=$penempatan['awal_penempatan']; ?> - <?=$penempatan['akhir_penempatan']; ?></td>
                  </tr>
                 <?php }  ?>  
              </table>
            
        </div>
      </div>
    </div> 
  </div> 

</section> 

 <script>
    $("#pengguna").addClass('active');
    $("#pengguna .submenu_useradd").addClass('active');
  </script>
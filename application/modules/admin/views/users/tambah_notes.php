<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Tambah Catatan/Rekomendasi untuk Staff</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users/notes/'.$user['id']); ?>" class="btn btn-success"><i class="fa fa-list"></i> Kembali</a>
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
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open_multipart(base_url('admin/users/tambah_notes'), 'class="form-horizontal"');  ?>
            <div class="form-group">
                <label for="id_unit" class="col-sm-12 control-label">Berikan catatan/rekomendasi terkait pegawai ini</label>
                <div class="col-sm-12">
                  <textarea style="height:300px;" name="notes" class="form-control" value="<?php if(validation_errors()) {echo set_value('notes');  }  ?>"></textarea>
                   <input type="hidden" value="<?=$user['id']; ?>" name="user_id">
                </div>
              </div> 
              
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Tambah SK" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
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
      autoclose: true,
      format: 'yyyy-mm-dd',
    });
    //Date picker
    $('#akhir_penempatan').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',      
    });
  </script>
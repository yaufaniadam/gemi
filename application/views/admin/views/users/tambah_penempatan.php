  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Tambah Penempatan Baru</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Semua Staf</a>
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
           
            <?php echo form_open(base_url('admin/users/tambah_penempatan'), 'class="form-horizontal"');  ?>
              
              <div class="form-group">
                <label for="awal_penempatan" class="col-sm-2 control-label">Periode</label>

                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-5">
                       <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="awal_penempatan" value="<?php echo set_value('awal_penempatan');  ?>" type="text" class="form-control pull-right" id="awal_penempatan">
                      </div>
                    </div>
                    <div class="col-sm-2"> <span style="padding-top:7px;display:inline-block;" class="text-center">hingga</span> </div>
                     <div class="col-sm-5">
                       <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="akhir_penempatan" value="<?php echo set_value('akhir_penempatan');  ?>" type="text" class="form-control pull-right" id="akhir_penempatan">
                      </div>

                    </div>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Pilih Staf</label>

                <div class="col-sm-9">
                  <select name="user_id" class="form-control">
                    <option value="">Pilih Staf</option>
                    <?php foreach ( $staf as $staf) { ?>                      
                      <option value="<?php echo $staf['id']; ?>"><?php echo $staf['firstname']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Pilih Kantor</label>

                <div class="col-sm-9">
                  <select name="id_kantor" class="form-control">
                    <option value="">Pilih Kantor</option>
                    <?php foreach ( $kantor as $kantor) { ?>                      
                      <option value="<?php echo $kantor['id']; ?>"><?php echo $kantor['kantor']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label for="id_unit" class="col-sm-2 control-label">Pilih Unit Kerja</label>
                <div class="col-sm-9">
                  <select name="id_unit" class="form-control">
                    <option value="">Pilih Unit Kerja</option>
                    <?php foreach($unit_kerja as $unit_kerja): ?>
                      <option value="<?= $unit_kerja['id']; ?>"><?= $unit_kerja['nama_unit'];  ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div> 

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Tambah Penempatan" class="btn btn-info pull-right">
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
      autoclose: true
    });
    //Date picker
    $('#akhir_penempatan').datepicker({
      autoclose: true,
      
    });
  </script>
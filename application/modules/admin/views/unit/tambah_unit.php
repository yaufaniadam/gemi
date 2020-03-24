<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-pencil"></i> &nbsp; Edit Unit Kerja </h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/prodi'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Semua Unit Kerja</a>
          
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
           
            <?php echo form_open(base_url('admin/unit/edit/'.$unit['id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="nama_unit" class="col-sm-2 control-label">Unit Kerja</label>

                <div class="col-sm-9">
                  <input type="text" name="nama_unit" value="<?= $unit['nama_unit']; ?>" class="form-control" id="nama_unit" placeholder="">
                </div>
              </div>
              
			       
              
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 

<script>  
  //for nav
  $("#menu_prodi").addClass('active');
  $("#menu_prodi .submenu_biro").addClass('active');

</script>
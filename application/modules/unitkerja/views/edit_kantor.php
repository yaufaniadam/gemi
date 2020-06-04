<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-pencil"></i> &nbsp; Edit Kantor </h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/unit/kantor'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Semua Kantor</a>
          
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
           
 
            <?php echo form_open(base_url('admin/unit/edit_kantor/'. $kantor['id'] ), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" name="nama_kantor" class="form-control" id="nama_kantor" placeholder="Nama Kantor Cabang" value="<?=$kantor['kantor']; ?>">
                </div>
              </div>   
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Kantor" value="<?=$kantor['alamat']; ?>">
                </div>
              </div>   
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="number" name="telp" class="form-control" id="telp" placeholder="Telepon" value="<?=$kantor['telp']; ?>">
                </div>
              </div>              
              
              <div class="form-group">                       
                    <div class="col-sm-12">
                        <p>Unit Kerja :</p>
                        <?php 
                          $ada = explode(",",$kantor['id_unit']);
                          foreach ($unit as $key=> $unit) { 
                        ?>   
                        
                        <input type="checkbox" name="id_unit[]" value="<?php echo $unit['id']; ?>"
                        <?php if(in_array($unit['id'], $ada) ) {
                          echo "checked";
                        } ?>
                         > <?php echo $unit['nama_unit']; ?> <br/>
                        <?php } ?>
                                      
                      </select>
                    </div>            
           
              </div>       
          
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Simpan Kantor Cabang" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
			       
              
              
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
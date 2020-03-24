<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-pencil"></i> &nbsp; Tambah Anggota Keluarga (<?php echo $id=$_GET['id']; ?>)</h4>
        </div>
        <div class="col-md-6 text-right">
          
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
            <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
            <?php echo form_open(base_url('profile/tambah_keluarga?id='.$id), 'class="form-horizontal"' )?> 
             
               
              <div class="form-group">
                <label for="nama_keluarga" class="col-sm-2 control-label">Nama Lengkap</label>
                 <input type="hidden" name="status_keluarga" value="<?=$id; ?>">
                <div class="col-sm-9">
                  <input type="text" name="nama_keluarga" value="<?= set_value('nama_keluarga'); ?>" class="form-control" id="nama_keluarga" placeholder="">
                </div>
              </div>  
              <div class="form-group">
                <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>

                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-6">
                      <input type="text" name="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" class="form-control" id="tempat_lahir" placeholder="">
                    </div>
                     <div class="col-sm-6">
                       <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i> Tanggal Lahir
                        </div>
                        <input name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" type="text" class="form-control pull-right" id="tgl_lahir">
                      </div>

                    </div>
                  </div>
                </div>
              </div>    

              <div class="form-group">               
                    <label for="gender" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-3">
                      <select name="jenis_kelamin" class="form-control">
                        <option value=""<?php echo  set_select('jenis_kelamin', '', TRUE); ?>>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" <?php echo  set_select('jenis_kelamin', 'Laki-laki'); ?>>Laki-laki</option>
                         <option value="Perempuan" <?php echo  set_select('jenis_kelamin', 'Perempuan'); ?>>Perempuan</option>                 
                      </select>
                    </div>
            
           
              </div>          

              <?php if($id=='anak') { ?>

              <div class="form-group">
                <label for="status_keluarga" class="col-sm-2 control-label">Anak Ke</label>              
               
                <div class="col-sm-3" id="anak_ke">
                  <div class="input-group">
                   
                    <input type="number" name="anak_ke" value="<?= set_value('anak_ke'); ?>" class="form-control" id="anak_ke" placeholder="">
                  </div>
                </div>              
              </div>

              

                

            <?php } if ( $id == 'pasutri') { ?>

              <div class="form-group" id="pekerjaan">
                <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
                <div class="col-sm-9">
                  <input type="text" name="pekerjaan" value="<?= set_value('pekerjaan'); ?>" class="form-control" id="pekerjaan" placeholder="">
                </div>
              </div> 

              <div class="form-group" id="tempat_bekerja">
                <label for="pekerjaan" class="col-sm-2 control-label">Tempat Bekerja</label>
                <div class="col-sm-9">
                  <input type="text" name="tempat_bekerja" value="<?= set_value('tempat_bekerja'); ?>" class="form-control" id="tempat_bekerja" placeholder="">
                </div>
              </div> 


            <?php }  ?>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Simpan Data Keluarga" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 

<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script>
  $("#pribadi").addClass('active');
  $("#pribadi .submenu_tambah_keluarga").addClass('active');

   $("#tgl_lahir").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});

</script>
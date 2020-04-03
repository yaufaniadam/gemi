<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-user"></i> &nbsp; Kinerja Individu</h4>
        </div>       
        <div  class="col-md-6">
          <a href="<?=base_url('kinerja/individu/detail_aql'); ?>" class="btn btn-success btn-md pull-right">Lihat Data</a>
      </div>
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h4>Hifdz Al’Aql (Pemeliharaan Akal)  </h4>

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
           
            <?php echo form_open(base_url('kinerja/individu/aql'), 'class="form-horizontal"' )?> 
           
              <h3>Pengajian / Pelatihan Rutin</h3>
              <div class="form-group">
                <label for="periode" class="col-sm-4 control-label">Jenis Kegiatan</label>
                <div class="col-sm-5">
                  <div class="row">
                    <div class="col-sm-8">
               
                        <select name="jenis_kegiatan" class="form-control" id="jenis_kegiatan" >
                           <option>Pilih Jenis kegiatan</option>
                          <option value="Pengajian">Pengajian</option>
                          <option value="Pelatihan">Pelatihan</option>
                
                        </select>
                
                    </div>
                   
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label for="nama_kegiatan" class="col-sm-4 control-label">Nama Kegiatan</label>
                <div class="col-sm-8">
                         
                    <input type="text" name="nama_kegiatan" class="form-control" value="<?php if(validation_errors()) {echo set_value('nama_kegiatan'); }   ?>" placeholder="">
               
             
                </div>
              </div>  

              <div class="form-group">
                <label for="pembicara" class="col-sm-4 control-label">Pembicara</label>
                <div class="col-sm-8">
                           
                    <input type="text" name="pembicara" class="form-control" value="<?php if(validation_errors()) {echo set_value('pembicara'); }   ?>" placeholder="">
                  
                
                </div>
              </div>  

               <div class="form-group">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal Kegiatan</label>
                <div class="col-sm-8">
                           
                    <input type="text" name="tanggal" class="form-control datepicker" value="<?php if(validation_errors()) {echo set_value('tanggal'); }  ?>" placeholder="">
                   
               
                </div>
              </div>  


              <div class="form-group">
                <label for="tempat" class="col-sm-4 control-label">Tempat Kegiatan</label>
                <div class="col-sm-8">
                           
                    <input type="text" name="tempat" class="form-control" value="<?php if(validation_errors()) {echo set_value('tempat'); }  ?>" placeholder="">
                  
                
                </div>
              </div>  

              

              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>


           
            <?php echo form_open(base_url('kinerja/individu/aql'), 'class="form-horizontal"' )?> 
           
              <h3>Usulan Inovasi Kepada BMT</h3>
              

              <div class="form-group">
                <label for="usulan_kepada_bmt" class="col-sm-4 control-label">Usulan inovasi yang diberikan </label>
                <div class="col-sm-8">
                         
                    <input type="text" name="inovasi_kepada_bmt" class="form-control" value="<?php if(validation_errors()) {echo set_value('inovasi_kepada_bmt');  }  ?>" placeholder="">
               
             
                </div>
              </div>  


               <div class="form-group">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal Diusulkan</label>
                <div class="col-sm-8">
                           
                    <input type="text" name="tanggal" class="form-control datepicker" value="<?php if(validation_errors()) {echo set_value('tanggal'); } ?>" placeholder="">
                   
               
                </div>
              </div>  

               <div class="form-group">
                <label for="status" class="col-sm-4 control-label">Status usulan</label>
                <div class="col-sm-5">
                  <div class="row">
                    <div class="col-sm-8">
               
                        <select name="status" class="form-control" id="status" >
                           <option>Pilih Status</option>
                          <option value="1">Ditindak lanjuti</option>
                          <option value="0">Tidak ditindak lanjuti</option>
                
                        </select>
                
                    </div>
                   
                  </div>
                </div>
              </div>  
              

              

              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit-usulan" value="Simpan" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div><!-- /.col  -->
  </div><!-- /.row  -->
  
</section> 



<script>
  $("#kinerja_individu").addClass('active');
  $("#kinerja_individu .submenu_aql").addClass('active');
</script

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Page script -->
<script>
  $(function () {  
  
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true
    });

  });
</script>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-user"></i> &nbsp; Hifdz An-Nasl (Pemeliharaan Keturunan) </h4>
        </div>       
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h4>Tambah Raport </h4>

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
           
            <?php echo form_open_multipart(base_url('kinerja/individu/tambah_raport'), 'class="form-horizontal"' )?> 
           
            <?php
              //get current month
              $this_month= date("n");
            
            ?>

            <div class="form-group">
                <label for="kesehatan_keluarga" class="col-sm-3 control-label">Nama Anak</label>
                <div class="col-sm-9">                          
                      <select name="id_keluarga" class="form-control" id="periode_thn" >
                         <option value="" > Pilih Anak</option>
                        <?php foreach ($anak as $row) { ?>
                          <option value="<?=$row['id']; ?>" <?php if(validation_errors()) { echo set_select('id_keluarga', $row['id']); } ?>><?=$row['nama_keluarga']; ?></option>
                        
                        <?php } ?>                       
                      </select>            
                </div>
              </div>  

              

              <div class="form-group">
                <label for="kesehatan_keluarga" class="col-sm-3 control-label">Semester</label>
                <div class="col-sm-9">                             
                      <select name="semester" class="form-control" id="periode_bln" >
                          <option value="" > Pilih Semester</option>
                          <option value="Ganjil" <?php if(validation_errors()) { echo set_select('semester', 'Ganjil'); } ?>>Ganjil</option>
                          <option value="Genap" <?php if(validation_errors()) { echo set_select('semester', 'Genap'); } ?>>Genap</option>                        
                      </select>                  
                </div>
              </div>  

              <div class="form-group">
                <label for="kesehatan_keluarga" class="col-sm-3 control-label">Tahun</label>
                <div class="col-sm-9">                          
                      <select name="tahun" class="form-control" id="periode_thn" >
                        <option value="" > Pilih Tahun</option>
                        <option value="2019" <?php if(validation_errors()) { echo set_select('tahun', '2019'); } ?>>2019</option>
                        <option value="2020" <?php if(validation_errors()) { echo set_select('tahun', '2020'); } ?>>2020</option> 
                        <option value="2021" <?php if(validation_errors()) { echo set_select('tahun', '2021'); } ?>>2021</option>  
                        <option value="2022" <?php if(validation_errors()) { echo set_select('tahun', '2022'); } ?>>2022</option>                         
                      </select>            
                </div>
              </div>  

              <div class="form-group">
                <label for="kesehatan_keluarga" class="col-sm-3 control-label">Kelas/Semester</label>
                <div class="col-sm-9">                              
                     <select name="kelas" class="form-control" id="periode_thn" >
                        <option value="">Pilih Kelas/Semester</option>
                        <?php for ($i=0; $i < 15; $i++) { ?>
                          <option value="<?=$i; ?>" <?php if(validation_errors()) { echo set_select('kelas', $i); } ?>><?=$i; ?></option>
                       <?php }
                        
                        ?>
                                            
                      </select>        
                </div>
              </div>          

              <div class="form-group">
                <label for="kesehatan_keluarga" class="col-sm-3 control-label">Sekolah</label>
                <div class="col-sm-9">                           
                  <input type="text" name="sekolah" class="form-control" value="<?php if(validation_errors()) {echo set_value('sekolah'); }  ?>" placeholder="">                
                </div>
              </div>  

               <div class="form-group">
                <label for="kesehatan_keluarga" class="col-sm-3 control-label">Upload Raport</label>
                <div class="col-sm-9">                           
                 <input type="file" name="raport" value="" class="form-control" id="nama_pemateri" placeholder="">  
                </div>
              </div>  


               

             
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
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
  $("#kinerja_individu .submenu_nasb").addClass('active');
</script
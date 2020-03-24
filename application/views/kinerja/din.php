<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-user"></i> &nbsp; Kinerja Individu</h4>
        </div>       
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h4>Hifdz Ad-Din (Pemeliharaan Agama)  </h4>

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
           
            <?php echo form_open(base_url('kinerja/individu/din'), 'class="form-horizontal"' )?> 
           
            <?php
                  
               $this_month= date("n");
             
            ?>
              <div class="form-group">
                <label for="periode" class="col-sm-6 control-label">Periode</label>
                <div class="col-sm-5">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="input-group">
                        <select name="periode_bln" class="form-control" id="periode_bln" >
                          <option value="1" <?php if($this_month == 1 ) { echo "selected";} ?> >Januari</option>
                          <option value="2" <?php if($this_month == 2 ) { echo "selected";} ?>>Februari</option>
                          <option value="3" <?php if($this_month == 3 ) { echo "selected";} ?>>Maret</option>
                          <option value="4" <?php if($this_month == 4 ) { echo "selected";} ?>>April</option>
                          <option value="5" <?php if($this_month == 5 ) { echo "selected";} ?>>Mei</option>
                          <option value="6" <?php if($this_month == 6 ) { echo "selected";} ?>>Juni</option>
                          <option value="7" <?php if($this_month == 7 ) { echo "selected";} ?>>Juli</option>
                          <option value="8" <?php if($this_month == 8 ) { echo "selected";} ?>>Agustus</option>
                          <option value="9" <?php if($this_month == 9 ) { echo "selected";} ?>>September</option>
                          <option value="10" <?php if($this_month == 10 ) { echo "selected";} ?>>Oktober</option>
                          <option value="11" <?php if($this_month == 11 ) { echo "selected";} ?>>November</option>
                          <option value="12" <?php if($this_month == 12 ) { echo "selected";} ?>>Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group">
                       <select name="periode_thn" class="form-control" id="periode_thn" >
                          <option value="2019">2019</option>
                          <option value="2020">2020</option> 
                          <option value="2021">2021</option>  
                          <option value="2022">2022</option>                         
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-6 control-label">Frekuensi melaksanakan shalat wajib berjamaah di awal waktu</label>
                <div class="col-sm-3">
                  <div class="input-group">            
                    <input type="text" name="sholat_awal_waktu" class="form-control" value="<?php if(validation_errors()) {echo set_value('sholat_awal_waktu'); }  ?>" placeholder="">
                    <span class="input-group-addon"> / hari</span>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-6 control-label">Frekuensi shalat berjamaah di masjid</label>
                <div class="col-sm-3">
                  <div class="input-group">         
                    <input type="number" name="jamaah_masjid" class="form-control" value="<?php if(validation_errors()) {echo set_value('jamaah_masjid'); } ?>"><span class="input-group-addon"> / hari</span>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-6 control-label">Jumlah halaman tilawah qur’an</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="tilawah_quran" class="form-control" value="<?php if(validation_errors()) {echo set_value('tilawah_quran'); }   ?>"><span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div> 


              <div class="form-group">
                <label for="nama_prodi" class="col-sm-6 control-label">Frekuensi shalat tahajjud</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="tahajjud" class="form-control" value="<?php if(validation_errors()) {echo set_value('tahajjud'); }   ?>" ><span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div>              

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-6 control-label">Puasa sunnah Senin Kamis</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="puasa_sunnah" class="form-control" value="<?php if(validation_errors()) {echo set_value('puasa_sunnah'); }   ?>"><span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-6 control-label">Shalat dhuha sebelum beraktivitas</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="dhuha" class="form-control" value="<?php if(validation_errors()) {echo set_value('dhuha'); } ?>"><span class="input-group-addon"> / bulan</span>
                  </div>
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
    </div><!-- /.col  -->
  </div><!-- /.row  -->
  
</section> 

<script>
  $("#kinerja_individu").addClass('active');
  $("#kinerja_individu .submenu_din").addClass('active');
</script
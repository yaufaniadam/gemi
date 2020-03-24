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
          <h4>Hifdz Ad-Din (Pemeliharaan Agama) </h4>
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
           
            <?php echo form_open(base_url('admin/'), 'class="form-horizontal"' )?> 

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-8 control-label">Frekuensi melaksanakan shalat wajib berjamaah di awal waktu</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="sholat_awal_waktu" class="form-control" id="nama_prodi" placeholder=""><span class="input-group-addon"> / hari</span>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-8 control-label">Frekuensi shalat berjamaah di masjid</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="sholat_awal_waktu" class="form-control" id="nama_prodi" placeholder=""><span class="input-group-addon"> / hari</span>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-8 control-label">Jumlah halaman tilawah qur’an</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="sholat_awal_waktu" class="form-control" id="nama_prodi" placeholder=""><span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div> 


              <div class="form-group">
                <label for="nama_prodi" class="col-sm-8 control-label">Frekuensi shalat tahajud</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="sholat_awal_waktu" class="form-control" id="nama_prodi" placeholder=""><span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-8 control-label">Frekuensi shalat tahajud</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="sholat_awal_waktu" class="form-control" id="nama_prodi" placeholder=""><span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-8 control-label">Puasa sunnah Senin Kamis</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="sholat_awal_waktu" class="form-control" id="nama_prodi" placeholder=""><span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label for="nama_prodi" class="col-sm-8 control-label">Shalat dhuha sebelum beraktivitas</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="number" name="sholat_awal_waktu" class="form-control" id="nama_prodi" placeholder=""><span class="input-group-addon"> / bulan</span>
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
    $("#pengguna").addClass('active');
    $("#pengguna .submenu_useradd").addClass('active');
  </script>
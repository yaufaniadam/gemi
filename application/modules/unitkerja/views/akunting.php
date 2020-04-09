<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">

<h3>Hifdz Al-Maal</h3>
<h4>Laporan keuangan Akhir Bulan</h4>
<hr>
<?php echo form_open_multipart(base_url("unitkerja/add_akunting/".$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="laporan_keuangan">

    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="tanggal" type="text" class="form-control pull-right daterange">
        </div>
      </div>
    </div>     

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload laporan keuangan per bulan</label>
      <div class="col-sm-6">
        <input type="file" name="file_laporan_keuangan" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    
    
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Laporan harian disetor per minggu</h4>
<hr>
<?php echo form_open_multipart(base_url("unitkerja/add_akunting/".$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="laporan_keuangan_harian">
                   

    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="tanggal" type="text" class="form-control pull-right daterange">
        </div>
      </div>
    </div>     
   

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload laporan harian</label>
      <div class="col-sm-6">
        <input type="file" name="file_laporan_keuangan_harian" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    
    
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Page script -->
<script>
  $(function () {  
    //Date range as a button
    $('.daterange').daterangepicker();
  });
</script>
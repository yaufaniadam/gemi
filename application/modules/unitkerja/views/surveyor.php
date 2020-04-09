<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">

<h3>Hifdz Al’Aql</h3>
<h4>Penguasaan Product Knowledge (hasil tes review tahunan pemahaman pegawai)</h4>
<hr>

<?php echo form_open_multipart(base_url("unitkerja/add_surveyor/".$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="aql">
    <input name="sub_maqasid" type="hidden" value="product_knowledge">

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload hasil test uji kompetensi penguasaan produk</label>
      <div class="col-sm-6">
        <input type="file" name="file_product_knowledge" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
         
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Akurasi data Ketajaman Analisis</h4>
<hr>

<?php echo form_open_multipart(base_url("unitkerja/add_surveyor/".$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="akurasi">
                   
   
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload hasil survey</label>
      <div class="col-sm-6">
        <input type="file" name="file_hasil_survey_akurasi" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
         
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>


<h3>Hifdz Al-Maal</h3>
<h4>Kuantitas dan kualitas barang yang dibeli</h4>
<hr>
<?php echo form_open_multipart(base_url("unitkerja/add_surveyor/".$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="barang_dibeli">

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload data barang yang dibeli </label>
      <div class="col-sm-6">
        <input type="file" name="file_barang_dibeli" value="" class="form-control" id="nama_pemateri" placeholder="">
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
<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">

<h3>Hifdz Al-Maal</h3>
<h4>Hasil review efisiensi dan efektivitas kerja</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_auditor/'.$current_kantor ."/" . $current_unit."/mal"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="review_kerja">               
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Nilai Efisiensi </label>
      <div class="col-sm-6">
        <input type="text" name="nilai_efisiensi" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Nilai efektifitas </label>
      <div class="col-sm-6">
        <input type="text" name="nilai_efektifitas" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload hasil review internal auditor </label>
      <div class="col-sm-6">
        <input type="file" name="file_auditor" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Hasil review laporan keuangan</h4>
<hr>

<?php echo form_open_multipart(base_url('admin/unit/add_auditor/'.$current_kantor ."/" . $current_unit. "/mal"), 'class="form-horizontal"' )?> 
    
      <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="review_keuangan">                          
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Nilai kesesuaian dengan standar </label>
      <div class="col-sm-6">
        <input type="text" name="nilai_standar" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Nilai keakuratan </label>
      <div class="col-sm-6">
        <input type="text" name="nilai_keakuratan" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
     <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload hasil review laporan keuangan </label>
      <div class="col-sm-6">
        <input type="file" name="file_keakuratan" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Review dan monitoring Rencana Tindak Lanjut Unit Kerja</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_auditor/'.$current_kantor ."/" . $current_unit."/mal"), 'class="form-horizontal"' )?> 
 
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="review_rencana">       

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload rencana tindak lanjut </label>
      <div class="col-sm-6">
        <input type="file" name="file_tindak_lanjut" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload follow up </label>
      <div class="col-sm-6">
        <input type="file" name="file_follow_up" value="" class="form-control" id="nama_pemateri" placeholder="">
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
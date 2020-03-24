<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">

<h3>Hifdz Al’Aql</h3>
<h4>Konten edukasi kepada masyarakat</h4>
<hr>

<?php echo form_open_multipart(base_url('admin/unit/add_digimark/'.$current_kantor ."/" . $current_unit."/aql"), 'class="form-horizontal"' )?> 
 
    <input name="maqasid" type="hidden" value="aql">
    <input name="sub_maqasid" type="hidden" value="konten_edukatif">       
            

     <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Jumlah konten edukasi kepada masyarakat</label>
      <div class="col-sm-6">
        <input type="number" name="konten_edukatif" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload daftar konten edukasi</label>
      <div class="col-sm-6">
        <input type="file" name="file_konten_edukatif" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
         
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Respon positif masyarakat terhadap pesan-pesan yang dibuat tim</h4>
<hr>

<?php echo form_open_multipart(base_url('admin/unit/add_digimark/'.$current_kantor ."/" . $current_unit."/aql"), 'class="form-horizontal"' )?> 
 
    <input name="maqasid" type="hidden" value="aql">
    <input name="sub_maqasid" type="hidden" value="respon_masyarakat">       
            
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Jumlah Respon positif masyarakat</label>
      <div class="col-sm-6">
        <input type="number" name="respon_masyarakat" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload respon positif masyarakat</label>
      <div class="col-sm-6">
        <input type="file" name="file_respon_masyarakat" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
         
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Respon negatif masyarakat terhadap pesan-pesan yang dibuat tim</h4>
<hr>

<?php echo form_open_multipart(base_url('admin/unit/add_digimark/'.$current_kantor ."/" . $current_unit."/aql"), 'class="form-horizontal"' )?> 
 
    <input name="maqasid" type="hidden" value="aql">
    <input name="sub_maqasid" type="hidden" value="respon_negatif">       
            
   
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Jumlah Respon negatif masyarakat</label>
      <div class="col-sm-6">
        <input type="number" name="respon_negatif" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload respon negatif masyarakat</label>
      <div class="col-sm-6">
        <input type="file" name="file_respon_negatif" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>          
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>


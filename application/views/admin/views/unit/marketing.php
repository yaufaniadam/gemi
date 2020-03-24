<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<h3>Hifdz An-Nafs</h3>
<h4>Jumlah komplain per bulan</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_marketing/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="nafs">
    <input name="sub_maqasid" type="hidden" value="komplain">
                  
    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal Komplain</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="tanggal_komplain" type="text" class="form-control pull-right datepicker">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal Kejadian</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="tanggal_kejadian" type="text" class="form-control pull-right datepicker">
        </div>
      </div>
    </div>    
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Bentuk komplain</label>
      <div class="col-sm-6">
        <textarea name="bentuk_komplain" value="" class="form-control" id="nama_pemateri" placeholder=""></textarea>
      </div>
    </div>  
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Pihak yang komplain</label>
      <div class="col-sm-6">
        <input type="text" name="pihak_komplain" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>      
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Tndakan yang telah diambil</label>
      <div class="col-sm-6">
        <input type="text" name="tindakan_diambil" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>      
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Tindakan yang masih perlu diambil</label>
      <div class="col-sm-6">
        <input type="text" name="tindakan_perlu_diambil" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
     <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Status</label>
      <div class="col-sm-6">
        <select name="status" class="form-control" id="periode_bln" >
          <option value="">Pilih Status</option>
          <option value="Selesai">Selesai</option>
          <option value="Belum Selesai">Belum Selesai</option>
        </select>                 
      </div>
    </div>      
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h3>Hifdz Al’Aql</h3>
<h4>Penguasaan Product Knowledge (hasil tes review tahunan pemahaman pegawai)</h4>
<hr>

<?php echo form_open_multipart(base_url('admin/unit/add_marketing/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
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



<h3>Hifdz Al-Maal</h3>
<h4>Funding </h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_marketing/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="funding">
                   
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Target funding </label>
      <div class="col-sm-6">
        <input type="text" name="target_funding" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Realisasi funding </label>
      <div class="col-sm-6">
        <input type="text" name="realisasi_funding" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload laporan </label>
      <div class="col-sm-6">
        <input type="file" name="file_funding" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Lending</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_marketing/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="lending">
                
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Target lending </label>
      <div class="col-sm-6">
        <input type="text" name="target_lending" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Realisasi lending</label>
      <div class="col-sm-6">
        <input type="text" name="realisasi_lending" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload laporan </label>
      <div class="col-sm-6">
        <input type="file" name="file_lending" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>


<h4>Collection</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_marketing/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="collection">
                
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Target Collection </label>
      <div class="col-sm-6">
        <input type="text" name="target_collection" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Realisasi Collection</label>
      <div class="col-sm-6">
        <input type="text" name="realisasi_collection" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload laporan </label>
      <div class="col-sm-6">
        <input type="file" name="file_collection" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>



<h4>NPF</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_marketing/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="npf">
  

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Target NPF </label>
      <div class="col-sm-6">
        <input type="text" name="target_npf" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Realisasi NPF</label>
      <div class="col-sm-6">
        <input type="text" name="realisasi_npf" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload laporan </label>
      <div class="col-sm-6">
        <input type="file" name="file_npf" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>



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
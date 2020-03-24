<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">

<h3>Hifdz An-Nafs</h3>
<h4>Jumlah komplain per bulan</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_pembiayaan/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
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

<?php echo form_open_multipart(base_url('admin/unit/add_pembiayaan/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
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
<h4>Akad yang diajukan</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_pembiayaan/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="akad">

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Jumlah akad yang diajukan </label>
      <div class="col-sm-6">
        <input type="number" name="jumlah_akad" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Plafon akad yang diajukan</label>
      <div class="col-sm-6">
        <input type="number" name="plafon_akad" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload berita acara komite </label>
      <div class="col-sm-6">
        <input type="file" name="file_berita_acara_komite" value="" class="form-control" id="nama_pemateri" placeholder="">
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
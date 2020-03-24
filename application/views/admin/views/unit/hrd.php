<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">

<h3>Hifdz Ad-Din</h3>
<h4>Pengajian, Mabid & Daurah/Darul arqom</h4>

<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_hrd/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="din">
    <input name="sub_maqasid" type="hidden" value="pengajian">
    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Jenis Kegiatan</label>
      <div class="col-sm-6">
        <select name="jenis_kegiatan" class="form-control"  >
          <option value="">Pilih Jenis Kegiatan</option>
          <option value="Pengajian">Pengajian</option>
          <option value="Mabit">Mabit</option>
          <option value="Daurah">Daurah</option>
          <option value="Darul Arqam">Darul Arqam</option>
        </select>                 
      </div>
    </div>                
    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal Pelaksanaan</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="tanggal_pelaksanaan" type="text" class="form-control pull-right  daterange">
        </div>
      </div>
    </div>
      <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Lokasi</label>
      <div class="col-sm-6">
        <input type="text" name="lokasi" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Nama Pemateri</label>
      <div class="col-sm-6">
        <input type="text" name="nama_pemateri" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
    <div class="form-group">
      <label for="kontak_pemateri" class="col-sm-3 control-label">Kontak Pemateri</label>
      <div class="col-sm-6">
        <input type="number" name="kontak_pemateri" value="" class="form-control" id="kontak_pemateri" placeholder="No HP">
      </div>
    </div>      
    <div class="form-group">
      <label for="topik_pengajian" class="col-sm-3 control-label">Topik</label>
      <div class="col-sm-6">
        <input type="text" name="topik_kegiatan" value="" class="form-control" id="topik_pengajian" placeholder="">
      </div>
    </div>      
    <div class="form-group">
      <label for="presensi_peserta" class="col-sm-3 control-label">Presensi Peserta</label>
      <div class="col-sm-6">
        <input type="file" name="presensi_peserta" value="" class="form-control" id="presensi_peserta" placeholder="">
      </div>
    </div>    
    <div class="form-group">
      <label for="file_komentar" class="col-sm-3 control-label">Komentar Peserta</label>
      <div class="col-sm-6">
        <input type="file" name="komentar_peserta" value="" class="form-control" id="file_komentar" placeholder="">
      </div>
    </div> 
     <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Link berita di Web:</label>
      <div class="col-sm-6">
        <input type="url" name="link_berita" value="" class="form-control" id="nama_pemateri" placeholder="http://">
      </div>
    </div> 
    <div class="form-group">
      <label for="rekomendasi" class="col-sm-3 control-label">Rekomendasi / Catatan</label>
      <div class="col-sm-6">
        <textarea name="rekomendasi" value="" class="form-control" id="nama_pemateri" placeholder=""></textarea>
      </div>
    </div>        
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h3>Hifdz An-Nafs</h3>
<h4>Rekruitmen</h4>
<hr>
 
<?php echo form_open_multipart(base_url('admin/unit/add_hrd/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="nafs">
    <input name="sub_maqasid" type="hidden" value="rekrutmen">
                  
    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal Rekrutmen</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="tanggal_rekrutmen" type="text" class="form-control pull-right daterange">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Bentuk proses rekruitmen</label>
      <div class="col-sm-6">
        <select name="bentuk_rekrutmen" class="form-control" id="periode_bln" >
          <option value="">Pilih Bentuk proses rekruitmen</option>
          <option value="administratif">administratif</option>
          <option value="test tulis">test tulis</option>
          <option value="praktik">praktik</option>
          <option value="wawancara">wawancara</option>
        </select>                 
      </div>
    </div> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Jumlah SDM yang diperlukan</label>
      <div class="col-sm-6">
        <input type="number" name="sdm_diperlukan" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Jumlah yang ikut seleksi</label>
      <div class="col-sm-6">
        <input type="number" name="sdm_seleksi" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>      
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Jumlah yang lolos seleksi dan diterima</label>
      <div class="col-sm-6">
        <input type="text" name="sdm_diterima" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>      
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Nama SDM yang diterima dan bidangnya</label>
      <div class="col-sm-6">
        <input type="file" name="file_sdm" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>    
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Laporan Manajemen kinerja</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_hrd/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="nafs">
    <input name="sub_maqasid" type="hidden" value="kinerja">
    
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload ringkasan kinerja Pegawai</label>
      <div class="col-sm-6">
        <input type="file" name="file_kinerja" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>         
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h4>Employee productivity</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_hrd/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="nafs">
    <input name="sub_maqasid" type="hidden" value="employee_productivity">
                
    
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload hasil analisis employee productivity</label>
      <div class="col-sm-6">
        <input type="file" name="file_employee_productivity" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>         
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h3>Hifdz Al’Aql</h3>
<h4>Training Development</h4>
<hr>

<?php echo form_open_multipart(base_url('admin/unit/add_hrd/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="aql">
    <input name="sub_maqasid" type="hidden" value="training">
                   
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Jenis Training</label>
      <div class="col-sm-6">
        <input type="text" name="jenis_kegiatan" value="" class="form-control" id="nama_pemateri" placeholder="Misal : Training SDM">
      </div>
    </div>  

    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal Pelaksanaan</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
            <input name="tanggal_pelaksanaan" type="text" class="form-control pull-right  daterange">
        </div>
      </div>
    </div> 
      <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Lokasi</label>
      <div class="col-sm-6">
        <input type="text" name="lokasi" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
    <!--<div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Durasi Training</label>
      <div class="col-sm-6">
        <input type="text" name="nama_pemateri" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> --> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Nama Trainer</label>
      <div class="col-sm-6">
        <input type="text" name="nama_pemateri" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Kontak Trainer</label>
      <div class="col-sm-6">
        <input type="text" name="kontak_pemateri" value="" class="form-control" id="nama_pemateri" placeholder="No HP">
      </div>
    </div> 
    <div class="form-group">
      <label for="topik_pengajian" class="col-sm-3 control-label">Topik</label>
      <div class="col-sm-6">
        <input type="text" name="topik_kegiatan" value="" class="form-control" id="topik_pengajian" placeholder="">
      </div>
    </div> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload peserta Training</label>
      <div class="col-sm-6">
        <input type="file" name="presensi_peserta" value="" class="form-control" id="nama_pemateri" placeholder="No HP">
      </div>
    </div> 
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Link berita di Web</label>
      <div class="col-sm-6">
        <input type="url" name="link_berita" value="" class="form-control" id="nama_pemateri" placeholder="http://">
      </div>
    </div> 
     <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Analisis kegiatan / Catatan </label>
      <div class="col-sm-6">
        <textarea name="rekomendasi" value="" class="form-control" id="nama_pemateri" placeholder=""></textarea>
      </div>
    </div>        
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h3>Hifdz An-Nasl</h3>
<h4>Gathering keluarga pegawai</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_hrd/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="nasb">
    <input name="sub_maqasid" type="hidden" value="gathering">

    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal Pelaksanaan</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="tanggal_pelaksanaan" type="text" class="form-control pull-right daterange">
        </div>
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Lokasi Gathering</label>
      <div class="col-sm-6">
        <input type="text" name="lokasi" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div>  

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Presensi Peserta</label>
      <div class="col-sm-6">
        <input type="file" name="presensi_peserta" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Komentar Peserta</label>
      <div class="col-sm-6">
        <input type="file" name="komentar_peserta" value="" class="form-control" id="nama_pemateri" placeholder="">
      </div>
    </div> 
    
    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Link berita di Web:</label>
      <div class="col-sm-6">
        <input type="url" name="link_berita" value="" class="form-control" id="nama_pemateri" placeholder="http://">
      </div>
    </div> 
     <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Rekomendasi HRD / Catatan</label>
      <div class="col-sm-6">
        <textarea name="rekomendasi" value="" class="form-control" id="nama_pemateri" placeholder=""></textarea>
      </div>
    </div>        
     
    <div class="form-group">
      <div class="col-md-11">
        <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
      </div>
    </div>
<?php echo form_close(); ?>

<h3>Hifdz Al-Maal</h3>
<h4>Dokumen gaji + bonus bulanan</h4>
<hr>
<?php echo form_open_multipart(base_url('admin/unit/add_hrd/'.$current_kantor ."/" . $current_unit."/din"), 'class="form-horizontal"' )?> 
    
    <input name="maqasid" type="hidden" value="mal">
    <input name="sub_maqasid" type="hidden" value="gaji">
                   

    <div class="form-group">
      <label for="nama_prodi" class="col-sm-3 control-label">Tanggal</label>
      <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="tanggal_pelaksanaan" type="text" class="form-control pull-right daterange">
        </div>
      </div>
    </div> 
    
   

    <div class="form-group">
      <label for="nama_pemateri" class="col-sm-3 control-label">Upload Dokumen gaji</label>
      <div class="col-sm-6">
        <input type="file" name="file_gaji" value="" class="form-control" id="nama_pemateri" placeholder="">
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
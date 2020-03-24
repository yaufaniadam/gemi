<ul class="nav nav-tabs">
  <li role="presentation" <?php if($url_sub_maqasid == 'pengajian') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/pengajian" ); ?>">
    <h4>Hifdz Ad-Din</h4><p>Pengajian</p></a></li>
  <li role="presentation" <?php if($url_sub_maqasid == 'rekrutmen') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/rekrutmen" ); ?>">
  <h4>Hifdz An-Nafs</h4><p>Rekrutmen</p></a></li>
  <li role="presentation" <?php if($url_sub_maqasid == 'kinerja') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/kinerja" ); ?>">
  <h4>Hifdz An-Nafs</h4><p>Manajemen kinerja</p></a></li>
  <li role="presentation" <?php if($url_sub_maqasid == 'employee_productivity') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/employee_productivity" ); ?>">
  <h4>Hifdz An-Nafs</h4><p>Employee productivity</p></a></li>

  <li role="presentation" <?php if($url_sub_maqasid == 'training') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/training" ); ?>">
    <h4>Hifdz Al’Aql</h4><p>Training</p></a></li>

  <li role="presentation" <?php if($url_sub_maqasid == 'gathering') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/gathering" ); ?>">
  <h4>Hifdz An-Nasl</h4><p>Gathering</p></a></li>

  <li role="presentation" <?php if($url_sub_maqasid == 'gaji') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/gaji" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Dokumen gaji</p></a></li>


</ul>
</ul>

<br>

<?php  if($url_sub_maqasid == 'pengajian') { ?>
<table class="table table-striped table-bordered">
  <tr>
    <th style="width:100px">Tanggal</th>
    <th>Jenis Kegiatan</th>
    <th>Pemateri</th>
    <th>Topik/tema</th>
    <th>Presensi</th>
    <th>Komentar</th>
    <th>Rekomendasi</th>
  </tr>
  <?php foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$unit['tanggal']; ?></td>
    <td><?=$unit['jenis_kegiatan']; ?></td>
    <td><strong><?=$unit['nama_pemateri']; ?></strong> &raquo; <i class="fa fa-whatsapp"></i> <?=$unit['kontak_pemateri']; ?></td>
    <td><?=$unit['topik_kegiatan']; ?></td>
    <td><a target="_blank" href="<?=base_url($unit['file_presensi']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>
     <td><a target="_blank" href="<?=base_url($unit['file_komentar']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>
     <td><?=$unit['rekomendasi']; ?></td>
  </tr>  
  <?php } ?>  

</table>

<?php }  else if($url_sub_maqasid == 'rekrutmen') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:100px">Tanggal</th>
    <th>Bentuk Rekrutmen</th>
    <th>SDM yang diperlukan</th>
    <th>Peserta Rekrutmen</th>
    <th>SDM yang diterima</th>
    <th>Daftar yang Diterima</th>

  </tr>
  <?php foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$unit['tanggal_rekrutmen']; ?></td>
    <td><?=$unit['bentuk_rekrutmen']; ?></td>    
    <td><?=$unit['sdm_diperlukan']; ?></td>
    <td><?=$unit['sdm_seleksi']; ?></td>
    <td><?=$unit['sdm_diterima']; ?></td>
    <td><a target="_blank" href="<?=base_url($unit['file_sdm']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>
 
  </tr>  
  <?php } ?>  

</table>

<?php }  else if($url_sub_maqasid == 'kinerja') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th>Dokumen Kinerja Pegawai</th>
  </tr>
  <?php foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><a target="_blank" href="<?=base_url($unit['file_kinerja_pegawai']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?> 
</table>

<?php }  else if($url_sub_maqasid == 'employee_productivity') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th>Employee productivity</th>
  </tr>
  <?php foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><a target="_blank" href="<?=base_url($unit['file_employee_productivity']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?> 
</table>

<?php }  else if($url_sub_maqasid == 'training') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:100px">Tanggal</th>
    <th>Jenis Training</th>
    <th>Lokasi</th>
    <th>Nama Trainer</th>
    <th>Topik</th>
    <th>Presensi Peserta</th>
    <th>Link berita</th>
    <th>Analisis kegiatan</th>

  </tr>
  <?php foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$unit['tanggal']; ?></td>
    <td><?=$unit['jenis_kegiatan']; ?></td>  
    <td><?=$unit['lokasi']; ?></td>    
    <td><strong><?=$unit['nama_pemateri']; ?></strong> &raquo; <i class="fa fa-whatsapp"></i> <?=$unit['kontak_pemateri']; ?></td>
    <td><?=$unit['topik_kegiatan']; ?></td>    
    <td><a target="_blank" href="<?=base_url($unit['file_presensi']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>
    <td><a target="_blank" href="<?=base_url($unit['link_berita']); ?>" class="btn btn-success btn-xs"><i class="fa fa-link"></i></a></td>
    <td><?=$unit['rekomendasi']; ?></td>
 
  </tr>  
  <?php } ?>  

</table>

<?php }  else if($url_sub_maqasid == 'gathering') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:100px">Tanggal</th>

    <th>Lokasi</th>


    <th>Presensi Peserta</th>
    <th>Komentar Peserta</th>
    <th>Link berita</th>
    <th>Rekomendasi</th>

  </tr>
  <?php foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$unit['tanggal']; ?></td>

    <td><?=$unit['lokasi']; ?></td>    

  
    <td><a target="_blank" href="<?=base_url($unit['file_presensi']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>
    <td><a target="_blank" href="<?=base_url($unit['file_komentar']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>
    <td><a target="_blank" href="<?=base_url($unit['link_berita']); ?>" class="btn btn-success btn-xs"><i class="fa fa-link"></i></a></td>
    <td><?=$unit['rekomendasi']; ?></td>
 
  </tr>  
  <?php } ?>

</table>

 <?php } else if($url_sub_maqasid == 'gaji') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:400px">Tanggal</th>

    <th>Dokumen Gaji + bonus </th>

  </tr>
  <?php foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$unit['tanggal']; ?></td>  
   
    <td><a target="_blank" href="<?=base_url($unit['file_gaji']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>
<?php } ?>
<?php 
  $last = $this->uri->total_segments();
  $sub_maqasid= $this->uri->segment($last);
?>
<ul class="nav nav-tabs">

  <li role="presentation" <?php if($sub_maqasid == 'product_knowledge') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/product_knowledge" ); ?>">
  <h4>Hifdz Al’Aql</h4><p>Penguasaan Product Knowledge</p></a></li>

   <li role="presentation" <?php if($sub_maqasid == 'akurasi') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/akurasi" ); ?>">
  <h4>Hifdz Al-Aql</h4><p>Akurasi data Ketajaman Analisis</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'barang_dibeli') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/barang_dibeli" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Kuantitas dan kualitas barang yang dibeli</p></a></li>
 
</ul>
</ul>

<br>

<?php  if($sub_maqasid == 'akurasi') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:30px;">No.</th>
    <th>Data Ketajaman Analisis</th>
    <th style="width:140px !important">Tanggal Upload</th>
  </tr>
  <?php $i=1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <th><?=$i++; ?></th>
    <td><a target="_blank" href="<?=base_url($unit['file_hasil_survey_akurasi']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
    <td><?=date_format(date_create($unit['date']), 'j F Y'); ?></td>
  </tr>  
  <?php } ?> 
</table>

<?php }  else if($sub_maqasid == 'product_knowledge') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:30px;">No.</th>
    <th>Product Knowledge</th>
    <th style="width:140px !important">Tanggal Upload</th>
  </tr>
  <?php $i=1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <th><?=$i++; ?></th>
    <td><a target="_blank" href="<?=base_url($unit['file_product_knowledge']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
    <td><?=date_format(date_create($unit['date']), 'j F Y'); ?></td>
  </tr>  
  <?php } ?> 
</table>

<?php } else if($sub_maqasid == 'barang_dibeli') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:30px;">No.</th>
    <th>Data barang yang dibeli</th>
    <th style="width:140px !important">Tanggal Upload</th>
  </tr>
  <?php $i=1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <th><?=$i++; ?></th>
    <td><a target="_blank" href="<?=base_url($unit['file_barang_dibeli']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
    <td><?=date_format(date_create($unit['date']), 'j F Y'); ?></td>
  </tr>  
  <?php } ?> 
</table>



<?php } ?>
<?php 
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
  $sub_maqasid= $uri_segments[7];
  ?>
<ul class="nav nav-tabs">

  <li role="presentation" <?php if($sub_maqasid == 'product_knowledge') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/product_knowledge" ); ?>">
  <h4>Hifdz Al’Aql</h4><p>Penguasaan Product Knowledge</p></a></li>

   <li role="presentation" <?php if($sub_maqasid == 'akurasi') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/akurasi" ); ?>">
  <h4>Hifdz Al-Aql</h4><p>Akurasi data Ketajaman Analisis</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'barang_dibeli') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/barang_dibeli" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Kuantitas dan kualitas barang yang dibeli</p></a></li>
 
</ul>
</ul>

<br>

<?php  if($sub_maqasid == 'akurasi') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:30px;">No.</th>
    <th>Data Ketajaman Analisis</th>
  </tr>
  <?php $i=1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <th><?=$i++; ?></th>
    <td><a target="_blank" href="<?=base_url($unit['file_hasil_survey_akurasi']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?> 
</table>

<?php }  else if($sub_maqasid == 'product_knowledge') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:30px;">No.</th>
    <th>Product Knowledge</th>
  </tr>
  <?php $i=1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <th><?=$i++; ?></th>
    <td><a target="_blank" href="<?=base_url($unit['file_product_knowledge']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?> 
</table>

<?php } else if($sub_maqasid == 'barang_dibeli') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:30px;">No.</th>
    <th>Data barang yang dibeli</th>
  </tr>
  <?php $i=1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <th><?=$i++; ?></th>
    <td><a target="_blank" href="<?=base_url($unit['file_barang_dibeli']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?> 
</table>



<?php } ?>
<?php 
  $last = $this->uri->total_segments();
  $sub_maqasid= $this->uri->segment($last);
?>
<ul class="nav nav-tabs">

  <li role="presentation" <?php if($sub_maqasid == 'komplain') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/komplain" ); ?>">
    <h4>Hifdz An-Nafs</h4><p>Jumlah komplain per bulan</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'product_knowledge') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/product_knowledge" ); ?>">
  <h4>Hifdz Al’Aql</h4><p>Penguasaan Product Knowledge</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'funding') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/funding" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Funding</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'lending') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/lending" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Lending</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'collection') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/collection" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Collection</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'npf') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/npf" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>NPF</p></a></li>



</ul>
</ul>

<br>

<?php  if($sub_maqasid == 'komplain') { ?>
<table class="table table-striped table-bordered">
  <tr>
    <th style="width:100px">Tanggal Komplain</th>
    <th style="width:100px">Tanggal Kejadian</th>
    <th>Bentuk komplain</th>
    <th>Pihak yang komplain</th>
    <th>Tndakan yang telah diambil</th>
    <th>Tindakan yang masih perlu diambil</th>
    <th>Status</th>
  </tr>
  <?php foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$unit['tanggal_komplain']; ?></td>
    <td><?=$unit['tanggal_kejadian']; ?></td>
    <td><?=$unit['bentuk_komplain']; ?></td>
    <td><?=$unit['pihak_komplain']; ?></td>
    <td><?=$unit['tindakan_diambil']; ?></td>
    <td><?=$unit['tindakan_perlu_diambil']; ?></td>
    <td><?=$unit['status']; ?></td>
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



<?php } else if($sub_maqasid == 'funding') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Target Funding</th>
    <th>Realisasi funding</th>
    <th>File Funding</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['target_funding']; ?></td>   
    <td><?=$unit['realisasi_funding']; ?></td>  
    <td><a target="_blank" href="<?=base_url($unit['file_funding']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>

<?php } else if($sub_maqasid == 'lending') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Target Lending</th>
    <th>Realisasi Lending</th>
    <th>File Lending</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['target_lending']; ?></td>   
    <td><?=$unit['realisasi_lending']; ?></td>  
    <td><a target="_blank" href="<?=base_url($unit['file_lending']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>

<?php } else if($sub_maqasid == 'collection') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Target Collection</th>
    <th>Realisasi Collection</th>
    <th>File Collection</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['target_collection']; ?></td>   
    <td><?=$unit['realisasi_collection']; ?></td>  
    <td><a target="_blank" href="<?=base_url($unit['file_collection']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>

<?php } else if($sub_maqasid == 'npf') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Target NPF</th>
    <th>Realisasi NPF</th>
    <th>File NPF</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['target_npf']; ?></td>   
    <td><?=$unit['realisasi_npf']; ?></td>  
    <td><a target="_blank" href="<?=base_url($unit['file_npf']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>

<?php } ?>
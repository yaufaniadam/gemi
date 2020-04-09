<?php 
  $last = $this->uri->total_segments();
  $sub_maqasid= $this->uri->segment($last);
?>
<ul class="nav nav-tabs">

  <li role="presentation" <?php if($sub_maqasid == 'konten_edukatif') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/konten_edukatif" ); ?>">
  <h4>Hifdz Al-Aql</h4><p>Jumlah konten edukasi</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'respon_masyarakat') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/respon_masyarakat" ); ?>">
  <h4>Hifdz Al-Aql</h4><p>Respon positif masyarakat</p></a></li>

   <li role="presentation" <?php if($sub_maqasid == 'respon_negatif') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/respon_negatif" ); ?>">
  <h4>Hifdz Al-Aql</h4><p>Respon negatif masyarakat</p></a></li>

</ul>
</ul>
<br>

<?php if($sub_maqasid == 'konten_edukatif') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Jumlah konten edukasi</th>
    <th>File konten edukasi</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['konten_edukatif']; ?></td>    
    <td><a target="_blank" href="<?=base_url($unit['file_konten_edukatif']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?>

</table>

<?php } else if($sub_maqasid == 'respon_masyarakat') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Jumlah respon masyarakat</th>
    <th>File respon masyarakat</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['respon_masyarakat']; ?></td>    
    <td><a target="_blank" href="<?=base_url($unit['file_respon_masyarakat']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?>

</table>

<?php } else if($sub_maqasid == 'respon_negatif') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Jumlah respon negatif</th>
    <th>File respon negatif</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['respon_negatif']; ?></td>    
    <td><a target="_blank" href="<?=base_url($unit['file_respon_negatif']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?>

</table>

<?php } ?>
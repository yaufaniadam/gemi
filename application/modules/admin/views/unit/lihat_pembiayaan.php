<?php 
    $last = $this->uri->total_segments();
    $sub_maqasid= $this->uri->segment($last);
?>
<ul class="nav nav-tabs">

  <li role="presentation" <?php if($sub_maqasid == 'komplain') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/komplain" ); ?>">
    <h4>Hifdz An-Nafs</h4><p>Jumlah komplain per bulan</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'product_knowledge') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/product_knowledge" ); ?>">
  <h4>Hifdz Al’Aql</h4><p>Penguasaan Product Knowledge</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'akad') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/akad" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Akad yang diajukan</p></a></li>



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

<?php } else if($sub_maqasid == 'akad') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Jumlah akad</th>
    <th>Plafon akad yang diajukan</th>
    <th>Berita acara komite</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['jumlah_akad']; ?></td>   
    <td><?=$unit['plafon_akad']; ?></td>  
    <td><a target="_blank" href="<?=base_url($unit['file_berita_acara_komite']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>

<?php } ?>
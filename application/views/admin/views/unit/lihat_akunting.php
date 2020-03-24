<?php 
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
  $sub_maqasid= $uri_segments[6];
  ?>
<ul class="nav nav-tabs">

  <li role="presentation" <?php if($sub_maqasid == 'laporan_keuangan') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/laporan_keuangan" ); ?>">
    <h4>Hifdz Al-Maal</h4><p>Laporan keuangan Akhir Bulan</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'laporan_keuangan_harian') { echo 'class="active"'; } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/laporan_keuangan_harian" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Laporan harian disetor per minggu</p></a></li>

</ul>
</ul>

<br>

<?php  if($sub_maqasid == 'laporan_keuangan') { ?>
<table class="table table-striped table-bordered">
  <tr>
    <th style="width:30px;">No.</th>
    <th>Laporan keuangan Akhir Bulan</th>
  </tr>
  <?php $i=1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <th><?=$i++; ?></th>
    <td><a target="_blank" href="<?=base_url($unit['file_laporan_keuangan']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?> 
</table>

<?php }  else if($sub_maqasid == 'laporan_keuangan_harian') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:30px;">No.</th>
    <th>Laporan harian</th>
  </tr>
  <?php $i=1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <th><?=$i++; ?></th>
    <td><a target="_blank" href="<?=base_url($unit['file_laporan_keuangan_harian']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td> 
  </tr>  
  <?php } ?> 
</table>

<?php } ?>
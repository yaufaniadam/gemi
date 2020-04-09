<?php 
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
  $sub_maqasid= $uri_segments[6];
  ?>
<ul class="nav nav-tabs">

  <li role="presentation" <?php if($sub_maqasid == 'review_kerja') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/review_kerja" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Review efisiensi dan efektivitas kerja</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'review_keuangan') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/review_keuangan" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Review laporan keuangan</p></a></li>

  <li role="presentation" <?php if($sub_maqasid == 'review_rencana') { echo 'class="active"'; } ?>><a href="<?php echo base_url("unitkerja/index/review_rencana" ); ?>">
  <h4>Hifdz Al-Maal</h4><p>Review dan monitoring Rencana Tindak Lanjut Unit Kerja</p></a></li>

</ul>
</ul>

<br>




<?php if($sub_maqasid == 'review_kerja') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Nilai Efisiensi</th>
    <th>Nilai efektifitas</th>
    <th>File hasil review internal auditor</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['nilai_efisiensi']; ?></td>   
    <td><?=$unit['nilai_efektifitas']; ?></td>  
    <td><a target="_blank" href="<?=base_url($unit['file_auditor']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>

<?php } else if($sub_maqasid == 'review_keuangan') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>Nilai kesesuaian dengan standar</th>
    <th>Nilai keakuratan</th>
    <th>File hasil review laporan keuangan</th>
  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
    <td><?=$unit['nilai_standar']; ?></td>   
    <td><?=$unit['nilai_keakuratan']; ?></td>  
    <td><a target="_blank" href="<?=base_url($unit['file_keakuratan']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>

<?php } else if($sub_maqasid == 'review_rencana') { ?>

<table class="table table-striped table-bordered">
  <tr>
    <th style="width:20px">No</th>
    <th>File Rencana tindak lanjut</th>
    <th>File follow up</th>

  </tr>
  <?php $i = 1; foreach( $detail_unit as $unit ) { ?>
  <tr>
    <td><?=$i++;?></td> 
   <td><a target="_blank" href="<?=base_url($unit['file_tindak_lanjut']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

    <td><a target="_blank" href="<?=base_url($unit['file_follow_up']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>

 
  </tr>  
  <?php } ?>

</table>


<?php } ?>
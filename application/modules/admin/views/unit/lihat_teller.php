<?php
$last = $this->uri->total_segments();
$sub_maqasid = $this->uri->segment($last);
$unit = $this->uri->segment($last - 1);
$kantors = $this->uri->segment($last - 2);
?>
<ul class="nav nav-tabs">

  <li role="presentation" <?php if ($sub_maqasid == 'komplain') {
                            echo 'class="active"';
                          } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/' . $current_kantor . "/" . $current_unit . "/komplain"); ?>">
      <h4>Hifdz An-Nafs</h4>
      <p>Jumlah komplain per bulan</p>
    </a></li>

  <li role="presentation" <?php if ($sub_maqasid == 'kecepatan') {
                            echo 'class="active"';
                          } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/' . $current_kantor . "/" . $current_unit . "/kecepatan"); ?>">
      <h4>Hifdz An-Nafs</h4>
      <p>Kecepatan dan Ketepatan kerja</p>
    </a></li>

  <li role="presentation" <?php if ($sub_maqasid == 'product_knowledge') {
                            echo 'class="active"';
                          } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/' . $current_kantor . "/" . $current_unit . "/product_knowledge"); ?>">
      <h4>Hifdz Al’Aql</h4>
      <p>Penguasaan Product Knowledge</p>
    </a></li>

</ul>
</ul>

<br>

<?php if ($sub_maqasid == 'komplain') { ?>
  <a href="<?php echo base_url("admin/unit/rekap_excel/$kantors/$unit/$sub_maqasid"); ?>" class="btn btn-success btn-sm d-block"> <i class="fas fa-file-excel"></i> Export ke Excel</a><br><br>
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
    <?php foreach ($detail_unit as $unit) { ?>
      <tr>
        <td><?= $unit['tanggal_komplain']; ?></td>
        <td><?= $unit['tanggal_kejadian']; ?></td>
        <td><?= $unit['bentuk_komplain']; ?></td>
        <td><?= $unit['pihak_komplain']; ?></td>
        <td><?= $unit['tindakan_diambil']; ?></td>
        <td><?= $unit['tindakan_perlu_diambil']; ?></td>
        <td><?= $unit['status']; ?></td>
      </tr>
    <?php } ?>

  </table>


<?php } else if ($sub_maqasid == 'product_knowledge') { ?>

  <table class="table table-striped table-bordered">
    <tr>
      <th style="width:30px;">No.</th>
      <th>Penguasaan Product Knowledge</th>
    </tr>
    <?php $i = 1;
    foreach ($detail_unit as $unit) { ?>
      <tr>
        <th><?= $i++; ?></th>
        <td><a target="_blank" href="<?= base_url($unit['file_product_knowledge']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>
      </tr>
    <?php } ?>
  </table>

<?php } else if ($sub_maqasid == 'kecepatan') { ?>

  <table class="table table-striped table-bordered">
    <tr>
      <th style="width:30px;">No</th>
      <th>Dokumen Gaji + bonus </th>
    </tr>
    <?php $i = 1;
    foreach ($detail_unit as $unit) { ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><a target="_blank" href="<?= base_url($unit['file_kecepatan_kerja']); ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a></td>


      </tr>
    <?php } ?>

  </table>
<?php } ?>
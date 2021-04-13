<?php
$last = $this->uri->total_segments();
$sub_maqasid = $this->uri->segment($last);
$unit = $this->uri->segment($last - 1);
$kantors = $this->uri->segment($last - 2);
?>
<ul class="nav nav-tabs">
  <li role="presentation" <?php if ($sub_maqasid == 'dansos') {
                            echo 'class="active"';
                          } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/' . $current_kantor . "/" . $current_unit . "/dansos"); ?>">
      <h4>Hifdz Al Maal</h4>
      <p>Program Dana Sosial</p>
    </a></li>

  <li role="presentation" <?php if ($sub_maqasid == 'wakaf') {
                            echo 'class="active"';
                          } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/' . $current_kantor . "/" . $current_unit . "/wakaf"); ?>">
      <h4>Hifdz Al Maal</h4>
      <p>Wakaf</p>
    </a></li>

  <li role="presentation" <?php if ($sub_maqasid == 'penerimaan_dansos') {
                            echo 'class="active"';
                          } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/' . $current_kantor . "/" . $current_unit . "/penerimaan_dansos"); ?>">
      <h4>Hifdz Al Maal</h4>
      <p>Penerimaan Dana Sosial</p>
    </a></li>

  <li role="presentation" <?php if ($sub_maqasid == 'pendampingan') {
                            echo 'class="active"';
                          } ?>><a href="<?php echo base_url('admin/unit/lihat_unit/' . $current_kantor . "/" . $current_unit . "/pendampingan"); ?>">
      <h4>Hifdz Al Aql</h4>
      <p>Pendampingan</p>
    </a></li>
</ul>
<br>

<?php if ($sub_maqasid == 'dansos') { ?>

  <a href="<?php echo base_url("admin/unit/rekap_excel/$kantors/$unit/$sub_maqasid"); ?>" class="btn btn-success btn-sm d-block"> <i class="fas fa-file-excel"></i> Export ke Excel</a><br><br>

  <table class="table table-striped table-bordered">
    <tr>
      <th style="width:100px">Tanggal</th>
      <th>Nama Program</th>
      <th>Penerima</th>
      <th>Lokasi</th>
      <th>Nominal</th>
      <th>Keterangan</th>
    </tr>
    <?php foreach ($detail_unit as $unit) { ?>
      <tr>
        <td><?= $unit['tanggal']; ?></td>
        <td><?= $unit['nama_program']; ?></td>
        <td><?= $unit['penerima']; ?></td>
        <td><?= $unit['lokasi']; ?></td>
        <td><?= $unit['nominal']; ?></td>
        <td><?= $unit['keterangan']; ?></td>
      </tr>
    <?php } ?>

  </table>


<?php } else if ($sub_maqasid == 'wakaf') { ?>

  <a href="<?php echo base_url("admin/unit/rekap_excel/$kantors/$unit/$sub_maqasid"); ?>" class="btn btn-success btn-sm d-block"> <i class="fas fa-file-excel"></i> Export ke Excel</a><br><br>

  <table class="table table-striped table-bordered">
    <tr>
      <th style="width:100px">Tanggal</th>
      <th>Wakif</th>
      <th>Benda Wakaf</th>
      <th>Mauquf 'alaih</th>
      <th>Keterangan</th>
    </tr>
    <?php $i = 1;
    foreach ($detail_unit as $unit) { ?>
      <tr>
        <td><?= $unit['tanggal']; ?></td>
        <td><?= $unit['nama_program']; ?></td>
        <td><?= $unit['penerima']; ?></td>
        <td><?= $unit['lokasi']; ?></td>
        <td><?= $unit['keterangan']; ?></td>
      </tr>
    <?php } ?>
  </table>

<?php } else if ($sub_maqasid == 'pendampingan') { ?>

  <a href="<?php echo base_url("admin/unit/rekap_excel/$kantors/$unit/$sub_maqasid"); ?>" class="btn btn-success btn-sm d-block"> <i class="fas fa-file-excel"></i> Export ke Excel</a><br><br>

  <table class="table table-striped table-bordered">
    <tr>
      <th style="width:100px">Tanggal</th>
      <th>Nama Program</th>
      <th>Peserta</th>
      <th>Jumlah Peserta</th>
      <th>Lokasi</th>
      <th>Keterangan</th>
    </tr>
    <?php $i = 1;
    foreach ($detail_unit as $unit) { ?>
      <tr>
        <td><?= $unit['tanggal']; ?></td>
        <td><?= $unit['nama_program']; ?></td>
        <td><?= $unit['penerima']; ?></td>
        <td><?= $unit['jumlah_peserta']; ?></td>
        <td><?= $unit['lokasi']; ?></td>
        <td><?= $unit['keterangan']; ?></td>
      </tr>
    <?php } ?>
  </table>

<?php } else if ($sub_maqasid == 'penerimaan_dansos') { ?>

  <a href="<?php echo base_url("admin/unit/rekap_excel/$kantors/$unit/$sub_maqasid"); ?>" class="btn btn-success btn-sm d-block"> <i class="fas fa-file-excel"></i> Export ke Excel</a><br><br>

  <table class="table table-striped table-bordered">
    <tr>
      <th style="width:100px">Tanggal</th>
      <th>Nama Program</th>
      <th>Instansi/Lembaga/Person</th>
      <th>Terikat</th>
      <th>Nominal</th>
      <th>Keterangan</th>
    </tr>
    <?php $i = 1;
    foreach ($detail_unit as $unit) { ?>
      <tr>
        <td><?= $unit['tanggal']; ?></td>
        <td><?= $unit['nama_program']; ?></td>
        <td><?= $unit['penerima']; ?></td>
        <td><?= $unit['jumlah_peserta']; ?></td>
        <td><?= $unit['lokasi']; ?></td>
        <td><?= $unit['keterangan']; ?></td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>

<!-- Modal -->
<div id="confirm-delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus</h4>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <a class="btn btn-danger btn-ok">Hapus</a>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
</script>
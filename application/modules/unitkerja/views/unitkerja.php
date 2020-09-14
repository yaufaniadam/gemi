<?php
$current_kantor = $unitkerja['id_kantor'];
$current_unit = $unitkerja['id_unit'];
$awal = date_create($unitkerja['awal_penempatan']);
$akhir = date_create($unitkerja['akhir_penempatan']);
$last = $this->uri->total_segments();
$sub_maqasid = $this->uri->segment($last);
?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-xs-12 col-md-6">
          <h4>Unit Kerja Saya</h4>
        </div>

        <div class="col-xs-12 col-md-6 text-right">
          <a href="<?php echo base_url('unitkerja/detail_unit/' . $current_kantor . "/" . $current_unit . "/" . $sub_maqasid); ?>" class="btn btn-danger btn-sm btn-block">Tambah Data</a>
        </div>

      </div>
    </div>
  </div>


  <div class="box">
    <div class="box-header">
      <h4>Unit Kerja <?= $unitkerja['nama_unit']; ?> - Kantor <?= $unitkerja['kantor']; ?> </h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <?php
      include "lihat_" . $unitkerja['kode'] . ".php";
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>


<script>
  //for nav
  $("#kantor<?= $current_kantor; ?>").addClass('active');
  $("#kantor<?= $current_kantor; ?> .unit<?= $current_unit; ?>").addClass('active');
</script>
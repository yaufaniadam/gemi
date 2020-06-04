<?php
$current_kantor = $unitkerja['id_kantor'];
$current_unit = $unitkerja['id_unit'];
$awal = date_create($unitkerja['awal_penempatan']);
$akhir = date_create($unitkerja['akhir_penempatan']);
?>
 
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4>Unit Kerja Saya</h4>
        </div>   
        
        <div class="col-md-6 text-right">  
         <a href="<?php echo base_url('unitkerja/detail_unit/'. $current_kantor . "/".$current_unit."/" ); ?>" class="btn btn-danger btn-sm">Tambah Data</a>      
        </div>

      </div>
    </div>
  </div>


   <div class="box">
    <div class="box-header">
      <h4>Unit Kerja <?= $unitkerja['nama_unit']; ?> - Kantor <?=$unitkerja['kantor']; ?> </h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <?php 
      include "lihat_".$unitkerja['kode'].".php";
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  


<script>  
  //for nav
  $("#unit_kerja").addClass('active');
  $("#unit_kerja .submenu_unit_kerja").addClass('active');
</script>

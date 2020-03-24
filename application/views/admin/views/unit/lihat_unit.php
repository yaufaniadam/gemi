<?php 
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
 // $current_kantor = $uri_segments[4]; //utk localhost ganti ke 5
 echo $current_kantor = $uri_segments[5];
 // $current_unit = $uri_segments[5]; //utk localhost ganti ke 6
 echo  $current_unit = $uri_segments[6];
?>
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-building"></i> &nbsp; BMT UMY <?= $kantor['kantor'];?></h4>
        </div>
        <div class="col-md-6 text-right">  
         <a href="<?php echo base_url('admin/unit/detail_unit/'. $current_kantor . "/".$current_unit."/" ); ?>" class="btn btn-danger btn-sm">Tambah Data</a>       
        </div>        
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
       <div class="box">
        <div class="box-header with-border">
           <h4>Unit Kerja <?=get_unit_kerja_by_id($current_unit); ?> </h4>
        </div>


       
        <!-- /.box-header -->
        <div class="box-body table-responsive">
           <?php
            if(isset($uri_segments[6])) { 
            $kinerja_unit = $unit['kode']; ?>
            <?php if($kinerja_unit == 'hrd') {
           
                require_once("lihat_hrd.php");

            } else if($kinerja_unit =="teller") { 

                include "lihat_teller.php";

            } else if($kinerja_unit =="manager") { 

                include "lihat_manager.php";

            } else if($kinerja_unit =="akunting") { 

                include "lihat_akunting.php";

            } else if($kinerja_unit =="cs") { 

                include "lihat_cs.php";

            } else if($kinerja_unit =="pembiayaan") { 

                include "lihat_pembiayaan.php";

            } else if($kinerja_unit =="surveyor") { 

                include "lihat_surveyor.php";

            } else if($kinerja_unit =="marketing") { 

                include "lihat_marketing.php";

            } else if($kinerja_unit =="surveyor") { 

                include "lihat_surveyor.php";

            } else if($kinerja_unit =="corporate") { 

                include "lihat_corporate.php";

            } else if($kinerja_unit =="digimark") { 

                include "lihat_digimark.php";

            } else {
              include "lihat_auditor.php";
            }

           } else { ?>

            pilih menu

            <?php } ?> 
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    
  </div>
  <!-- /.box -->
</section>  

<script> 
  //for nav
  $("#kantor<?= $kantor['id'];?>").addClass('active');
  $("#kantor<?= $kantor['id'];?> .submenu_kantor<?=$current_unit;?>").addClass('active');
   $('#tanggal_pelaksanaan').daterangepicker();
</script>

<?php 
  $last = $this->uri->total_segments();
  $current_unit= $this->uri->segment($last-1);
  $current_kantor = $this->uri->segment($last-2);
  $kinerja = $this->uri->segment($last);
  
?>
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-building"></i> &nbsp; Kantor <?= $kantor['kantor'];?></h4>
        </div>
        <!--<div class="col-md-6 text-right">  
         <a href="<?php echo base_url('admin/unit/detail_unit/'. $current_kantor . "/".$current_unit."/" ); ?>" class="btn btn-danger btn-sm">Tambah Data</a>      
        </div> -->
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
            if(isset($kinerja)) { 
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

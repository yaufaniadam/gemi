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
          <h4><i class="fa fa-building"></i> &nbsp; BMT UMY <?= $kantor['kantor'];?></h4>
        </div>
        <div class="col-md-6 text-right">
           <a href="<?php echo base_url('admin/unit/lihat_unit/'. $current_kantor . "/".$current_unit."/lihat" ); ?>" class="btn btn-danger btn-sm">Lihat Detail</a>
        </div>        
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
       <div class="box">
        <div class="box-header with-border">
          <div class="col-md-6">
            <h4>Unit Kerja <?=get_unit_kerja_by_id($current_unit); ?> </h4>
          </div>
          <div class="col-md-6">
           
          </div>
        </div>


        <?php $kinerja_unit = $unit['kode']; ?>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          


            <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>

            <?php if($kinerja_unit == 'hrd') {
           
                include "hrd.php";

            } else if($kinerja_unit =="teller") { 

                include "teller.php";

            } else if($kinerja_unit =="manager") { 

                include "manager.php";

            } else if($kinerja_unit =="akunting") { 

                include "akunting.php";

            } else if($kinerja_unit =="cs") { 

                include "cs.php";

            } else if($kinerja_unit =="pembiayaan") { 

                include "pembiayaan.php";

            } else if($kinerja_unit =="surveyor") { 

                include "surveyor.php";

            } else if($kinerja_unit =="marketing") { 

                include "marketing.php";

            } else if($kinerja_unit =="surveyor") { 

                include "surveyor.php";

            } else if($kinerja_unit =="corporate") { 

                include "corporate.php";

            } else if($kinerja_unit =="digimark") { 

                include "digimark.php";

            } else {
              include "auditor.php";
            }

            ?> 
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    
  </div>
  <!-- /.box -->
</section>  

 <script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>

            <script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
       

<script>
 
  //for nav
  $("#kantor<?= $kantor['id'];?>").addClass('active');
  $("#kantor<?= $kantor['id'];?> .submenu_kantor<?=$current_unit;?>").addClass('active');
   $('#tanggal_pelaksanaan').daterangepicker();
</script>

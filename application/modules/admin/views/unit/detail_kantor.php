 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-building"></i> &nbsp; Kantor <?= $kantor['kantor'];?></h4>
        </div>
        <div class="col-md-6 text-right">
         
        </div>
        
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-8">
       <div class="box">
        <div class="box-header with-border">
           <h4>Nama Staf Kantor <?= $kantor['kantor'];?></h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-striped table-bordered">
            <tr>
                  <th>No</th>
                  <th>Nama Staf</th>
                  <th>Unit Kerja</th>
            </tr>
          <?php $i=1;
            foreach($penempatan as $penempatan) { ?>
              <tr>
                    <td><?=$i++ ?></td>
                    <td><?=get_stafname_by_id($penempatan['user_id']); ?></td>
                    <td><?=get_unit_kerja_by_id($penempatan['id_unit']); ?></td>
                  <!--   <td><?=get_kantor_by_id($penempatan['id_kantor']); ?></td>
                    <td><?=$penempatan['awal_penempatan']; ?> - <?=$penempatan['akhir_penempatan']; ?></td>-->
                   
                  </tr>
          <?php  } ?>
          </table>
         </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-md-4">
       <div class="box">
        <div class="box-header">
          <h4>Alamat</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <p><i class="fa fa-map-marker"></i>  &nbsp;<?= $kantor['alamat'];?></p>
          <p><i class="fa fa-phone"></i>  &nbsp;<?= $kantor['telp'];?></p>
         
            
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!--<div class="col-md-4">
       <div class="box">
        <div class="box-header">
          <h4>Unit Kerja</h4>
        </div>
        <!-- /.box-header --
        <div class="box-body table-responsive">
                   
            <?php  
            if(is_admin() == 1) { 
              if($kantor['id_unit']) { 
                $unit = explode(',',$kantor['id_unit']); 
                  foreach ($unit as $unit) {
                  
                      echo "<p><a href=" . base_url() . "admin/unit/detail_unit/". $kantor['id']. "/" . $unit . " class='btn btn-danger'>" . get_unit_kerja_by_id($unit) . "</a></p>";
                
                  } //endforeach
              } 
            } else {
               $user_unit = get_unit_by_id($this->session->userdata('user_id'));

              if($kantor['id_unit']) { 
                $unit = explode(',',$kantor['id_unit']); 
                  foreach ($unit as $unit) {
                    if ( ($unit == $user_unit) || ($user_unit == 130) ) {
                      echo "<p><a href=" . base_url() . "admin/unit/detail_unit/". $kantor['id']. "/" . $unit . " class='btn btn-danger'>" . get_unit_kerja_by_id($unit) . "</a></p>";
                     } //endif
                  } //endforeach
              } 

            }?>
            
        </div>-->
        <!-- /.box-body 
      </div>
    </div>-->
  </div>
  <!-- /.box -->
</section>  



<script>
 
  //for nav
  $("#kantor<?=$kantor['id']; ?>").addClass('active');
  $("#kantor<?=$kantor['id']; ?> .submenu_kantor").addClass('active');

</script>

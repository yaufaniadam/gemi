<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-12">
              <h4><i class="fa fa-home"></i> &nbsp; Beranda</h4>
            </div>           
          </div>
        </div>
      </div>

      

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">

          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= base_url() ?>public/dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->

              <h3 class="widget-user-username"><?= getUserbyId($this->session->userdata('user_id')); ?></h3>
              <h5 class="widget-user-desc">Assalamu'alaikum</h5>


            </div>

            <div class="box-body no-padding">   

            <?php $list = get_kantor_by_user();


            if ($list == 0) {
              echo "belum ada penempatan";

            } else {
              echo "sudah ada penempatan";
            }

            //echo "<pre>";
          // print_r($list); echo "</pre>";
        // print_r( $kantor ); 
           // print_r($list); ?>          
                <ul class="nav nav-stacked">
                  <!--<li><a href="#">Terakhir login <span class="pull-right badge bg-gray">2 September 2018</span></a></li>                  
                 -->
                </ul>
            </div>

            <div class="box-footer">             
              <div class="pull-left">
                <a href="  <?php  echo base_url('admin/profile');  ?>" class="btn btn-default btn-flat">Profil Saya</a>
              </div>
            </div>
           
          </div>         
        </div>

        
      </div>
      <!-- /.row -->

     

     
    </section>
    <!-- /.content -->

<script src="<?= base_url() ?>public/dist/js/demo.js"></script>

<script>
  $("#dashboard1").addClass('active');
</script>
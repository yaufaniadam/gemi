<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">      
     <center><img style="padding:10px 10px 10px 0;" width="130" height="" src="<?= base_url() ?>public/dist/img/logobmt.png" alt="SISKIMAS BMT"></center>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li id="dashboard" class="treeview">
          <a href="<?= base_url('admin/dashboard'); ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>            
          </a>         
        </li>
      </ul>
     
      <!-- Menu admin -->
      <?php if(is_admin() == 1) { ?>

        <ul class="sidebar-menu">
          <li class="header">PRIBADI</li>
          
            <li id="pribadi" class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Data Pribadi</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">                  
                  <li class="submenu_user_edit"><a href="<?= base_url('admin/profile'); ?>"><i class="fa fa-circle-o"></i>Ubah Data Pribadi</a></li>
                  <li class="submenu_keluarga"><a href="<?= base_url('admin/profile/keluarga'); ?>"><i class="fa fa-circle-o"></i>Data Keluarga</a></li>
                  <li class="submenu_pass"><a href="<?= base_url('admin/profile/change_pwd'); ?>"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
                </ul>
            </li>   
           
            
            <li id="kinerja_individu" class="treeview">
              <a href="">
                <i class="fa fa-user"></i> <span>Kinerja Individu</span>    
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>           
              </a>
              <ul class="treeview-menu"> 
                <li class="submenu_din"><a href="<?= base_url('kinerja/individu/detail/din'); ?>"><i class="fa fa-circle-o"></i>Hifdz Ad-Din</a></li> 
                <li class="submenu_nafs"><a href="<?= base_url('kinerja/individu/detail/nafs'); ?>"><i class="fa fa-circle-o"></i>Hifdz An-Nafs</a></li>   
                 <li class="submenu_aql"><a href="<?= base_url('kinerja/individu/detail/aql'); ?>"><i class="fa fa-circle-o"></i>Hifdz Al’Aql</a></li> 
                 <li class="submenu_nasl"><a href="<?= base_url('kinerja/individu/detail/nasl'); ?>"><i class="fa fa-circle-o"></i>Hifdz An-Nasl</a></li> 
                 <li class="submenu_mal"><a href="<?= base_url('kinerja/individu/detail/mal'); ?>"><i class="fa fa-circle-o"></i>Hifdz Al-Maal</a></li> 
              
              </ul>
            </li>

            
        </ul>

        <ul class="sidebar-menu">
            <li class="header">KINERJA STAF</li>
            
            
             <li class="kinerja_staf" id=""><a href="<?= base_url('admin/users'); ?>"><i class="fa fa-circle-o"></i>Semua Staf</a></li>
          <li class="header">KINERJA KANTOR/UNIT</li>
          
         <?php $kantor = get_kantor(); 

                 foreach( $kantor as $kantor): ?>
                    <li class="treeview" id="kantor<?= $kantor['id'];?>">

                      <a href=""><i class="fa fa-building"></i><?=$kantor['kantor'];  ?>

                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span> 

                      </a>

                      
                      <ul class="treeview-menu"> 
                         <li class="submenu_kantor"><a href="<?= base_url('admin/unit/detail_kantor/'.$kantor['id']); ?>"><i class="fa fa-circle-o"></i>Profil Kantor</a></li> 

                         <?php
                         
                          $unit = get_unit_kerja_by_kantor( $kantor['id']);
                    

                          if($unit) { 
                              $id_unit = explode(',',$unit); 
                                foreach ($id_unit as $unit) { ?>
                                  <li class="submenu_kantor<?=$unit;?>">
                                    <a href="<?php echo base_url() ?>admin/unit/lihat_unit/<?=$kantor['id'];?>/<?=$unit;?>/lihat" class="submenu_kantor"><i class="fa fa-circle-o"></i><?php echo get_unit_kerja_by_id($unit);?></a></li>
                            <?php }
                            }
                          ?>
                      </ul>
                    </li> 

                  <?php endforeach;  ?>
        </ul>      
        
        <ul class="sidebar-menu">
          <li class="header">ADMINISTRATOR</li>
          <li id="unit_kerja">
            <a href="#">
              <i class="fa fa-gears"></i> <span>Unit Kerja</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">             
                <li class="submenu_unit_kerja" id=""><a href="<?= base_url('admin/unit'); ?>"><i class="fa fa-circle-o"></i>Semua Unit Kerja</a></li> 
                 <li class="submenu_kantor" id=""><a href="<?= base_url('admin/unit/kantor'); ?>"><i class="fa fa-circle-o"></i>Kantor</a></li>        
             </ul>
          </li>
          <li id="pengguna" class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Staf</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
             
                <li class="submenu_pengguna" id=""><a href="<?= base_url('admin/users'); ?>"><i class="fa fa-circle-o"></i>Semua Staf</a></li>
                <li class="submenu_useradd"><a href="<?= base_url('admin/users/add'); ?>"><i class="fa fa-circle-o"></i>Tambah Staf</a></li> 
                 <li class="submenu_useradd"><a href="<?= base_url('admin/users/penempatan'); ?>"><i class="fa fa-circle-o"></i>Penempatan</a></li>  
             
         
            </ul>
          </li>
        </ul>  

    <?php } else   { ?>
         <ul class="sidebar-menu">
          <li class="header">STAF & UNIT KERJA</li>
          
            <li id="pribadi" class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Data Pribadi</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">                  
                  <li class="submenu_user_edit"><a href="<?= base_url('admin/profile'); ?>"><i class="fa fa-circle-o"></i>Ubah Data Pribadi</a></li>
                  <li class="submenu_keluarga"><a href="<?= base_url('admin/profile/keluarga'); ?>"><i class="fa fa-circle-o"></i>Data Keluarga</a></li>
                  <li class="submenu_pass"><a href="<?= base_url('admin/profile/change_pwd'); ?>"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
                </ul>
            </li> 

            <li id="kinerja_individu" class="treeview">
              <a href="">
                <i class="fa fa-user"></i> <span>Kinerja Individu</span>    
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>           
              </a>
              <ul class="treeview-menu"> 
                <li class="submenu_din"><a href="<?= base_url('kinerja/individu/detail/din'); ?>"><i class="fa fa-circle-o"></i>Hifdz Ad-Din</a></li> 
                <li class="submenu_nafs"><a href="<?= base_url('kinerja/individu/detail/nafs'); ?>"><i class="fa fa-circle-o"></i>Hifdz An-Nafs</a></li>   
                <li class="submenu_aql"><a href="<?= base_url('kinerja/individu/detail/aql'); ?>"><i class="fa fa-circle-o"></i>Hifdz Al’Aql</a></li> 
                <li class="submenu_nasb"><a href="<?= base_url('kinerja/individu/detail/nasl'); ?>"><i class="fa fa-circle-o"></i>Hifdz An-Nasl</a></li> 
                <li class="submenu_mal"><a href="<?= base_url('kinerja/individu/detail/mal'); ?>"><i class="fa fa-circle-o"></i>Hifdz Al-Maal</a></li>               
              </ul>
            </li>
          </ul>    

          
          <?php 

           if(get_kantor_by_user() > 0 ) {   
              $user_unit = get_unit_by_id($this->session->userdata('user_id'));
              list($kantor, $unit) = get_kantor_by_user();
          ?>

            <ul class="sidebar-menu">
              <li class="header">KANTOR</li>
              <?php 
                   foreach( $kantor as $kantor) { 

                    


                   ?>
                      <li class="treeview" id="kantor<?= $kantor['id'];?>">

                        <a href=""><i class="fa fa-building"></i><?=$kantor['kantor'];  ?>

                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span> 

                        </a>

                        
                        <ul class="treeview-menu"> 
                           <li class="submenu_kantor"><a href="<?= base_url('admin/unit/detail_kantor/'.$kantor['id']); ?>"><i class="fa fa-circle-o"></i>Profil Kantor</a></li> 

                           <?php
                           
                            $unit = get_unit_kerja_by_kantor( $kantor['id']);
                      

                            if($unit) { 
                                $id_unit = explode(',',$unit); 
                                  foreach ($id_unit as $unit) { 
                                    if ( ($unit == $user_unit) || ($user_unit == 130) ) {?>
                                    <li class="submenu_kantor<?=$unit;?>">
                                      <a href="<?php echo base_url() ?>admin/unit/lihat_unit/<?=$kantor['id'];?>/<?=$unit;?>/lihat" class="submenu_kantor"><i class="fa fa-circle-o"></i><?php echo get_unit_kerja_by_id($unit);?></a></li>
                              <?php } //endif
                               } //endforeach

                               
                              }
                            ?>
                        </ul>
                      </li> 

                    <?php  }   ?>
            </ul> 

            <?php 

             } else {
                echo "takada";
             } 
        } //end if user
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  
<script>
  $("#<?= $cur_tab ?>").addClass('active');
</script>

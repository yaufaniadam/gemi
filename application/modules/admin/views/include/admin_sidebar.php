<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<center><img style="padding:10px 10px 10px 0;" width="130" height="" class="img-profile"
				src="<?= base_url() ?>public/dist/img/logobmt.png" alt="SISKIMAS BMT"></center>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li id="dashboard" class="treeview">
				<a href="<?= base_url('admin/dashboard'); ?>">
					<i class="fa fa-home"></i> <span>Beranda</span>
				</a>
			</li>
		</ul>

		<!-- Menu admin -->

		<ul class="sidebar-menu">
			<li class="header">KINERJA INDIVIDU STAF</li>
			<li id="kinerja_individu">
				<a href="<?=base_url('admin/users'); ?>">
					<i class="fa fa-user"></i> <span>Kinerja Individu</span>
					
				</a>
				
			</li>

			<li class="header">KINERJA UNIT KERJA</li>

			<?php $kantor = get_kantor(); 

                 foreach( $kantor as $kantor): ?>
			<li class="treeview" id="kantor<?= $kantor['id'];?>">

				<a href=""><i class="fa fa-building"></i><?=$kantor['kantor'];  ?>

					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>

				</a>


				<ul class="treeview-menu">
					<li class="submenu_kantor"><a href="<?= base_url('admin/unit/detail_kantor/'.$kantor['id']); ?>"><i
								class="fa fa-circle-o"></i>Profil Kantor</a></li>

					<?php
                         
                          $unit = get_unit_kerja_by_kantor( $kantor['id']);
                    

                          if($unit) { 
                              $id_unit = explode(',',$unit); 
                                foreach ($id_unit as $unit) { ?>
					<li class="submenu_kantor<?=$unit;?>">
						<a href="<?php echo base_url() ?>admin/unit/lihat_unit/<?=$kantor['id'];?>/<?=$unit;?>/lihat"
							class="submenu_kantor"><i class="fa fa-circle-o"></i><?php echo get_unit_kerja_by_id($unit);?></a></li>
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
					<li class="submenu_unit_kerja" id=""><a href="<?= base_url('admin/unit'); ?>"><i
								class="fa fa-circle-o"></i>Semua Unit Kerja</a></li>
					<li class="submenu_kantor" id=""><a href="<?= base_url('admin/unit/kantor'); ?>"><i
								class="fa fa-circle-o"></i>Kantor</a></li>
				</ul>
			</li>
			<li id="pengguna" class="treeview">
				<a href="#">
					<i class="fa fa-users"></i> <span>Pegawai</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">

					<li class="submenu_pengguna" id=""><a href="<?= base_url('admin/users'); ?>"><i
								class="fa fa-circle-o"></i>Semua Pegawai</a></li>
					<li class="submenu_useradd"><a href="<?= base_url('admin/users/add'); ?>"><i class="fa fa-circle-o"></i>Tambah
							Pegawai</a></li>
					<li class="submenu_penempatan"><a href="<?= base_url('admin/users/penempatan'); ?>"><i
								class="fa fa-circle-o"></i>SK Pegawai</a></li>


				</ul>
			</li>
		</ul>


	</section>
	<!-- /.sidebar -->
</aside>


<script>
	$("#<?= $cur_tab ?>").addClass('active');

</script>

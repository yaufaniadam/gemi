<?php
$cur_tab = $this->uri->segment(2) == '' ? 'dashboard' : $this->uri->segment(2);
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
		<ul class="sidebar-menu">
			<li class="header">KANTOR</li>

			<?php
			$kantor = get_kantor_by_user();	
			if ($kantor > 0) {
			?>

			<li class="treeview" id="kantor<?= $kantor['id_kantor']; ?>">

				<a href=""><i class="fa fa-building"></i><?= $kantor['kantor'];  ?>

					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>

				</a>
				<ul class="treeview-menu">
				<li class="submenu_kantor"><a href="<?= base_url('admin/unit/detail_kantor/'.$kantor['id_kantor']); ?>"><i
								class="fa fa-circle-o"></i>Profil Kantor</a></li>

					<li class="submenu_din"><a href="<?= base_url('admin/unit/lihat_unit/' . $kantor['id_kantor'] . '/'. $kantor['id_unit']); ?>/lihat"><i class="fa fa-circle-o"></i><?=$kantor['nama_unit']; ?></a></li>				
				</ul>
			</li>
			<?php } ?>

		</ul>


		<ul class="sidebar-menu">
			<li class="header">KINERJA</li>
			<li id="kinerja_individu" class="treeview">
				<a href="">
					<i class="fa fa-user"></i> <span>Kinerja Individu</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="submenu_din"><a href="<?= base_url('kinerja/individu/detail_din'); ?>"><i class="fa fa-circle-o"></i>Hifdz Ad-Din</a></li>
					<li class="submenu_nafs"><a href="<?= base_url('kinerja/individu/detail_nafs'); ?>"><i class="fa fa-circle-o"></i>Hifdz An-Nafs</a></li>
					<li class="submenu_aql"><a href="<?= base_url('kinerja/individu/detail_aql'); ?>"><i class="fa fa-circle-o"></i>Hifdz Al’Aql</a></li>
					<li class="submenu_nasl"><a href="<?= base_url('kinerja/individu/detail_nasl'); ?>"><i class="fa fa-circle-o"></i>Hifdz An-Nasl</a></li>
					<li class="submenu_mal"><a href="<?= base_url('kinerja/individu/detail_mal'); ?>"><i class="fa fa-circle-o"></i>Hifdz Al-Maal</a></li>
				</ul>
			</li>
			<li class="header">PROFIL</li>

			<li id="pribadi" class="treeview">
				<a href="#">
					<i class="fa fa-user"></i> <span>Data Pribadi</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="submenu_user_detail"><a href="<?= base_url('profile'); ?>"><i class="fa fa-circle-o"></i>Lihat Data
							Pribadi</a></li>
					<li class="submenu_user_edit"><a href="<?= base_url('profile/edit'); ?>"><i class="fa fa-circle-o"></i>Ubah
							Data
							Pribadi</a></li>
					<li class="submenu_riwayat_pendidikan"><a href="<?= base_url('profile/riwayat_pendidikan'); ?>"><i class="fa fa-circle-o"></i>Riwayat Pendidikan</a></li>
					<li class="submenu_sertifikat_penghargaan"><a href="<?= base_url('profile/sertifikat_penghargaan'); ?>"><i class="fa fa-circle-o"></i>Sertifikat & Penghargaan</a></li>
					<li class="submenu_minat"><a href="<?= base_url('profile/minat'); ?>"><i class="fa fa-circle-o"></i>Minat & Keahlian</a></li>
					<li class="submenu_keluarga"><a href="<?= base_url('profile/keluarga'); ?>"><i class="fa fa-circle-o"></i>Data
							Keluarga</a></li>
				</ul>
			</li>


		</ul>

	</section>
	<!-- /.sidebar -->
</aside>
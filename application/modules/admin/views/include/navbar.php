<header class="main-header">
	<!-- Logo -->
	<a href="<?= base_url('admin');?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>BM</b>T</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>SISKIMAS</b> BMT</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">

				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="<?php echo ($this->session->userdata('role') ==1) ? "#" : base_url('profile');  ?>">
          <?php
              $photo = getUserPhoto($this->session->userdata('user_id'));
              
              if ($photo == '') { ?>

							<img class="user-image"
								src="<?= base_url(); ?>public/dist/img/user1-128x128.jpg" alt="User profile picture">

							<?php } else { ?>

							<img class="user-image" src="<?= base_url($photo); ?>">

							<?php } ?>
						<span class="hidden-xs"><?= getUserbyId($this->session->userdata('user_id')); ?></span>
					</a>
					
				</li>
				<!-- Control Sidebar Toggle Button -->
				<li>
					<a href="<?= site_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> Logout </a>
				</li>
			</ul>
		</div>
	</nav>
</header>

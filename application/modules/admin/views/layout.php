<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= isset($title) ? $title : 'Sistem Informasi Kinerja Maqasid Syariah (SIKIMAS) BMT' ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="keywords" content="Sistem Informasi Kinerja Maqasid Syariah (SIKIMAS) BMT" />
	<meta name="description" content="Sistem Informasi Kinerja Maqasid Syariah (SIKIMAS) BMT" />
	<meta name="author" content="Yaufani Adam" />
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>public/dist/css/AdminLTE.min.css">
	<!-- Datatable style -->
	<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>public/dist/css/style.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url() ?>public/dist/css/skins/skin-yellow.min.css">
	<!-- jQuery 2.2.3 -->
	<script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>

</head>

<body class="skin-yellow">

	<div class="wrapper" style="height: auto;">
		<?php if ($this->session->flashdata('msg') != '') { ?>
			<div class="alert alert-success flash-msg alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4> Sukses!</h4>
				<?= $this->session->flashdata('msg'); ?>
			</div>
		<?php } elseif ($this->session->flashdata('error') != '') { ?>
			<div class="alert alert-danger flash-msg alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4> Terjadi Kesalahan!</h4>
				<?= $this->session->flashdata('error'); ?>
			</div>

		<?php }  ?>

		<section id="container">
			<!--header start-->
			<header class="header white-bg">
				<?php include('include/navbar.php'); ?>
			</header>
			<!--header end-->
			<!--sidebar start-->
			<aside>

				<?php if ($this->session->userdata('role') == 1) {
					include('include/admin_sidebar.php');
				} else {
					include('include/user_sidebar.php');
				} ?>

			</aside>
			<!--sidebar end-->
			<!--main content start-->
			<section id="main-content">
				<div class="content-wrapper">
					<!-- page start-->
					<?php $this->load->view($view); ?>
					<!-- page end-->
				</div>
			</section>
			<!--main content end-->
			<!--footer start-->
			<footer class=" main-footer">
				<strong>Copyright © 2019 <a href="#">Sistem Informasi Kinerja Maqasid Syariah (SIKIMAS) BMT</a></strong> All rights
				reserved. <?= $this->session->userdata('role'); ?>
			</footer>
			<!--footer end-->
		</section>

		<!-- /.control-sidebar -->
		<?php // include('include/control_sidebar.php'); 
		?>
	</div>


	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?= base_url() ?>public/bootstrap/js/bootstrap.min.js"></script>

	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>public/dist/js/app.min.js"></script>

	<!-- Date Picker -->
	<script src="<?= base_url() ?>public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">
		$('.hr_datepicker').datepicker({
			dateFormat: 'YY-mm-dd'
		});
	</script>
	<!-- page script -->
	<script type="text/javascript">
		$(".flash-msg").fadeTo(2000, 500).slideUp(500, function() {
			$(".flash-msg").slideUp(500);
		});
	</script>

</body>

</html>
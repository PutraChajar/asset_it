<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

			<!-- Icon Cards-->
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-3">
				<div class="card text-white bg-primary o-hidden h-100">
					<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-desktop"></i>
					</div>
					<div class="mr-5">0</div>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="javascript:void(0);">
					<span class="float-left">Komputer Terbanyak Digunakan</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
					</a>
				</div>
				</div>
				<div class="col-xl-3 col-sm-6 mb-3">
				<div class="card text-white bg-warning o-hidden h-100">
					<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-mouse-pointer"></i>
					</div>
					<div class="mr-5">0</div>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="javascript:void(0);">
					<span class="float-left">Mouse Terbanyak Digunakan</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
					</a>
				</div>
				</div>
				<div class="col-xl-3 col-sm-6 mb-3">
				<div class="card text-white bg-success o-hidden h-100">
					<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-keyboard"></i>
					</div>
					<div class="mr-5">0</div>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="javascript:void(0);">
					<span class="float-left">Keyboard Terbanyak Digunakan</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
					</a>
				</div>
				</div>
				<div class="col-xl-3 col-sm-6 mb-3">
				<div class="card text-white bg-danger o-hidden h-100">
					<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-print"></i>
					</div>
					<div class="mr-5">0</div>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="javascript:void(0);">
					<span class="float-left">Printer Terbanyak Digunakan</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
					</a>
				</div>
				</div>
			</div>

		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>

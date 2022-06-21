<?
include('koneksi.php');
?>

<div class="col-sm-12">
	<div class="panel panel-body">
	<div class="container-fluid">
		<h1 class="h2 mb-4 text-gray-800">Dashboard</h1>
		<hr>
		<div class="row">
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Kendaraan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM Kendaraan")); ?> Kendaran</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-car fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
                if($_SESSION['level'] == 'admin'){
			?>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Employee</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM employee")); ?> Employee</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-user fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
			?>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Customer</div>
								<div class="row no-gutters align-items-center">
									<div class="col-auto">
										<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
										<?= mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM customer"));?> Customer</div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Pemesanan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM Pemesanan")) ?> Pemesanan</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-book fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>				
	</div>
	<!-- /.container-fluid -->
	</div>
</div>



	<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
	</a>

<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION['username'])){
	header("Location: ../index.php");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<!-- <link rel="stylesheet" type="text/css" href="../css/services.css"> -->
		<link rel="stylesheet" type="text/css" href="../css/style2.css">
		<!-- <link rel="stylesheet" type="text/css" href="../css/sb-admin-2.min.css"> -->
		<link rel="stylesheet" type="text/css" href="../css/responsive.css">
		<link rel="stylesheet" href="../datatables/dataTables.bootstrap.css"/>
		<link rel="stylesheet" href="../css/card.css"/>
		<script src="../jquery/jquery-3.3.1.min.js" type=" text/javascript"></script>
		<script src="../js/bootstrap.min.js" type=" text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
			<?php
			date_default_timezone_set("Asia/Jakarta");
			include('koneksi.php');
			include("sidebar.php");
			include("navbar.php");
			?>
			<div id="page-content-wrapper">
				<section id="content-wrapper">
						<?php 
							if (isset($_GET['page']) && strlen($_GET['page']) > 0) {
								$page = str_replace(".", "/", $_GET['page']) . ".php";
							} else {
								$page = "home.php";
							}
							if (file_exists($page)) {
								include($page);
							} else {
								include("home.php");
							}
						?>
				</section>
		</div>


		<script src="../datatables/jquery.dataTables.js" type=" text/javascript"></script>
		<script src="../datatables/dataTables.bootstrap.js" type=" text/javascript"></script>
	

		
		<script src="../js/jquery-ui.js" type=" text/javascript"></script>

		<script src="../js/script.js" type=" text/javascript"></script>
		<script type="text/javascript">
			$(function(){
				$("#sidebar-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
				});
			});
		</script>

		<script>
			$(document).ready(function() {
				$("#list-user").dataTable(
					{"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],});
			});
		</script>
		<script>
			$(document).ready(function() {
				$("#list-merk").dataTable(
					{"lengthMenu": [[5, 10, -1], [5, 10, "All"]],});
			});
		</script>
				<script>
			$(document).ready(function() {
				$("#list-type").dataTable(
					{"lengthMenu": [[5, 10, -1], [5, 10, "All"]],});
			});
		</script>
		<script>
			$(document).ready(function() {
				$("#list-kendaraan").dataTable(
					{"lengthMenu": [[10, 15, -1], [10, 15, "All"]],});
			});
		</script>
		<script>
			$(document).ready(function() {
				$("#list-pemesanan").dataTable(
					{"lengthMenu": [[10, 15, -1], [ 10, 15, "All"]],});
			});
		</script>
	</body>
</html>